@extends('layouts.app')
@section('title', 'Movie Details')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">{{ $movie['title'] }}</h4>
        <span class="badge bg-warning text-dark fs-6">&#9733; {{ $movie['rating'] }}</span>
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex">
            <strong class="w-25">ID</strong><span>{{ $movie['id'] }}</span>
        </li>
        <li class="list-group-item d-flex">
            <strong class="w-25">Title</strong><span>{{ $movie['title'] }}</span>
        </li>
        <li class="list-group-item d-flex">
            <strong class="w-25">Genre</strong><span>{{ $movie->genre->name }}</span>
        </li>
        <li class="list-group-item d-flex">
            <strong class="w-25">Year</strong><span>{{ $movie['year'] }}</span>
        </li>
        <li class="list-group-item d-flex">
            <strong class="w-25">Director</strong><span>{{ $movie['director'] }}</span>
        </li>
        <li class="list-group-item d-flex">
            <strong class="w-25">Rating</strong><span>{{ $movie['rating'] }}</span>
        </li>
    </ul>

    <div class="card-footer">
        <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Back to Movies List</a>
    </div>
</div>
@endsection