<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\BadRequestException;

class KrononScheduleController extends Controller
{

    public function calendar(Request $request)
    {
        // リクエストを検証を行う
        if (!$this->isValidRequestForCalendar($request)) {
            throw new BadRequestException($request,["CalendarRequestError"]); // こんな感じの例外を返す
        }

        //現在の年月を基準とした時の、表示する年月の差分  
        //$request->month_counterがnullであれば0を格納          
        $month_counter = $request->month_counter ?? 0;

        $user_id = 1; //最終的にはログイン情報に応じて変更
        $string = $month_counter . ' ' . 'month';
        $period = [
            'date_first' => date('Y-m-01', strtotime($string)),
            'date_end' => date('Y-m-t', strtotime($string)),
            'year' => date("Y", strtotime($string)),
            'month' => date("m", strtotime($string)),
        ];

        $db_items = Schedule::getFirstScheduleByUserIdWithPeriod($user_id, $period);
        
        $items = [
            'schedule_list' => json_encode($db_items),
            'period' => $period,
            'month_counter' => $month_counter
        ];

        return view('calendar.calendar', $items);
    }

    public function isValidRequestForCalendar($request){
        if(isset($request->month_counter)){
            $this->validate($request,['month_counter','numeric']);

            $validator = Validator::make($request->all(), [
                'month_counter' => 'numeric',
            ]);

            if ($validator->fails()) {
                return false;
                //throw new BadRequestException($request, $validator->errors()->all());
            }

        }
        return true;
    }
}
