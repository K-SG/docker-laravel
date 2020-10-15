<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test4Controller extends Controller
{
    public function test4_5(Request $request)
    {
        return view('test4.test5',['data'=>$request->data]);
    }

    public function test4_6(Request $request)
    {
        return view('test4.test6');
    }

    public function test4_14(Request $request)
    {
        // dd($request);
        return view('test4.test14',['msg'=>'フォームを入力']);
    }

    public function input_check(Request $request)
    {
        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
        $this->validate($request,$validate_rule);
        //dd($request);
        return view('test4.test14',['msg'=>'正しく入力されました！']);
    }
    
    public function test4_18(Request $request)
    {
        // dd($request);
        return view('test4.test18',['msg'=>'フォームを入力']);
    }

    public function input_check2(Request $request)
    {
        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
        $this->validate($request,$validate_rule);
        //dd($request);
        return view('test4.test18',['msg'=>'正しく入力されました！']);
    }
}
