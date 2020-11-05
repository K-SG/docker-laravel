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

Route::get('user/schedule_show_all', 'App\Http\Controllers\ScheduleController@show_all')->middleware('auth');
//Route::post('user/scheduleshowall', 'App\Http\Controllers\ScheduleController@show_all');
    
Route::get('user/schedule_detail', 'App\Http\Controllers\ScheduleDetailController@detail')->middleware('auth');
Route::post('user/schedule_delete', 'App\Http\Controllers\ScheduleDetailController@delete');

//Route::get('user/calendar','App\Http\Controllers\CalendarController@calendar');
Route::get('mylogin','App\Http\Controllers\LoginController@topPage');
Route::post('mylogin','App\Http\Controllers\LoginController@login');
// Route::get('usernew','App\Http\Controllers\UserController@add');
// Route::post('usercreate', 'App\Hsttp\Controllers\UserController@register');
Auth::routes();
Route::post('mylogout', 'App\Http\Controllers\LogoutController@logout')->middleware('auth');

Route::get('user/input_schedule', 'App\Http\Controllers\InputScheduleController@inputSchedule')->middleware('auth');
Route::post('user/schedule_create', 'App\Http\Controllers\InputScheduleController@scheduleCreateAjax')->middleware('auth');

Route::get('user/edit_schedule', 'App\Http\Controllers\EditScheduleController@editSchedule')->middleware('auth');
Route::post('user/edit_schedule', 'App\Http\Controllers\EditScheduleController@editComplete')->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
