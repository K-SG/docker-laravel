<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KrononUser;

class UserController extends Controller
{
    public function add()
    {
        //ポップアップを表示しないためのフラグ
        $popup_flag = 2;
        return view('user.user_new', ['popFlag' => $popup_flag]);
    }
    public function register(Request $request)
    {
        //登録完了ポップアップを表示するためのフラグ
        $popup_flag = 0;
        $booking_user = KrononUser::mailEqual($request->mail)->get();
        if (count($booking_user) != 0) {
            //メールアドレスと被った際のポップアップを表示するためのフラグ
            $popup_flag = 1;
            return view('user.user_new', ['popFlag' => $popup_flag]);
        }
        $krononUser = new KrononUser;
        //値を保存
        $krononUser->user_name = $request->userName;
        $krononUser->mail = $request->mail;
        $krononUser->password = $request->password;
        //タイムスタンプを無効
        $krononUser->timestamps = false; 
        unset($krononUser['_token']);
        $krononUser->save();
        return view('user.user_new', ['popFlag' => $popup_flag]);
    }
}
