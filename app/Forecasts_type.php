<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecasts_type extends Model
{
    protected $fillable = ['name'];

    public function forecast()
    {
        return $this->hasMany('App\Forecasts', 'forecasts_type_id');
    }
}
