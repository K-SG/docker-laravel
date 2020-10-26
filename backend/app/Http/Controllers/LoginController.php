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
        return view('login.login', $param);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
//        $items = KrononUser::LoginCheck($mail, $password)->get();

        // if ($items->isEmpty())
        // {
        //     $popFlag = 2;
        //     return view('login.login', ['popFlag' => $popFlag]);
        // } else {
        //     return redirect('/user/calendar');
        // }

        if (Auth::attempt(['email' => $email, 'password' => $password])) 
        {
            return redirect('/user/calendar');
        } else {
            $msg = 'ログインに失敗しました。';
            return view('login.login', ['message' => $msg]);
        }
    
    }

}