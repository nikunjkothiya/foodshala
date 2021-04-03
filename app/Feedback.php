<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
