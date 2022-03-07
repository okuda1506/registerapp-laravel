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

Route::get('register','App\Http\Controllers\RegisterController@index');
Route::post('register','App\Http\Controllers\RegisterController@insertAndMail');
Route::get('register/people','App\Http\Controllers\RegisterController@people');
Route::get('register/people/download', 'App\Http\Controllers\CsvController@download');
