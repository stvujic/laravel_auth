<?php

namespace App\Http\Controllers;

use App\Models\ForecastsModel;
use Illuminate\Http\Request;

class AdminForecastsController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            "city_id" => "required|exists:cities,id",
            "temperature" => "required",
            "forecast_date" => "required",
            "weather_type" => "required",
        ]);

        ForecastsModel::create($request->all());
        return redirect()->back();
    }
}
