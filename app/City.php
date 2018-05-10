<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function refugees()
    {
        # Author has many Books
        # Define a one-to-many relationship.
        return $this->hasMany('App\Refugee');
    }
}
