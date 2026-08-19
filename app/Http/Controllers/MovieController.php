<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
 
public function index()
{
    $movies = [
        ['title' => 'Inception', 'genre' => 'Sci-Fi',     'year' => 2010],
        ['title' => 'The Dark Knight', 'genre' => 'Action', 'year' => 2008],
        ['title' => 'Interstellar', 'genre' => 'Sci-Fi',   'year' => 2014],
        ['title' => 'The Matrix', 'genre' => 'Sci-Fi',     'year' => 1999],
    
        ];
 
    return view('movies.index', ['movies' => $movies]);
}

  
}
