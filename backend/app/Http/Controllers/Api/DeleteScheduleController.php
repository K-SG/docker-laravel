<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CalendarRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditScheduleRequest;
use App\Http\Requests\DeleteScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use CreateUsersTable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Controllers\Api\Content;


class DeleteScheduleController extends ApiController
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
    public function delete(DeleteScheduleRequest $request)
    {
        $id = $request->id;
        //db内にこのレコードのデータ歩かないかをフォームリクエストにある
        //softdalete Laravel標準の論理削除
        try{
            $schedule = Schedule::find($id)->delete();
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => "予定の削除に成功したよ"
            ], 200);

        } catch (Exception $e) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'エラーが発生したよ',
            ], 500));
        }
    }
}
