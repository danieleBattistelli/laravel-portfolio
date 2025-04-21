<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Relazione Many-to-One con il modello Type
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Relazione Many-to-Many con il modello Technology
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
