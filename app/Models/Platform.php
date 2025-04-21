<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    // Relazione Many-to-Many con il modello Review
    public function reviews()
    {
        return $this->belongsToMany(Review::class);
    }
}
