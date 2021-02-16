<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CalendarRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use CreateUsersTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class EditScheduleController extends ApiController
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
    public function update(EditScheduleRequest $request)
    {
        $id = $request->id;
        try {

            $user_id = Auth::user()->id;
            $result = Schedule::where('user_id',$user_id)->where('id',$id)->get()->first();
            //return $result;   
            if(is_null($result)){
                return response()->json([
                    'success' => false,
                    'code' => 403,
                    'message' => "認可されてないよ"
                ], 403);
            }
            $time = date_create($request->start_time);
            $start_time = date_format($time, 'H:i:s');
            
            $time = date_create($request->end_time);
            $end_time = date_format($time, 'H:i:s');
            
            $schedule = Schedule::isBooking($request->schedule_date, $user_id, $id, $start_time, $end_time);
            if (empty($schedule)) {
                $schedule = new Schedule;
                //データベースに値を送信
                $schedule = Schedule::editSchedule(
                    $id,
                    $request->schedule_date,
                    $request->start_time,
                    $request->end_time,
                    $request->place,
                    $request->title,
                    $request->content
                );
            }else{
                return response()->json([
                    'success' => false,
                    'code' => 400,
                    'message' => "予定が被っているよ。",//$validator->errors()->toArray(),
                ], 400);
            }
    
            $schedule = Schedule::getScheduleByScheduleId($id)->first();
            return response()->json([
                'success' => true,
                'code' => 200,
                'data' =>
                [
                    'schedule_id' => $schedule->id,
                    'title' => $schedule->title,
                    'schedule_date' => $schedule->schedule_date,
                    'place' => $schedule->place,
                    'start_time' => $schedule->start_time,
                    'end_time' => $schedule->end_time,
                    'content' => $schedule->content,
                ]
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
