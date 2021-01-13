<?php

namespace App\Http\Controllers\Api;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CalendarRequest;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalendarController extends Controller
{

    public function calendar(CalendarRequest $request)
    {

        try{

            $input_date_str = $request->date ?? 'now';
            $input_date = new DateTime($input_date_str);

            //token処理やってからuser_id取ろう
            //$user = Auth::user();
            //$user_id = $user->id; 
            $user_id = 1;

            $period = [
                'date_first' => $input_date->format('Y-m-01'),
                'date_end' => $input_date->format('Y-m-t'),
                'year' => $input_date->format('Y'),
                'month' => $input_date->format('m'),
                'date' => $input_date->format('Y-m-d'),
            ];

            $db_items = Schedule::getFirstScheduleByUserIdWithPeriod($user_id, $period);
            
            // $items = [
            //     'schedule_list' => json_encode($db_items),
            //     'period' => $period,
            // ];

            return response()->json([
                'success' => true,
                'code' => 200,
                'data' => $db_items,            
            ],200);

        }catch(Exception $e){
            throw new HttpResponseException(response()->json([
                'success' => false,
                'code' => 500,
                'message' => $e//"問題が発生しちゃったよ"//$e,
            ], 500));
        }
    }


    // public function isValidRequestForCalendar($request){

    //     $validator = Validator::make($request->all(), [
    //         'date' => 'date_format:Y-m-d',
    //     ]);
    //     if ($validator->fails()) {
    //         return false;
    //     }

    //     return true;
    // }


}
