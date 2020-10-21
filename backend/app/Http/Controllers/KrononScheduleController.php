<?php

namespace App\Http\Controllers;

use App\Models\KrononSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class KrononScheduleController extends Controller
{

    public function calendar(Request $request)
    {

        // リクエストを検証を行う（後日書きます）
        // if (!$this->isValidRequestForCalendar($request)) {
        //     throw new BadRequestException(); // こんな感じの例外を返す
        // }

        //現在の年月を基準とした時の、表示する年月の差分        
        $month_counter = 0;


        if(isset($request->month_counter)){
            $month_counter = $request->month_counter;
        }

        $user_id = 1;//最終的にはログイン情報に応じて変更
        $string = $month_counter.' '.'month';
        $period = [
            'date_first' => date('Y-m-01', strtotime($string)),
            'date_end' => date('Y-m-t', strtotime($string)),
            'year' => date("Y", strtotime($string)),
            'month' => date("m", strtotime($string)),
        ];

        $db_items = KrononSchedule::getFirstScheduleByUserIdWithPeriod($user_id, $period);


        $items = ['schedule_list' => json_encode($db_items), 'period' => $period];
        return view('calendar.calendar',$items);
    
    }
}
