<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['gametitle', 'reviewDate', 'content', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }
}
