<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KrononUser;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\BadRequestException;

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

        $result = ['result' => 'error']; //成功：success、予定重複：booking、予期せぬエラー：error、


        $schedule_id = $_POST['schedule_id'];
        $schedule_date = $_POST['schedule_date'];

        $start_hour = sprintf('%02d', $_POST['start_hour']);
        $start_time = $start_hour . ":" . $_POST['start_minutes'] . ":" . "00";

        $end_hour = sprintf('%02d', $_POST['end_hour']);
        $end_time = $end_hour . ":" . $_POST['end_minutes'] . ":" . "00";

        $user = Auth::user();
        $user_id = $user->id;
        //予定が重複していないか確認
        $schedule = Schedule::isBooking($schedule_date, $user_id, $schedule_id, $start_time, $end_time);

        if (empty($schedule)) {
            $place = $_POST['new_place'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $schedule = new Schedule;
            //データベースに値を送信
            Schedule::editSchedule($schedule_id, $schedule_date, $start_time, $end_time, $place, $title, $content);

            $result = ['result' => 'success'];
            //return redirect('/user/calendar');
        } else {
            //return view('schedule.edit_schedule');
            $result = ['result' => 'booking'];
        }

        // ヘッダーの設定
        header('Content-type:application/json; charset=utf8');
        // JSON形式にして返却
        echo json_encode($result);
    }
}
