<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    //Many to Many con Project
    public function projects() {
        return $this->belongsToMany(Project::class);
    }
}
