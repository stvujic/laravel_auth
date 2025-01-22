<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = $this->command->getOutput()->ask('Koje ime grada zelis da uneses?');
        if($city ===null)
        {
            $this->command->getOutput()->error("Niste uneli ime grada.");
        }

        $temperature = $this->command->getOutput()->ask('Koju temperaturu zelis da uneses za taj grad?');
        if($temperature ===null)
        {
            $this->command->getOutput()->error("Niste uneli temperaturu za taj grad.");
        }
        WeatherModel::create([
            'city' => $city,
            'temperature' => $temperature,
        ]);

        $this->command->getOutput()->info("Uspesno ste uneli novi grad $city sa temperaturom od $temperature stepeni u bazu podataka");
    }
}
