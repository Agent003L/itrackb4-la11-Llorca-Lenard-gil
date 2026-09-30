<?php
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies/featured', [MovieController::class, 'featured'])
    ->name('movies.featured');

Route::get('/movies/filter/{value?}', function ($value = null) {
    $filters = [];

    if ($value !== null && $value !== '') {
        $filters['genre'] = $value;
    }

    return redirect()->route('movies.index', $filters);
})
    ->name('movies.filter');
    
Route::resource('movies', MovieController::class)
    ->only(['index', 'create', 'store', 'show'])
    ->parameters(['movies' => 'id']);

