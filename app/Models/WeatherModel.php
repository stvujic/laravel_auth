<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherModel extends Model
{
    protected $table = 'weather';

    protected $fillable = [
        "city", "temperature"
    ];
}
