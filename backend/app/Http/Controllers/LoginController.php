<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function post(Request $request)
    {
        $mail = $request->mail;
        $password = $request->password;
        $items = DB::select('select * from k_user where mail = :mail and password = :password', $mail,$password);
        if (empty($items))
        {
            return view('login.login');
        } else {
            return view('calender.calender');
        }


    }

}