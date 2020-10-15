<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function calendar()
    {
        return view('calendar.calendar');
    }

    public function test3_14(Request $request)
    {
        $data = [
            'id'=>$request->id,
            'msg'=>'お名前を入力してください'
        ];
        return view('test3.test14',$data);
    }
    public function test3_14_post(Request $request){
        $msg = $request->msg;
        $data = [
            'id'=>$request->id,
            'msg'=>'こんにちは'.$msg.'さん！'
        ];
        return view('test3.test14',$data);
    }

    public function test3_27()
    {
        return view('test3.test27');
    }
}
