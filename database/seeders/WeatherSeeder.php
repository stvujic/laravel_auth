<?php

namespace Database\Seeders;

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
        $prognoza = [
            "New York" => 20,
            "Washington" => 21,
            "London" => 22,
            "Paris" => 23,
        ];
        foreach ($prognoza as $city => $temperature)
        {
            $userWeather = WeatherModel::where(['city' => $city])->first();
            if($userWeather != null)
            {
                $this->command->getOutput()->error("This city already exists.");
                continue;
            }

            WeatherModel::create([
                'city' => $city,
                'temperature' => $temperature,
            ]);
        }
    }
}
