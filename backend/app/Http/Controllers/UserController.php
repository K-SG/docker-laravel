<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KrononUser;

class UserController extends Controller
{
    public function add()
    {
        //ポップアップを表示しないためのフラグ
        $popup_flag = 7;
        return view('user.user_new', ['popFlag' => $popup_flag]);
    }
    public function register(Request $request)
    {
        $popup_flag = 0;
        // $users = [
        //     'user_name' => $request->userName,
        //     'mail' => $request->mail,
        //     'password' => $request->password,
        // ];
        //データ取得
        // $booking_user = KrononUser::where('mail',$mail)->get();
        $booking_user = KrononUser::mailEqual($request->mail)->get();
        // empty($booking_user)isset($booking_user[0])
        if (count($booking_user) != 0) {
            //メールアドレスと被った際のポップアップを出すためのフラグ
            $popup_flag = 1;
            return view('user.user_new', ['popFlag' => $popup_flag]);
        }
        // DB::table('kronon_users')->insert($users);
        $krononUser = new KrononUser;
        
        $krononUser->user_name = $request->userName;
        $krononUser->mail = $request->mail;
        $krononUser->password = $request->password;
        $krononUser->timestamps = false; 
        unset($krononUser['_token']);
        $krononUser->save();
        
        return view('user.user_new', ['popFlag' => $popup_flag]);
    }
}
