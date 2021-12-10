<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlightController extends Controller
{

    // API 
    public function searchFlight(Request $request) {
        return Flight::all();
    }

    public function getData(Request $request) {
       $apiURL = "http://127.0.0.1:8081/api/flight/search";
       $postInput = [
        'first_name' => 'Hardik', ];
        $headers = [
            'X-header' => 'value'];
        $response = Http::withHeaders($headers)->post($apiURL, $postInput);
        // showError or Succuss message depends on status Code
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
        return view("searchFlight", compact('responseBody'));
    }


    public function SearchScreen() {
        return view("searchFlight");
    }
}
