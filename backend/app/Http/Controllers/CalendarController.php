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
        //$param = ['id'=>1];
        $param = ['id'=>1,'start_date'=>$date1,'end_date'=>$date2];

        $db_items = DB::select('select schedule_date,start_time,min(title) from k_schedule 
        where user_id = :id
        group by schedule_date,start_time'
        ,$param);
        
        // $db_items = DB::select('select schedule_date,start_time,min(title) from k_schedule 
        // where user_id = :id and delete_flag = 0 
        // and schedule_date between :start_date and :end_date and (schedule_date,start_time) in (
        // select schedule_date,min(start_time) from k_schedule where user_id = :id 
        // and delete_flag = 0 group by schedule_date) group by schedule_date,start_time',$param);
        
        
        $db_json = json_encode($db_items);
        
        return view('calendar.calendar',['db_items'=>$db_json]);
    }
}
