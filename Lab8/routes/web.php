<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;
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

// Flight
Route::get('searchflight', [FlightController::class, "SearchScreen"]);
Route::post('searchflight', [FlightController::class, "getData"]);

// Flight Booking

Route::get('/booking/{id}', [BookingController::class, "BookingScreen"]);
