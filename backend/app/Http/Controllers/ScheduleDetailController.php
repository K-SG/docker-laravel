<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Schedule;

class ScheduleDetailController extends Controller
{
    public function datail(Request $request)
    {
        $user = Auth::user();
        $schedule_id = 1;
        $db_items = Schedule::getScheduleByScheduleId($schedule_id)->first();
        return view('schedule.schedule_detail', ['db_items' => $db_items]);
    }
    public function delete(Request $request)
    {
        Schedule::scheduleDelete($request->scheduleId);
        $user = Auth::user();
        return redirect('/user/scheduleshowall');
    }
}
