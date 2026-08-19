<?php
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/whoami', function () {
    return 'Lenard Gil B. Llorca | 2023-71036 | Block 4A | ITRACKB4 Laravel 12';
});

Route::get('/movies', [MovieController::class, 'index']);
