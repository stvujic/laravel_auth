<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $prognoza = WeatherModel::all();

        return view("weather", compact("prognoza"));
    }
}
