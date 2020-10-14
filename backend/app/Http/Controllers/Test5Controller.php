<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Util\Html5Entities;

class Test5Controller extends Controller
{


    public function test5_5(Request $request)
    {
        $items = DB::select('select * from people');
        return view('test5.test5',['items'=>$items]);
    }

    public function test5_7(Request $request)
    {
        if(isset($request->id))
        {
            $param = ['id'=>$request->id];
            $items = DB::select('select * from people where id = :id',$param);
        }else{
            $items = DB::select('select * from people');
        }
        return view('test5.test5',['items'=>$items]);
    }

    public function add(Request $request)
    {
        return view('test5.test8');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people(name,mail,age) values (:name,:mail,:age)',$param);
        return redirect('test5_5');
    }

    public function edit(Request $request)
    {
      
        if(isset($request->id))
        {
            
            //dd($request);
            $param = ['id'=>$request->id];
            $item = DB::select('select * from people where id = :id',$param);
            return view('test5.test11',['form'=>$item[0]]);
        }else{
            return redirect('test5_5');
        }
        
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('update people set name=:name,mail=:mail,age=:age where id=:id',$param);
        return redirect('test5_5');
    }

    public function del(Request $request)
    {
      
        if(isset($request->id))
        {
            $param = ['id'=>$request->id];
            $item = DB::select('select * from people where id = :id',$param);
            return view('test5.test14',['form'=>$item[0]]);
        }else{
            return redirect('test5_5');
        }
        
    }

    public function remove(Request $request)
    {
        $param = [
            'id' => $request->id,
        ];
        DB::delete('delete from people where id=:id',$param);
        return redirect('test5_5');
    }

    public function to_edit(Request $request)
    {
        return view('test5.edit');
    }

    public function to_del(Request $request)
    {
        return view('test5.delete');
    }

}
