<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Exceptions\BadRequestException;
use App\Http\Requests\CreateScheduleRequest;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;


use App\Models\Schedule;

class CreateScheduleController extends Controller
{
    public function create(CreateScheduleRequest $request)
    {
        try{

            $schedule_date = $request->schedule_date;
            $start_time = $request->start_time;
            $end_time = $request->end_time;

            $user = Auth::user();
            $user_id = $user->id; 

            $schedule = Schedule::isBooking($schedule_date, $user_id, 0, $start_time, $end_time);

            if (empty($schedule)) {
                $schedule = new Schedule;
                //データベースに値を送信
                $schedule->user_id = $user_id;
                $schedule->schedule_date = $schedule_date;
                $schedule->start_time = $start_time;
                $schedule->end_time = $end_time;
                $schedule->place = $request->place;
                $schedule->title = $request->title;
                $schedule->content = $request->content;
                $schedule->delete_flag = 0;
                if ($schedule->save()) {
                    //$result =['result'=>'success'];
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
                };
            } else {
                //$result =['result'=>'booking'];
                return response()->json([
                    'success' => false,
                    'code' => 400,
                    'message' => "予定が被っているよ。",//$validator->errors()->toArray(),
                ], 400);
            } 
            
            return response()->json(['success' => false,
                'code' => 500,
                'message' => "問題が発生しちゃったよ。"//$e,
            ], 500);

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