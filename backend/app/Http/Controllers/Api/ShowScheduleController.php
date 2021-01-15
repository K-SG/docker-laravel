<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CalendarRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditScheduleRequest;
use App\Http\Requests\DeleteScheduleRequest;
use App\Http\Requests\ShowScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use CreateUsersTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;
use PhpParser\Node\Expr\Cast\String_;
use DateTime;
use Illuminate\Support\Facades\Auth;

class ShowScheduleController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show_all(ShowScheduleRequest $request)
    {
        // return response()->json(["schedule" => $date]);
         //return response()->json(["schedule" => $schedule]);
        try {
            $input_date_str = $request->date;
            $input_date = new DateTime($input_date_str);

            // $user = Auth::user();
            //$user_id = $user->id; 
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;
            // $user = Auth::user();
            // $user_id = $user->id;
            // $user_name =　$user->name;

            
            // $user_id = 5;
            // $user_name = "nakaneeee";
            $user_list = User::getUserInfoMax4ExcludeMe($user_id);

            $period = [
                'date' => $input_date->format('Y-m-d'),
            ];
            // return response()->json(["user_list" => $user_list]);

            array_unshift($user_list, array('id' => $user_id, 'name' => $user_name));//先頭に追加
            
            $schedule_list = [];  
            // foreach($user_list as $user){
            //     $db_items = Schedule::getScheduleByUserIdWithPeriod($user['id'], $period);
            //     array_push($schedule_list, $db_items);
            // }
            foreach($user_list as $user){
                $db_items = Schedule::getScheduleByUserIdWithPeriod($user['id'], $period);
                $all_items = [ 'name'=>$user['name'], 'schedules'=>$db_items];
                array_push($schedule_list, $all_items);
            }
            
            // return response()->json(
            //     [
            //         "schedule_list" => $schedule_list
            //     ]);

            return response()->json([
                'success' => true,
                'code' => 200,
                'data' => $schedule_list
            ], 200);

        } catch (Exception $e) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'code' => 500,
                'message' => $e,//'エラーが発生したよ',
            ], 500));
        }
    }
}
