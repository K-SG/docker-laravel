<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function usernew(){
        return view('user.user_new');
    }
    public function usercreate(Request $request){
        $users = [
            'user_name' => $request->userName,
            'mail' => $request->mail,
            'password'=> $request->password,
        ];
        
        //入力されてきたメールを条件にユーザーをselect
        //userCount = SELECT COUNT(*) FROM k_user WHERE mail = ?
        // $userCount = DB::select('select count(*) from k_user where mail = :mail', $users);
        // if($userCount){
            
        // }
        // dd($userCount);
        
        //if(userCount){popFlag=1(jsでポップアップの表示条件),redirect user_new}
        //if(userCount>=5){popFlag=3()}

        DB::table('k_user')->insert($users);
        return redirect('/user/calendar');
    }
}
