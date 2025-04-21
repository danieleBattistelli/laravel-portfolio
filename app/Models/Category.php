<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Relazione One-to-Many con il modello Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
