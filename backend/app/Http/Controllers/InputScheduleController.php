<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KrononUser;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class InputScheduleController extends Controller
{
    public function inputschedule()
    {
        $user = Auth::user();

        return view('schedule.inputschedule');
    }

    public function schedulecreate(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $schedule = new Schedule;
        //バリデーション
        //値を保存formrequest
        $schedule->user_id = $user_id;
        $schedule->schedule_date = $request->scheduleDate;
        $schedule->start_time = $request->startTimeHour . ":" . $request->startTimeMin . ":" . "00";
        $schedule->end_time = $request->endTimeHour . ":" . $request->endTimeMin . ":" . "00";
        $schedule->place = $request->place;
        $schedule->title = $request->title;
        $schedule->content = $request->content;
        $schedule->delete_flag = 0;
        $schedule->save();
        $user = Auth::user();

        return view('schedule.inputschedule');

    }

}