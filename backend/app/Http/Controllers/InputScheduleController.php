<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KrononUser;
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
        dump($user);
        $user_id = $user->id;

        $schedules = new schedules;
        //バリデーション
        //値を保存formrequest
        $schedules->user_id = $user_id;
        $schedules->schedule_date = $request->scheduleDate;
        $schedules->start_time = $request->startTimeHour . ":" . $request->startTimeMin . ":" . "00";
        $schedules->end_time = $request->endTimeHour . ":" . $request->endTimeMin . ":" . "00";
        $schedules->place = $request->place;
        $schedules->title = $request->title;
        $schedules->content = $request->content;
        $user = Auth::user();
        dump($user);

        return view('calendar.calendar');

    }

}