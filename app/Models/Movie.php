<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
   protected $fillable = ['title', 'director', 'genre', 'year', 'is_watched', 'notes'];

protected function casts(): array
{
    return [
        'is_watched' => 'boolean',
        'year' => 'integer',
    ];
}
}
