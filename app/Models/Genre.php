<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //One To Many con Review;
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
