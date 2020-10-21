<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KrononSchedule extends Model
{
    use HasFactory;

    public static function getFirstScheduleByUserIdWithPeriod($userId, $period)
    {

        $db_items = DB::select('select schedule_date as jsonDate,start_time,min(title) as title from k_schedule 
        where user_id = ? and delete_flag = 0 
        and schedule_date between ? and ? and (schedule_date,start_time) in (
        select schedule_date,min(start_time) from k_schedule where user_id = ? 
        and delete_flag = 0 group by schedule_date) group by schedule_date,start_time', [$userId, $period['date_first'], $period['date_end'], $userId]);

        return $db_items;
    }
}
