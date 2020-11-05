<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KrononUser;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class EditScheduleController extends Controller
{
    public function editSchedule(Request $request)
    {
        $schedule = Schedule::getScheduleByScheduleId($request->input('id'))->first();
        if (is_null($schedule)) {
            throw new BadRequestException();
        }

        return view('schedule.edit_schedule', ['schedule' => $schedule, 'title' => $schedule->title]);
    }

    public function editComplete(Request $request)
    {
        $schedule_id = $request->scheduleId;
        $schedule_date = $request->scheduleDate;
        $start_time = $request->startTimeHour . ":" . $request->startTimeMin . ":" . "00";
        $end_time = $request->endTimeHour . ":" . $request->endTimeMin . ":" . "00";
        $user = Auth::user();
        $user_id = $user->id;
        //予定が重複していないか確認
        $schedule = Schedule::isBooking($schedule_date, $user_id, $schedule_id, $start_time, $end_time);

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
            $schedule->save();
            return redirect('/user/calendar');
        } else {
            return view('schedule.edit_schedule');
        }
        
    }

}