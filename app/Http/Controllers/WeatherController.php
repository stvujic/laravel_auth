<?php

namespace App\Http\Controllers;

use App\Models\CityTemperaturesModel;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $prognoza = CityTemperaturesModel::all();

        return view("weather", compact("prognoza"));
    }
}
