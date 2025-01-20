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
            WeatherModel::create([
                'city' => $city,
                'temperature' => $temperature,
            ]);
        }
    }
}
