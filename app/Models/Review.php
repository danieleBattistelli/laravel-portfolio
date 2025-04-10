<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //One To Many con Genre;
    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    //Many To Many con Platform
    public function platforms(){
        return $this->belongsToMany(Platform::class);
    }
}
