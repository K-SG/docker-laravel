<?php

//参考にしたサイト
// https://qiita.com/komatzz/items/7a5dd78cf66f2c4d6ad5

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BadRequestException extends Exception
{
    public $request;
    public $message;

    public function __construct(Request $request, array $message)
    {
        $this->request = $request;
        // 複数のバリデーションエラー時には , で区切る
        $this->message = implode(',', $message);
    }

    //ログとして表示させたい内容を設定
    public function report()
    {
        $xRequestId = array_key_exists('x-request-id', $this->request->header()) ? $this->request->header()['x-request-id'][0] : '';
        Log::info(
            $xRequestId,
            [
                'client_ip'      => $this->request->getClientIp(),
                'request_params' => $this->request->all(),
                'response_body'  => $this->message,
            ]
        );
    }

    //レスポンスとして返したい内容を設定している
    public function render()
    {
        // return response()->json(
        //     $this->message,
        //     422
        // );
        return view('error.error');
    }
}
