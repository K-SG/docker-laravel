<?php

namespace App\Http\Controllers\Hoge;

use Illuminate\Routing\Controller as BaseController;

class HogeController extends BaseController
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
    public function index()
    {
        return "kronon2";
    }
}
