<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Exceptions\BadRequestException;


use App\Models\Schedule;

class ScheduleDetailController extends Controller
{
    public function datail(Request $request)
    {
        $db_items = Schedule::getScheduleByScheduleId($request->schedule_id)->first();
        if (!isset($db_items)) {
            throw new BadRequestException();
        }
        return view('schedule.schedule_detail', ['db_items' => $db_items]);
    }
    public function delete(Request $request)
    {
        Schedule::scheduleDelete($request->scheduleId);
        return redirect('/user/scheduleshowall');
    }
}
