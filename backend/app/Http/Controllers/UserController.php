<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function usernew(){
        $popFlag = 7;
        
        return view('user.user_new',['popFlag'=>$popFlag]);
    }
    public function usercreate(Request $request){
        $popFlag = 0;
        $users = [
            'user_name' => $request->userName,
            'mail' => $request->mail,
            'password'=> $request->password,
        ];
        $mailparam = ['mail' => $request->mail];
        
        //入力されてきたメールを条件にユーザーをselect
        //userCount = SELECT COUNT(*) FROM k_user WHERE mail = ?
        $bookingUser = DB::select('select * from k_user where mail = :mail', $mailparam);
        
        // dd($booking_usercount);
        if($bookingUser == null){
            $popFlag = 1;
            return view('user.user_new',['popFlag'=> $popFlag]);
        }
        DB::table('k_user')->insert($users);
        return view('user.user_new',['popFlag'=>$popFlag]);
    }
}
