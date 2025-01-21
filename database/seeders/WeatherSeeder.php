<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = CitiesModel::all();

        foreach ($cities as $city)
        {
            $userWeather = WeatherModel::where(['city_id' => $city->id])->first();
            if($userWeather != null)
            {
                $this->command->getOutput()->error("This city already exists.");
                continue;
            }
            WeatherModel::create([
                'city_id' => $city->id,
                'temperature' => rand(15,30),
            ]);
        }
    }
}
