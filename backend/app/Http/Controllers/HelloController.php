<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    
    public function index(Request $request){
        // $data = [
        //     'msg'=>'お名前を入力してくれ'
        // ];
        // return view('hello.index',$data);
        
        // return view('hello.index',['msg'=>'']);
        
        // $data = ['one','two','three','four','five'];
        // return view('hello.index');

        // $data = [
        //     ['name'=>'山田太郎','mail'=>'taroro@yamada'],
        //     ['name'=>'田中花子','mail'=>'hanako@flower'],
        //     ['name'=>'鈴木幸子','mail'=>'sachiko@happy']
        // ];
        // return view('hello.index',['data'=>$data]);

        // $items = DB::select('select * from people');
        // return view('hello.index',['items' => $items]);
        if(isset($request->id)){
            $param = ['id' => $request->id];
            $items = DB::select('select * from people where id =:id',$param);
        }else{
            $items = DB::select('select * from people');
        }
        return view('hello.index',['items' =>$items]);
    }
    public function post(Request $request){
        // $msg = $request->msg;
        
        // $data = [
        //     'msg'=>'こんにちは！'.$msg.'さん！',
        // ];
        // return view('hello.index',$data);
        return view('hello.index',['msgii'=>$request->msg]);
    }
    public function add(Request $request){
        return view('hello.add');
    }
    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name,mail,age) values (:name,:mail,:age)',$param);
        return redirect('/hello');
    }
}
