<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //One To Many con Category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Many To Many con i Tags
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
