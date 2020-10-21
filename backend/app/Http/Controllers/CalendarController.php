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

        
        $month_counter = 0;


        if(isset($request->month_counter)){
            $month_counter = $request->month_counter;

        }

        $string = $month_counter.' '.'month';
        
        $date_first = date('Y-m-01', strtotime($string)); 
        $date_end = date('Y-m-t', strtotime($string)); 

        $year = date("Y",strtotime($string));
        $month = date("m",strtotime($string));
        //$date_first = date('Y-m-01');
        //$date_end = date('Y-m-t');

        //$date1 = Carbon::createFromDate(2020,10,1);
        //$date2 = Carbon::createFromDate(2020, 10, 31);
        //dd($date1);
        // $param = ['id'=>1];
        //$param = ['user_id'=>1,'start_date'=>$date1,'end_date'=>'2020-10-31'];

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
        and delete_flag = 0 group by schedule_date) group by schedule_date,start_time',[1, $date_first, $date_end, 1]);
        
        //dd($db_items);
        //var_dump(json_encode($db_items)); exit;
        //$db_json = json_encode($db_items);
        $schedule_list = json_encode($db_items);
        $items = ['schedule_list'=>$schedule_list,'year'=>$year,'month'=>$month,'month_counter'=>$month_counter];
        return view('calendar.calendar',$items);
    }
}
