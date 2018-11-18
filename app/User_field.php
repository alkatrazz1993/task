<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_field extends Model
{
    protected $fillable = ['field_path'];

    public function user_field_value()
    {
        return $this->hasMany('App\User_field_value', 'user_field_id');
    }
}
