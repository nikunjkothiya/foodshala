<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $guarded = [];

    public function user_order()
    {
        return $this->belongsToMany('App\User');
    }
    public function restaurant_details()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
