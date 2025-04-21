<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Relazione Many-to-One con il modello Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relazione Many-to-Many con il modello Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
