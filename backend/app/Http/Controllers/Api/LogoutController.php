<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\KrononUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class LogoutController extends ApiController
{

    public function logout()
    {
        try {

            //藤本さん
            // $request->user()->update(['api_token' => null]);

            $user = Auth::user();
            $user->update(['api_token' => null]);

            return response()->json([
                'success' => true,
                'code' => 200,          
            ],200);
        
        }catch (Exception $e){
            throw new HttpResponseException(response()->json([
                'success' => false,
                'code' => 500,
                'message' => $e,//'エラーが発生したよ',
            ], 500));
        }

    }

}