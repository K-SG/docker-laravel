<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Exceptions\BadRequestException;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\HttpResponseException;


use App\Models\Schedule;

class CreateScheduleController extends Controller
{
    public function create(Request $request)
    {
        try{

            $schedule_date = $request->schedule_date;
            $start_time = $request->start_time;
            $end_time = $request->end_time;

            $user_id = 1;

            $schedule = Schedule::isBooking($schedule_date, $user_id, 0, $start_time, $end_time);
            
            return response()->json([
                'success' => true,
                'code' => 200,
                'data' => 
                        [
                            'title' => $request->title,
                            'schedule_date' => $request->schedule_date,
                            'place' => $request->place,
                            'start_time' => $request->start_time,
                            'end_time' => $request->end_time,
                            'content' => $request->content,
                            'delete_flag' => 0,
                        ]
            ],200);
        }catch(Exception $e){
            throw new HttpResponseException(response()->json([
                'success' => false,
                'code' => 500,
                'message' => "問題が発生しちゃったよ"//$e,
            ], 500));
        }


        $schedule = Schedule::getScheduleByScheduleId($request->schedules_id)->first();
        if (is_null($schedule)) {
            throw new BadRequestException();
        }
        return view('calendar.calendar', ['schedule' => $schedule]);
    }

}