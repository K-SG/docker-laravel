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
    
    public function scopegetScheduleByScheduleId($query,$schedule_id)
    {   
        $query
        ->where('schedules.id', $schedule_id)
        ->where('delete_flag',0)
        ->join('users','users.id','=','schedules.user_id')
        ->get();
        return $query;
    }
    public function scopescheduleDelete($query,$schedule_id)
    {
        $query
        ->where('id', $schedule_id)
        ->update([
            'delete_flag' => '1',
        ]);
        return $query;
    }
}
