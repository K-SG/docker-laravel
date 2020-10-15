<?php

use Illuminate\Support\Facades\Route;

// namespace App\Http\Controllers;
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
//
//Route::get('hello', function () {
//    return view('hello');
//});


Route::get('test3_1','App\Http\Controllers\Test3Controller@test3');

Route::get('test3_14','App\Http\Controllers\Test3Controller@test3_14');
Route::post('test3_14','App\Http\Controllers\Test3Controller@test3_14_post');
Route::get('test3_27','App\Http\Controllers\Test3Controller@test3_27');
Route::get('test4_5','App\Http\Controllers\Test3Controller@test3_27');
Route::get('test5_5','App\Http\Controllers\Test5Controller@test5_5');
    
Route::get('hello','App\Http\Controllers\HelloController@index');

Route::post('hello','App\Http\Controllers\HelloController@post');

Route::get('hello/add','App\Http\Controllers\HelloController@add');

Route::post('hello/add','App\Http\Controllers\HelloController@create');