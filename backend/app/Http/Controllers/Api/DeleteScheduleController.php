<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CalendarRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditScheduleRequest;
use App\Http\Requests\DeleteScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use CreateUsersTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;

class DeleteScheduleController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete(int $id)
    {

        //db内にこのレコードのデータ歩かないかをフォームリクエストにある
        //softdalete Laravel標準の論理削除
        //
        try {
            //scheduleの中身がからなのでエラーをキャッチしません？？
            $schedule = Schedule::Scheduledelete(
                $id
            );
            if (is_null($schedule) || $schedule == 0) {
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'message' => "お探しのページが見つからなかったよ。"//$e,
                ], 404);
            }
            // return response()->json(["schedule" => $schedule]);
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => "予定の削除に成功したよ"
            ], 200);

        } catch (Exception $e) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'code' => 500,
                'message' => $e,//'エラーが発生したよ',
            ], 500));
        }
    }
}
