<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // API 2 
    // INSERT THEN FETCH DATA 
    public function makeBooking(Request $request) {

    }

    public function BookingScreen($id) {
        return view("booking");
    } 
}
