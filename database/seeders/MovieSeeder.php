<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $thriller   = Genre::create(['name' => 'Thriller']);
        $historical = Genre::create(['name' => 'Historical']);
        $scifi      = Genre::create(['name' => 'Sci-Fi']);
        $animation  = Genre::create(['name' => 'Animation']);
        $action     = Genre::create(['name' => 'Action']);
        $drama      = Genre::create(['name' => 'Drama']);

        Movie::create([
            'title' => 'Parasite', 'director' => 'Bong Joon-ho',
            'genre_id' => $thriller->id, 'year' => 2019,
            'is_watched' => true, 'notes' => 'Great ending.',
        ]);
        Movie::create([
            'title' => 'Heneral Luna', 'director' => 'Jerrold Tarog',
            'genre_id' => $historical->id, 'year' => 2015, 'is_watched' => false,
        ]);
        Movie::create([
            'title' => 'Inception', 'director' => 'Christopher Nolan',
            'genre_id' => $scifi->id, 'year' => 2010,
            'is_watched' => true, 'notes' => 'Needs a second viewing.',
        ]);
        Movie::create([
            'title' => 'Spirited Away', 'director' => 'Hayao Miyazaki',
            'genre_id' => $animation->id, 'year' => 2001, 'is_watched' => true,
        ]);
        Movie::create([
            'title' => 'The Dark Knight', 'director' => 'Christopher Nolan',
            'genre_id' => $action->id, 'year' => 2008, 'is_watched' => false,
        ]);
        Movie::create([
            'title' => 'Goodbye, Don Wan', 'director' => 'Jun Robles Lana',
            'genre_id' => $drama->id, 'year' => 2019, 'is_watched' => false,
        ]);
        Movie::create([
            'title' => 'Interstellar', 'director' => 'Christopher Nolan',
            'genre_id' => $scifi->id, 'year' => 2014, 'is_watched' => true,
        ]);
        Movie::create([
            'title' => 'Your Name', 'director' => 'Makoto Shinkai',
            'genre_id' => $animation->id, 'year' => 2016, 'is_watched' => true,
        ]);
    }
}