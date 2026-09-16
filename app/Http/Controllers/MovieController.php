<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    private function getMovies(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Inception',
                'genre' => 'Sci-Fi',
                'year' => 2010,
                'director' => 'Christopher Nolan',
                'rating' => 8.8,
            ],
            [
                'id' => 2,
                'title' => 'The Dark Knight',
                'genre' => 'Action',
                'year' => 2008,
                'director' => 'Christopher Nolan',
                'rating' => 9.0,
            ],
            [
                'id' => 3,
                'title' => 'Interstellar',
                'genre' => 'Sci-Fi',
                'year' => 2014,
                'director' => 'Christopher Nolan',
                'rating' => 8.7,
            ],
            [
                'id' => 4,
                'title' => 'The Matrix',
                'genre' => 'Sci-Fi',
                'year' => 1999,
                'director' => 'The Wachowskis',
                'rating' => 8.7,
            ],
            [
                'id' => 5,
                'title' => 'The Godfather',
                'genre' => 'Crime',
                'year' => 1972,
                'director' => 'Francis Ford Coppola',
                'rating' => 9.2,
            ],
            [
                'id' => 6,
                'title' => 'Spider-Man: Into the Spider-Verse',
                'genre' => 'Animation',
                'year' => 2018,
                'director' => 'Bob Persichetti',
                'rating' => 8.4,
            ],
        ];
    }

    public function index()
    {
        $movies = $this->getMovies();

        return view('movies.index', ['movies' => $movies]);
    }

    public function show($id)
    {
        $movie = collect($this->getMovies())->firstWhere('id', (int) $id);

        abort_if(! $movie, 404);

        return view('movies.show', ['movie' => $movie]);
    }

    public function featured()
    {
        $movies = $this->getMovies();
        $movie = collect($movies)->firstWhere('id', 3);

        abort_if(! $movie, 404);

        return view('movies.featured', ['movie' => $movie]);
    }

    public function filter($value = null)
    {
        $movies = $this->getMovies();

        if ($value === null || $value === '') {
            return view('movies.filter', [
                'movies' => $movies,
                'activeFilter' => null,
                'filterMessage' => 'All movies are being shown',
            ]);
        }

        $filteredMovies = array_values(array_filter($movies, function ($movie) use ($value) {
            return strtolower((string) $movie['genre']) === strtolower((string) $value);
        }));

        return view('movies.filter', [
            'movies' => $filteredMovies,
            'activeFilter' => $value,
            'filterMessage' => 'Showing movies for genre: ' . $value,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
