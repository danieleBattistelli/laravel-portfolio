<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    // Relazione One-to-Many con il modello Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
