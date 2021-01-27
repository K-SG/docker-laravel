<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\KrononUser;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Exceptions\HttpResponseException;

const POPUP_FLAG_IMPUT_ERROR = 2;

class LoginController extends ApiController
{
    public function topPage()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        try {
            if (Auth::attempt(['email' => $email, 'password' => $password])) 
            {
                //藤本さん
                // $user = Auth::user();
                // $user->update(['api_token' => Str::random(60)]);
    
                $api_token = User::createApiToken($email);
                return response()->json([
                    'success' => true,
                    'code' => 200,
                    'data' => ['token'=>$api_token],            
                ],200);
            } else {
                return response()->json([
                    'success' => false,
                    'code' => 400,
                    'message' => "入力内容が間違っているよ"//$e,
                ], 400);
            }
        }catch (Exception $e){
            throw new HttpResponseException(response()->json([
                'success' => false,
                'code' => 500,
                'message' => '問題が発生したよ',
            ], 500));
        }
    }

}