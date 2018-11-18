<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $fillable = ['zodiac_id', 'date', 'text', 'forecasts_type_id'];

    public function zodiac()
    {
        return $this->hasOne('App\Zodiac', 'id', 'zodiac_id');
    }

    public function forecasts_type()
    {
        return $this->hasOne('App\Forecasts_type', 'id', 'forecasts_type_id');
    }
}
