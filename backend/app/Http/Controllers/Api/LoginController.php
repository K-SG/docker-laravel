<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\KrononUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\TokenGuard;

const POPUP_FLAG_IMPUT_ERROR = 2;

class LoginController extends ApiController
{
    public function topPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        $email = $request->email;
        $password = $request->password;
        // Auth::guard('api')->attempt($credentials)
        // Auth::guard(['email' => $email, 'password' => $password])
        
        if (Auth::guard('api')->check(['email' => $email, 'password' => $password])) 
        {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => "ログインに成功したよ"
            ], 200);
            return redirect('/user/calendar');
        } else {
            $popFlag = 2;
            return view('auth.login', ['email' => $email, 'popFlag' => $popFlag]);
        }
    }

}