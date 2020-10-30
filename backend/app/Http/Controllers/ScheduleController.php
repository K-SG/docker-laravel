<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\BadRequestException;
use Illuminate\Support\Facades\Auth;
use DateTime;


class ScheduleController extends Controller
{

    public function show_all(Request $request)
    {
        // リクエストの検証を行う
        if (!$this->isValidRequestForShowAll($request)) {
            throw new BadRequestException("ScheduleShowAllRequestError"); 
        } 

        $input_date_str = $request->date ?? 'now';
        $input_date = new DateTime($input_date_str);

        if($request->flag == 'left'){
            $input_date->modify('-1 days');
        }else if($request->flag == 'right'){
            $input_date->modify('+1 days');
        }

        $period = [
            'date' => $input_date->format('Y-m-d'),
            'date_display' => $input_date->format('Y年m月d日'),
        ];


        $my_id = Auth::user()->id;
        $my_name = Auth::user()->name;

        $user_list = User::getUserInfoMax4ExcludeMe($my_id);

        array_unshift($user_list, array('id' => $my_id, 'name' => $my_name));//先頭に追加
        
        $schedule_list = [];   
        for($i = 0; $i < count($user_list); $i++){
            $db_items = Schedule::getScheduleByUserIdWithPeriod($user_list[$i]['id'], $period);
            array_push($schedule_list, $db_items);
        }

        $schedule_list = json_encode($schedule_list);
        $user_list = json_encode($user_list);

        $items = [
            'schedule_list' => $schedule_list,
            'user_list' => $user_list,
            'period' => $period,
        ];

        return view('schedule.schedule_show', $items);
    }

    
    public function isValidRequestForShowAll($request){

        $validator = Validator::make($request->all(), [
            'date' => 'date_format:Y-m-d',
            'flag' => 'in:left,right',
        ]);
        if ($validator->fails()) {
            return false;
        }

        return true;
    }

}
