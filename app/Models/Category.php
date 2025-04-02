<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //colleghiamolo con i post
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
