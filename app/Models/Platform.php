<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    //Many To Many con Review
    public function reviews()
    {
        return $this->belongsToMany(Review::class);
    }
}
