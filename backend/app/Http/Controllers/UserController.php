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
        DB::table('k_user')->insert($users);
        return redirect('/user/calendar');
    }
}
