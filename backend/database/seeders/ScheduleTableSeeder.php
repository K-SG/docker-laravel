<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id'=>1,
            'schedule_date'=>'2020-10-11',
            'start_time'=>'12:45:00',
            'end_time'=>'14:00:00',
            'place'=>'1',
            'title'=>'PHP',
            'content'=>'',
            'actual_time'=>75,
            'comment'=>'',
            'delete_flag'=>'0',
        ];
        DB::table('schedules')->insert($param);

        $param = [
            'user_id'=>1,
            'schedule_date'=>'2020-10-12',
            'start_time'=>'12:45:00',
            'end_time'=>'14:00:00',
            'place'=>'1',
            'title'=>'PHP',
            'content'=>'',
            'actual_time'=>75,
            'comment'=>'',
            'delete_flag'=>'0',
        ];
        DB::table('schedules')->insert($param);


        $param = [
            'user_id'=>1,
            'schedule_date'=>'2020-10-22',
            'start_time'=>'12:45:00',
            'end_time'=>'14:00:00',
            'place'=>'1',
            'title'=>'JavaScript',
            'content'=>'',
            'actual_time'=>75,
            'comment'=>'',
            'delete_flag'=>'0',
        ];
        DB::table('schedules')->insert($param);

        $param = [
            'user_id'=>1,
            'schedule_date'=>'2020-10-22',
            'start_time'=>'15:45:00',
            'end_time'=>'18:00:00',
            'place'=>'1',
            'title'=>'PHP',
            'content'=>'',
            'actual_time'=>75,
            'comment'=>'',
            'delete_flag'=>'0',
        ];
        DB::table('schedules')->insert($param);

        $param = [
            'user_id'=>2,
            'schedule_date'=>'2020-10-22',
            'start_time'=>'15:45:00',
            'end_time'=>'18:00:00',
            'place'=>'1',
            'title'=>'PHP',
            'content'=>'',
            'actual_time'=>75,
            'comment'=>'',
            'delete_flag'=>'0',
        ];
        DB::table('schedules')->insert($param);

        $param = [
            'user_id'=>1,
            'schedule_date'=>'2020-11-22',
            'start_time'=>'15:45:00',
            'end_time'=>'18:00:00',
            'place'=>'1',
            'title'=>'PHPPPPPP',
            'content'=>'',
            'actual_time'=>75,
            'comment'=>'',
            'delete_flag'=>'0',
        ];
        DB::table('schedules')->insert($param);

    }
}
