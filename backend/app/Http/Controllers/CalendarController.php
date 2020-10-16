<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CalendarController extends Controller
{
    // public function calendar()
    // {
    //     return view('calendar.calendar');
    // }

    public function calendar(Request $request)
    {
        $date1 = Carbon::createFromDate(2020, 10, 1);
        $date2 = Carbon::createFromDate(2020, 10, 31);
        // $param = ['id'=>1];
        $param = ['user_id'=>1,'start_date'=>$date1,'end_date'=>'2020-10-31'];

        //$id=1;

        // $db_items = DB::table('k_schedule')
        // ->where('user_id',$id)
        // ->where('schedule_date','<=',$date2)
        // ->where('schedule_date','>=',$date1)
        // ->get(['schedule_date','start_time','title']);
        
        // $db_items = DB::select('select schedule_date,start_time,min(title) from k_schedule 
        // where user_id = :id
        // group by schedule_date,start_time'
        // ,$param);
        
        $db_items = DB::select('select schedule_date as jsonDate,start_time,min(title) as title from k_schedule 
        where user_id = ? and delete_flag = 0 
        and schedule_date between ? and ? and (schedule_date,start_time) in (
        select schedule_date,min(start_time) from k_schedule where user_id = ? 
        and delete_flag = 0 group by schedule_date) group by schedule_date,start_time',[1, $date1, $date2, 1]);
        
        //dd($db_items);
        //var_dump(json_encode($db_items)); exit;
        //$db_json = json_encode($db_items);
        $db_json = json_encode($db_items);
        return view('calendar.calendar',['db_items'=>$db_json]);
    }
}
