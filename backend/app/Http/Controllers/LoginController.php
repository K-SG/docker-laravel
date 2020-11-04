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
        $email = $_POST['login_mail'];
        $password = $_POST['login_pass'];

        $result =['result'=>'error'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) 
        {
            //return redirect('/user/calendar');
            $result =['result'=>'success'];
        }

        // ヘッダーの設定
        header('Content-type:application/json; charset=utf8');
        // JSON形式にして返却
        echo json_encode($result);

        // $items = KrononUser::LoginCheck($mail, $password)->get();

        // if (!KrononUser::existsUser($email,$password))
        // {
        //     return redirect('/user/calendar');
        // }
        //
        // return view('login.login', ['popFlag' => $popFlag]);
    
    }

}