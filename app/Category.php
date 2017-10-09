<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function competitions()
    {
        return $this->belongsTo('App\Competition');
    }
}
