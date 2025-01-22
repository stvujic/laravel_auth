<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherModel extends Model
{
    protected $table = 'weather';

    protected $fillable = [
        "city_id", "temperature"
    ];

    public function city() //pravimo relaciju sa modelom CitiesModel tj tabelom cities koja ima polje id
    {
        return $this->hasOne("App\Models\CitiesModel", "id", "city_id");
    }
}
