<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\KrononUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LogoutController extends ApiController
{

    public function logout()
    {
        // Auth::logout();
  
        // return response()->json([
        //         'success' => true,
        //         'code' => 200,
        //         'data' => $api_token,            
        //     ],200);

        // auth()->logout();

        // return response()->json(['message' => 'Successfully logged out']);

        $user = Auth::user();
        $api_token = $user->api_token;
        $user->update(['api_token' => null]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $user->api_token,            
        ],200);

    }

}