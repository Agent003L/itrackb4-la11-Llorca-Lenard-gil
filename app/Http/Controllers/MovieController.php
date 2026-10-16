<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
 private function movies(): array
{
    return json_decode(file_get_contents(storage_path('app/movies.json')), true);
}

private function saveMovies(array $movies): void
{
    file_put_contents(
        storage_path('app/movies.json'),
        json_encode($movies, JSON_PRETTY_PRINT)
    );
}

public function index(Request $request)
{
    $genre = $request->query('genre');
    $year = $request->query('year');
    $allMovies = Movie::all();      // the only line that changed
    $genres = [];
    $years = [];

    foreach ($allMovies as $movie) {
        if (! in_array($movie['genre'], $genres, true)) {
            $genres[] = $movie['genre'];
        }

        if (! in_array($movie['year'], $years, true)) {
            $years[] = $movie['year'];
        }
    }

    $movies = [];
    foreach ($allMovies as $movie) {
        if ($genre !== null && $year !== null) {
            if (strtolower($movie['genre']) === strtolower($genre) && (string) $movie['year'] === (string) $year) {
                $movies[] = $movie;
            }
        } elseif ($genre !== null) {
            if (strtolower($movie['genre']) === strtolower($genre)) {
                $movies[] = $movie;
            }
        } elseif ($year !== null) {
            if ((string) $movie['year'] === (string) $year) {
                $movies[] = $movie;
            }
        } else {
            $movies[] = $movie;
        }
    }

    return view('movies.index', [
        'movies' => $movies,
        'genres' => $genres,
        'years' => $years,
        'activeGenre' => $genre,
        'activeYear' => $year,
    ]);
}

    public function show($id)
    {
    $movie = Movie::findOrFail($id);
    return view('movies.show', compact('movie'));
    }

    public function featured()
    {
        $movies = $this->movies();
        $movie = collect($movies)->firstWhere('id', 3);

        abort_if(! $movie, 404);

        return view('movies.featured', ['movie' => $movie]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $validated = $request->validate([
        'title'    => 'required|max:100',
        'genre'    => 'required|in:Sci-Fi,Action,Crime,Animation',
        'year'     => 'required|numeric|min:1900|max:2100',
        'director' => 'required|max:100',
        'rating'   => 'required|numeric|min:0|max:10',
    ]);

    $movies = $this->movies();

    $ids = array_column($movies, 'id');
    $validated['id']     = $ids ? max($ids) + 1 : 1;
    $validated['year']   = (int) $validated['year'];
    $validated['rating'] = (float) $validated['rating'];

    $movies[] = $validated;
    $this->saveMovies($movies);

    return redirect()->route('movies.index')
        ->with('success', 'Movie added successfully.');
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
