<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\BadRequestException;
use Illuminate\Support\Facades\Auth;
use DateTime;

class CalendarController extends Controller
{

    public function calendar(Request $request)
    {
        // リクエストを検証を行う
        // ユーザーが意図的に細工しないと起こらない結果の時は、BadRequestにする
        // ユーザーが入力するフォームのときはフォームリクエストを使う
        if (!$this->isValidRequestForCalendar($request)) {
            throw new BadRequestException("CalendarRequestError"); 
        }


        $input_date_str = $request->date ?? 'now';
        $input_date = new DateTime($input_date_str);

        $user = Auth::user();

        $user_id = $user->id; 
        $period = [
            'date_first' => $input_date->format('Y-m-01'),
            'date_end' => $input_date->format('Y-m-t'),
            'year' => $input_date->format('Y'),
            'month' => $input_date->format('m'),
            'date' => $input_date->format('Y-m-d'),
        ];

        $db_items = Schedule::getFirstScheduleByUserIdWithPeriod($user_id, $period);
        
        $items = [
            'schedule_list' => json_encode($db_items),
            'period' => $period,
        ];

        return view('calendar.calendar', $items);
    }


    public function isValidRequestForCalendar($request){

        $validator = Validator::make($request->all(), [
            'date' => 'date_format:Y-m-d',
        ]);
        if ($validator->fails()) {
            return false;
        }

        return true;
    }


}
