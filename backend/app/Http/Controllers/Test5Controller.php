<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Test5Controller extends Controller
{


    public function test5_5(Request $request)
    {
        $items = DB::select('select * from people');
        return view('test5.test5',['items'=>$items]);
    }
}
