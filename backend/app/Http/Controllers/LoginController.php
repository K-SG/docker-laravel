<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KrononUser;
use Illuminate\Support\Facades\Auth;

const POPUP_FLAG_IMPUT_ERROR = 2;

class LoginController extends Controller
{
    public function topPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) 
        {
            return redirect('/user/calendar');
        } else {
<<<<<<< HEAD
            return view('auth.login', ['popFlag' => POPUP_FLAG_IMPUT_ERROR]);
=======
            $popFlag = 2;
            return view('auth.login', ['email' => $email, 'popFlag' => $popFlag]);
>>>>>>> logout
        }

        // $items = KrononUser::LoginCheck($mail, $password)->get();

        // if (!KrononUser::existsUser($email,$password))
        // {
        //     return redirect('/user/calendar');
        // }
        //
        // return view('login.login', ['popFlag' => $popFlag]);
    
    }

}