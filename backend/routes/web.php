<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    return view('hello');
});


// Route::get('user/calendar','App\Http\Controllers\CalendarController@calendar');
// Route::post('user/calendar','App\Http\Controllers\CalendarController@calendar');

Route::get('user/calendar','App\Http\Controllers\KrononScheduleController@calendar');
Route::post('user/calendar','App\Http\Controllers\KrononScheduleController@calendar');