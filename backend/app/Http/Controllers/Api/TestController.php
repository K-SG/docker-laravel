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

class TestController extends ApiController
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


    public function test_get1(Request $request){
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => "get成功☆"
        ], 200);
    }

    public function test_get2(Request $request){
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => $request->message
        ], 200);
    }

    public function test_post1(Request $request){
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => "post成功"
        ], 200);
    }

    public function test_post2(Request $request){
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => $request->message
        ], 200);
    }
    
}
