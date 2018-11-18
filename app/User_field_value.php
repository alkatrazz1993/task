<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_field_value extends Model
{
    protected $fillable = ['value' , 'user_id', 'user_field_id'];

    public function user_field()
    {
        return $this->hasOne('App\User_field', 'id', 'user_field_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
