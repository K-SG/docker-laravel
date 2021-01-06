<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CalendarRequest;
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
    public function index(CreateUserController $request)
    {
        // dd($request -> name);
        //r


        // return response()->json([
        //     'name' => $request -> name,
        //     'email' => $request -> email
        // ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json($user);

        // return response()->json([
        //     'users' => User::all()
        // ]);
    }
}
