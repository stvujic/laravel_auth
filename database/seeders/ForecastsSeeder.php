<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ForecastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = CitiesModel::all();

        foreach ($cities as $city)
        {
            for($i=0; $i<5; $i++)
            {
                $weatherType = ForecastsModel::WEATHERS[rand(0,2)];
                $probability = null;

                if($weatherType=="rainy" || $weatherType=="snowy")
                {
                    $probability = rand(1,100);
                }

                ForecastsModel::create([
                    'city_id' => $city->id,
                    'temperature' => rand(15,30),
                    'forecast_date' => Carbon::now()->addDays(rand(1,30)),
                    'weather_type' => $weatherType,
                    'probability' => $probability,
                ]);
            }
        }
    }
}
