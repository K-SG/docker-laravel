<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KrononUser;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class InputScheduleController extends Controller
{
    public function inputSchedule()
    {
        $user = Auth::user();

        return view('schedule.inputschedule');
    }

    public function scheduleCreate(Request $request)
    {
        $schedule_date = $request->scheduleDate;
        $start_time = $request->startTimeHour . ":" . $request->startTimeMin . ":" . "00";
        $end_time = $request->endTimeHour . ":" . $request->endTimeMin . ":" . "00";
        
        $user = Auth::user();
        $user_id = $user->id;
        //予定が重複していないか確認
        $exist = Schedule::isBooking($schedule_date, $user_id, $start_time, $end_time);

        if (empty($exist)) {
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
            $schedule->save();
            return redirect('/user/calendar');   
        } else {
            return view('schedule.inputschedule');
        }
        
    }

}