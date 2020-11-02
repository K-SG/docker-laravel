<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Schedule extends Model
{
    use HasFactory;

    public static function getFirstScheduleByUserIdWithPeriod($userId, $period)
    {

        $db_items = DB::select('select schedule_date as jsonDate,start_time,min(title) as title from schedules
        where user_id = ? and delete_flag = 0 
        and schedule_date between ? and ? and (schedule_date,start_time) in (
        select schedule_date,min(start_time) from schedules where user_id = ? 
        and delete_flag = 0 group by schedule_date) group by schedule_date,start_time', [$userId, $period['date_first'], $period['date_end'], $userId]);

        return $db_items;
    }

    //かぶっている予定を取得したい
    public static function bookingSchedule($schedule_date, $user_id, $start_time, $end_time)
    {
        $scedule = DB::select('select * from schedules 
                                where schedule_date = ? 
                                and user_id = ? 
                                and delete_flag = 0 
                                and not ((? <= start_time) or (end_time <= ?))', [$schedule_date, $user_id, $end_time, $start_time]);

        return $schedule;
    }
    
    public static function isBooking($schedule_date, $user_id, $start_time, $end_time)
    {
        return !empty(self::bookingSchedule($schedule_date, $user_id, $start_time, $end_time));
    }
}
