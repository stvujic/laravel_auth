<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function sendCity(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'temperature' => 'required'
        ]);

        WeatherModel::create([
            "city" => $request -> get("city"),
            "temperature" => $request -> get("temperature")
        ]);

        return redirect("/admin/cities");
    }
    public function showCities()
    {
        $cities= WeatherModel::all();
        return view("table-cities", compact("cities"));
    }

    public function deleteCity($id)
    {
        $singleCity = WeatherModel::where(["id" => $id])->first();

        if($singleCity === null)
        {
            die("OVAJ GRAD NE POSTOJI");
        }
        $singleCity->delete();
        return redirect("/admin/cities");
    }

    public function singleCity(Request $request, $id)
    {
        $city= WeatherModel::where(["id" => $id])->first();

        if($city === null)
        {
            die("OVAJ GRAD NE POSTOJI");
        }

        return view("edit", compact("city"));
    }

    public function saveCity(Request $request, $id)
    {
        $city = WeatherModel::where(["id" => $id])->first();

        if($city === null)
        {
            die("OVAJ GRAD NE POSTOJI");
        }

        $city->city = $request -> get("city");
        $city->temperature = $request -> get("temperature");

        $city->save();
        return redirect("/admin/cities");
    }
}
