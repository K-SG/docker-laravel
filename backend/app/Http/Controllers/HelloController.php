<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    // public function index(Request $request)
    // {
    //     $data = [
    //         'msg'=>'これはコントローラーで宣言したメッセージありがとう',
    //         'id'=>$request->id
    //     ];
    //     // dd($request);
    //     return view('hello.index',$data);
    // }
    
    public function index(){
        $data = [
            'msg'=>'お名前を入力してくれ'
        ];
        return view('hello.index',$data);
    }
    public function post(Request $request){
        $msg = $request->msg;
        $data = [
            'msg'=>'こんにちは！'.$msg.'さん！',
        ];
        return view('hello.index',$data);
    }
    
}
