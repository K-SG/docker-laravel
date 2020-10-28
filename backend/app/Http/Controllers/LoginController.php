<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KrononUser;

class LoginController extends Controller
{
    public function topPage()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $mail = $request->mail;
        $password = $request->password;
        $items = KrononUser::LoginCheck($mail, $password)->get();

        if ($items->isEmpty())
        {
            $popFlag = 2;
            return view('login.login', ['popFlag' => $popFlag]);
        } else {
            return redirect('/user/calendar');
        }
    
    }

}