<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CalendarRequest;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use CreateUsersTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends ApiController
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
    public function index(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json([
            'success' => true,
            'code' => 201,
            'data' => 
                    [
                        'name' => $user->name,
                        'email' => $user->email
                    ]
        ],201);
    }
}
