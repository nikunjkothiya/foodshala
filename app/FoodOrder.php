<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
    protected $table = 'food_order';
    protected $guarded = [];

    public function food_user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function food()
    {
        return $this->hasOne('App\Food','id','food_id');
    }
}
