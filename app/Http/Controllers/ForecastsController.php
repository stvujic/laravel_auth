<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class ForecastsController extends Controller
{
    public function search(Request $request)
    {
        $cityName = $request->get("city");

        Artisan::call('weather:get-real', ['city' => $cityName]);

        $cities =CitiesModel::with('todaysForecast')
            ->where("name", "LIKE", "%$cityName%")->get();

        if(count($cities)==0)
        {
            return redirect()->back()->with("error","Nismo pronasli gradove sa trazenim kriterijumom");
        }

        $userFavourites = [];
        if(Auth::check())
        {
            $userFavourites = Auth::user()->cityFavourites;
            $userFavourites=$userFavourites->pluck("city_id")->toArray();
        }



        return view("search_results", compact("cities","userFavourites"));
    }
}
