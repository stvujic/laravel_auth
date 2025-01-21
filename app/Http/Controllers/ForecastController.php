<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function index($city)
    {
        $forecasts = [
            "beograd" => [20,23,26,19,25],
            "sarajevo" => [28,21,25,18,24],
        ];

        $city = strtolower($city);
        
        if(!array_key_exists($city, $forecasts))
        {
            die("City $city does not exist.");
        }

        dd($forecasts[$city]);
    }
}
