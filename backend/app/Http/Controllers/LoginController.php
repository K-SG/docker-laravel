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
        $mail = $request->mail;
        $password = $request->password;
        $items = DB::table('k_user')
            ->where('mail', $mail)
            ->where('password', $password)
            ->get();

        if ($items->isEmpty())
        {
            $popFlag = 2;
            return view('login.login', ['popFlag' => $popFlag]);
        } else {
            return redirect('/user/calendar');
        }
    
    }

}