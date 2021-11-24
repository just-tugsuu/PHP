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

/* Negdugeer heseg */

Route::get("student", "App\Http\Controllers\studentController@read");
Route::get("student/{studentCode}", "App\Http\Controllers\studentController@studentDetails");
Route::get("search", "App\Http\Controllers\studentController@search");


/* Hoyerdugaar heseg */

Route::get("account", "App\Http\Controllers\AccountTransaction@showAccounts");
Route::get("transaction", "App\Http\Controllers\AccountTransaction@makeTransaction");