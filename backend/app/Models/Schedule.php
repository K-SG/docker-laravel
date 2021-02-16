<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static function getFirstScheduleByUserIdWithPeriod($userId, $period)
    {
        //27行目をdeleted_atにしてnullにしました。softdeleteのせい
        $db_items = DB::select('select schedule_date as date, start_time, min(title) as title 
                                from schedules
                                where user_id = ? 
                                and deleted_at is null
                                and schedule_date between ? and ? 
                                and (schedule_date,start_time) in (
                                    select schedule_date,min(start_time) 
                                    from schedules 
                                    where user_id = ? 
                                    and deleted_at is null 
                                    group by schedule_date) 
                                group by schedule_date,start_time', 
                                [$userId, $period['date_first'], $period['date_end'], $userId]);
            
        return $db_items;
    }
    //かぶっている予定を取得したい
    public static function bookingSchedule($schedule_date, $user_id, $start_time, $end_time)
    {
        $schedule = DB::select('select * from schedules 
                                where schedule_date = ? 
                                and user_id = ? 
                                and deleted_at is null 
                                and not ((? <= start_time) or (end_time <= ?))', [$schedule_date, $user_id, $end_time, $start_time]);

        return $schedule;
    }
                               
   public static function getScheduleByUserIdWithPeriod($userId, $period)
   {

        // $db_items = DB::select('select schedules.id as schedule_id, users.id as user_id, title, schedule_date, start_time, end_time, place
        //   from schedules inner join users on users.id = schedules.user_id
        // where delete_flag = 0 and schedules.user_id = ? and schedule_date = ? order by start_time;
        // ', [$userId, $period['date']]);

        $db_items = self::select([
            'schedules.id as schedule_id', 
            'user_id', 'title', 
            'schedule_date', 
            'start_time', 
            'end_time', 
            'place'])
        ->where('user_id','=',$userId)
        ->where('schedule_date','=',$period['date'])
        // ->where('delete_flag','=',0)
        ->whereNull('deleted_at')
        ->orderBy('start_time','asc')
        ->join('users','users.id','=','schedules.user_id')
        ->get()->toArray();
        

       return $db_items;
   }
    
    public static function isBooking($schedule_date, $user_id, $schedule_id, $start_time, $end_time)
    {
        $schedule = DB::select('select * from schedules 
                                where schedule_date = ? 
                                and user_id = ? 
                                and deleted_at is null 
                                and id <> ?
                                and not ((? <= start_time) or (end_time <= ?))', [$schedule_date, $user_id, $schedule_id, $end_time, $start_time]);
        return $schedule;
    }
    
    public function scopegetScheduleByScheduleId($query,$schedule_id)
    {   
        $query = self::select([
            'user_id',
            'schedules.id as id',
            'schedule_date',
            'start_time',
            'end_time',
            'place',
            'title',
            'content',
            'name',])
            ->where('schedules.id',$schedule_id)
            ->whereNull('deleted_at')
            ->join('users','users.id','=','schedules.user_id')
            ->get();
        return $query;
    }
    
    // public function scopescheduleDelete($query,$schedule_id)
    // {
    //     $result =
    //     $query
    //     ->where('id', $schedule_id)
    //     ->update([
    //         'delete_flag' => '1',
    //     ]);
    //     return $result;
    // }
    

    public function scopeEditschedule($query, $schedule_id, $schedule_date, $start_time, $end_time, $place, $title, $content)
    {
        $result = $query
        // $query
        ->where('id', $schedule_id)
        ->whereNull('deleted_at')
        ->update([
            'schedule_date' => $schedule_date,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'place' => $place,
            'title' => $title,
            'content'=> $content,
        ]);
        return $result;
    }
}
