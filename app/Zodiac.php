<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zodiac extends Model
{
    protected $fillable = ['name'];

    public function forecasts()
    {
        return $this->hasMany('App\Forecast', 'zodiac_id');
    }
}
