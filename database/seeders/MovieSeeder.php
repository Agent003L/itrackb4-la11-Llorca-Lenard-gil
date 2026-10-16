<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Movie::create([
        'title' => 'Parasite',
        'director' => 'Bong Joon-ho',
        'genre' => 'Thriller',
        'year' => 2019,
        'is_watched' => true,
        'notes' => 'Great ending.',
    ]);
    Movie::create([
        'title' => 'Heneral Luna',
        'director' => 'Jerrold Tarog',
        'genre' => 'Historical',
        'year' => 2015,
        'is_watched' => false,
    ]);
    Movie::create([
        'title' => 'Inception',
        'director' => 'Christopher Nolan',
        'genre' => 'Sci-Fi',
        'year' => 2010,
        'is_watched' => true,
        'notes' => 'Needs a second viewing.',
    ]);
    Movie::create([
        'title' => 'Spirited Away',
        'director' => 'Hayao Miyazaki',
        'genre' => 'Animation',
        'year' => 2001,
        'is_watched' => true,
    ]);
    Movie::create([
        'title' => 'The Dark Knight',
        'director' => 'Christopher Nolan',
        'genre' => 'Action',
        'year' => 2008,
        'is_watched' => false,
    ]);
    Movie::create([
        'title' => 'Goodbye, Don Wan',
        'director' => 'Jun Robles Lana',
        'genre' => 'Drama',
        'year' => 2019,
        'is_watched' => false,
    ]);
    Movie::create([
        'title' => 'Interstellar',
        'director' => 'Christopher Nolan',
        'genre' => 'Sci-Fi',
        'year' => 2014,
        'is_watched' => true,
    ]);
    Movie::create([
        'title' => 'Your Name',
        'director' => 'Makoto Shinkai',
        'genre' => 'Animation',
        'year' => 2016,
        'is_watched' => true,
    ]);
}
}
