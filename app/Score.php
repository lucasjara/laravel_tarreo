<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
    public function events()
    {
        return $this->belongsTo('App\Event');
    }
}
