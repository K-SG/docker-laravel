<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KrononUser;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function topPage()
    {
        $param = ['message' => 'ログイン'];
        return view('auth.login', $param);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
//        $items = KrononUser::LoginCheck($mail, $password)->get();

        // if (!KrononUser::existsUser($email,$password))
        // {
        //     return redirect('/user/calendar');
        // }
        //
        // return view('login.login', ['popFlag' => $popFlag]);

        if (Auth::attempt(['email' => $email, 'password' => $password])) 
        {
            return redirect('/user/calendar');
        } else {
            $msg = 'ログインに失敗しました。';
            $popFlag = 2;
            return view('auth.login', ['message' => $msg, 'popFlag' => $popFlag]);
        }
    
    }

}