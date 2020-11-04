<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('user/calendar', 'App\Http\Controllers\CalendarController@calendar')->middleware('auth');
//Route::post('user/calendar', 'App\Http\Controllers\CalendarController@calendar')->middleware('auth');

Route::get('user/scheduleshowall', 'App\Http\Controllers\ScheduleController@show_all')->middleware('auth');
//Route::post('user/scheduleshowall', 'App\Http\Controllers\ScheduleController@show_all');
    
Route::get('user/scheduledetail', 'App\Http\Controllers\ScheduleDetailController@detail')->middleware('auth');
Route::post('user/scheduledelete', 'App\Http\Controllers\ScheduleDetailController@delete');

//Route::get('user/calendar','App\Http\Controllers\CalendarController@calendar');
Route::get('mylogin','App\Http\Controllers\LoginController@topPage');
Route::post('mylogin','App\Http\Controllers\LoginController@login');
// Route::get('usernew','App\Http\Controllers\UserController@add');
// Route::post('usercreate', 'App\Hsttp\Controllers\UserController@register');
Auth::routes();
Route::post('mylogout', 'App\Http\Controllers\LogoutController@logout')->middleware('auth');

Route::get('user/input_schedule', 'App\Http\Controllers\InputScheduleController@inputSchedule')->middleware('auth');
Route::post('user/schedule_create', 'App\Http\Controllers\InputScheduleController@scheduleCreate')->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
