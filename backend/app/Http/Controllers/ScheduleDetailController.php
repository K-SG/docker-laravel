<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exceptions\BadRequestException;


use App\Models\Schedule;

class ScheduleDetailController extends Controller
{
    public function detail(Request $request)
    {
        $schedule = Schedule::getScheduleByScheduleId($request->schedule_id)->first();
        dd($schedule);
        if (is_null($schedule)) {
            throw new BadRequestException();
        }
        return view('schedule.schedule_detail', ['schedule' => $schedule]);
    }

    public function delete(Request $request)
    {
        dd($request->scheduleId);
        Schedule::scheduleDelete($request->scheduleId);
        return redirect('/user/calendar');
    }
}
