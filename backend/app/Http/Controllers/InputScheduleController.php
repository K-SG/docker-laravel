<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class InputScheduleController extends Controller
{
    public function inputSchedule()
    {
        $user = Auth::user();
        $schedule = new Schedule;

        return view('schedule.inputschedule');
    }

    public function scheduleCreateAjax(Request $request)
    {

        $result =['result'=>'error'];//成功：success、予定重複：booking、予期せぬエラー：error、
       
        //Ajax通信でPOSTされたデータを受け取る
        $schedule_date = $_POST['schedule_date'];
        $start_time = $_POST['start_hour'] . ":" . $_POST['start_minutes'] . ":" . "00";
        $end_time = $_POST['end_hour'] . ":" . $_POST['end_minutes'] . ":" . "00";
        
        $user = Auth::user();
        $user_id = $user->id;

        //予定が重複していないか確認
        $schedule = Schedule::isBooking($schedule_date, $user_id, 0, $start_time, $end_time);
        // dd($schedule);

        if (empty($schedule)) {
            $schedule = new Schedule;
            //データベースに値を送信
            $schedule->user_id = $user_id;
            $schedule->schedule_date = $schedule_date;
            $schedule->start_time = $start_time;
            $schedule->end_time = $end_time;
            $schedule->place = $_POST['new_place'];
            $schedule->title = $_POST['title'];
            $schedule->content = $_POST['content'];
            $schedule->delete_flag = 0;
            if ($schedule->save()) {
                $result =['result'=>'success'];
            };
        } else {
            $result =['result'=>'booking'];
        } 

         // ヘッダーの設定
         header('Content-type:application/json; charset=utf8');
         // JSON形式にして返却
         echo json_encode($result);
        
    }

}