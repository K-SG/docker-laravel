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


Route::get('test3_1','App\Http\Controllers\Test3Controller@test3');

Route::get('test3_14','App\Http\Controllers\Test3Controller@test3_14');
Route::post('test3_14','App\Http\Controllers\Test3Controller@test3_14_post');
Route::get('test3_27','App\Http\Controllers\Test3Controller@test3_27');
Route::get('test4_5','App\Http\Controllers\Test3Controller@test3_27');

Route::get('show','App\Http\Controllers\Test5Controller@test5_5');
Route::get('add','App\Http\Controllers\Test5Controller@add');
Route::get('edit','App\Http\Controllers\Test5Controller@to_edit');
Route::get('delete','App\Http\Controllers\Test5Controller@to_del');

Route::get('test5_5','App\Http\Controllers\Test5Controller@test5_5');
Route::get('test5_7','App\Http\Controllers\Test5Controller@test5_7');
Route::get('test5_8','App\Http\Controllers\Test5Controller@add');
Route::post('test5_8','App\Http\Controllers\Test5Controller@create');
Route::get('test5_11','App\Http\Controllers\Test5Controller@edit');
Route::post('test5_11','App\Http\Controllers\Test5Controller@update');
Route::get('test5_14','App\Http\Controllers\Test5Controller@del');
Route::post('test5_14','App\Http\Controllers\Test5Controller@remove');