<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //One To Many con Type:
    public function type(){
        return $this->belongsTo(Type::class);
    }

    //Many To Many con Technology
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
