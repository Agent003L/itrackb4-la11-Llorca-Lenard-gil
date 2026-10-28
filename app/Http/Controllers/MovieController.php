<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;



class MovieController extends Controller
{
    public function index(Request $request)
    {
        $genre = $request->query('genre');   
        $year  = $request->query('year');

        $genres = Genre::all();
        $years  = Movie::select('year')->distinct()->orderBy('year')->pluck('year');

        $query = Movie::with('genre');            

        if ($genre) {
            $query = $query->where('genre_id', $genre);
        }
        if ($year) {
            $query = $query->where('year', $year);
        }

        $movies = $query->get();

        return view('movies.index', [
            'movies'      => $movies,
            'genres'      => $genres,
            'years'       => $years,
            'activeGenre' => $genre,
            'activeYear'  => $year,
        ]);
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function featured()
    {
        $movie = Movie::find(3);

        abort_if(! $movie, 404);

        return view('movies.featured', ['movie' => $movie]);
    }

    public function create()
    {
        return view('movies.create', ['genres' => Genre::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'director'   => 'required|string|max:255',
            'genre_id'   => 'required|exists:genres,id',
            'year'       => 'required|integer|min:1888|max:2100',
            'is_watched' => 'required|boolean',
            'notes'      => 'nullable|string',
        ]);

        Movie::create($validated);

        return redirect('/movies');
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();

        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'director'   => 'required|string|max:255',
            'genre_id'   => 'required|exists:genres,id',
            'year'       => 'required|integer|min:1888|max:2100',
            'is_watched' => 'required|boolean',
            'notes'      => 'nullable|string',
        ]);

        $movie->update($validated);

        return redirect()->route('movies.index');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index');
    }
}