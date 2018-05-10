<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    public function refugees() {
        return $this->belongsToMany('App\Refugee')->withTimestamps();
    }
}
