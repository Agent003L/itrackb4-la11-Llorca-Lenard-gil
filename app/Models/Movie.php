<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
protected $fillable = ['title', 'director', 'genre_id', 'year', 'is_watched', 'notes'];
public function genre(): BelongsTo     
{
    return $this->belongsTo(Genre::class);
}
protected function casts(): array
{
    return [
        'is_watched' => 'boolean',
        'year' => 'integer',
    ];
}
}
