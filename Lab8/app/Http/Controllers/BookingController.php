<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    // INSERT THEN FETCH DATA 
    public function makeBooking(Request $request) {
        $date = Carbon::parse($request->birthDate)->format("Y-m-d");
        Booking::create([
            'passangerName' => $request->name,
            'passangerBirth' => $date,
            'createTime' => $request->create_at
        ]);

        return Booking::where('passangerName',$request->name)->first();
        
    }

    public function fetch(Request $request) {
        $createAt = Carbon::now()->toDateTimeString();
        $apiURL = "http://127.0.0.1:8081/api/flight/book";
        $InputValues = [
            'name' => $request->passangerName,
            'birthDate' => $request->birthDate,
            'create_at' => $createAt
        ];
        $headers = [
            'X-header' => 'value'];
            $response = Http::withHeaders($headers)->post($apiURL, $InputValues);
            $statusCode = $response->status();
            $response = json_decode($response->getBody(), true);
            return Redirect::back()->with("success", $response['id']);
    }

    public function BookingScreen($id) {
        return view("booking", compact("id"));
    } 
}
