<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityTemperaturesModel extends Model
{
    protected $table = 'weather';

    protected $fillable = [
        "city", "temperature"
    ];
}
