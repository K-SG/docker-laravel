<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function post(Request $request)
    {
        $db_mail = DB::select('select * from k_user where mail = ?', [$request->mail]);
        $db_pass = DB::select('select * from k_user where password = ?', [$request->password]);
        if (empty($db_mail))
        {
            $popup_flag = 2;
            return view('login.login', ['popFlag' => $popup_flag]);
        } else {
            if (empty($db_pass)) 
            {
                $popup_flag = 2;
                return view('login.login', ['popFlag' => $popup_flag]);
            } else {
                return redirect('/user/calendar');
            }
        }


    }

}