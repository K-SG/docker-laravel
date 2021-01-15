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

            $schedule = Schedule::editSchedule(
                $id,
                $request->schedule_date,
                $request->start_time,
                $request->end_time,
                $request->place,
                $request->title,
                $request->content
            );
            // if ($schedule == 0) {
            //     return response()->json([
            //         'success' => false,
            //         'code' => 404,
            //         'message' => "お探しのページが見つからなかったよ。"//$e,
            //     ], 404);
            // }
            $schedule = Schedule::getScheduleByScheduleId($id)->first();
            return response()->json([
                'success' => true,
                'code' => 200,
                'data' =>
                [
                    'id' => $schedule->schedule_id,
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
