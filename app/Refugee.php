<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refugee extends Model
{
    public function city()
    {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\City');
    }

    public function families()
    {
        # withTimestamps will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Family')->withTimestamps();
    }
}
