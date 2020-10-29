<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ScheduleDetailController extends Controller
{
    public function datail()
    {
        $user = Auth::user();
        //ポップアップを表示しないためのフラグ
        return view('schedule.schedule_detail');
    }
    public function register(Request $request)
    {
        // //登録完了ポップアップを表示するためのフラグ
        // $popup_flag = 0;
        // //バリデーション$request->mailformrequest
        
        // $booking_user = KrononUser::SelectByMail($request->mail)->get();
        // if (count($booking_user) != 0) {
        //     //メールアドレスと被った際のポップアップを表示するためのフラグ
        //     $popup_flag = 1;
        //     return view('user.user_new', ['popFlag' => $popup_flag]);
        // }

        
        // $krononUser = new KrononUser;
        // //バリデーション
        // //値を保存formrequest
        // $krononUser->user_name = $request->userName;
        // $krononUser->mail = $request->mail;
        // $krononUser->password = $request->password;
        // //タイムスタンプを無効
        // $krononUser->timestamps = false; 
        // unset($krononUser['_token']);
        // $krononUser->save();
        return view('user.user_new');
    }
}
