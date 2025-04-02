<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Colleghiamo la categoria
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
