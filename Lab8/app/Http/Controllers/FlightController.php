<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class FlightController extends Controller
{

    // API 
    public function searchFlight(Request $request) {
        $date = Carbon::parse($request->date)->format("Y-m-d");
        return Flight::where([
            ['departureAirport', '=', $request->departure],
            ['arraivalAirport', '=', $request->arrival],
            ['departureDate', '>=', $date]
        ])
        ->get();    
    }

    public function getData(Request $request) {
       $apiURL = "http://127.0.0.1:8081/api/flight/search";
       $postInput = [
        'departure' => $request->departure,
        'arrival' => $request->arrival,
        'date' => $request->departDate ];
        $headers = [
            'X-header' => 'value'];
        $response = Http::withHeaders($headers)->post($apiURL, $postInput);
        // showError or Succuss message depends on status Code
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
        // dd($request->departDate);
        return view("searchFlight", compact('responseBody'));
    }


    public function SearchScreen() {
        return view("searchFlight");
    }
}
