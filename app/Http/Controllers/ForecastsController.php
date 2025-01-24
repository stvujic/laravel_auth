<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;

class ForecastsController extends Controller
{
    public function search(Request $request)
    {
        $cityName = $request->get("city");

        $cities =CitiesModel::with('todaysForecast')
            ->where("name", "LIKE", "%$cityName%")->get();

        if(count($cities)==0)
        {
            return redirect()->back()->with("error","Nismo pronasli gradove sa trazenim kriterijumom");
        }

        return view("search_results", compact("cities"));
    }
}
