@extends('layouts.app')
@section('title', 'Featured Movie')
@section('content')

<div class="card shadow-sm border-warning">
    <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
        <h4 class="mb-0">&#9733; Featured: {{ $movie->title }}</h4>
        <span class="badge {{ $movie->is_watched ? 'bg-success' : 'bg-dark' }} fs-6">
            {{ $movie->is_watched ? 'Watched' : 'Not watched' }}
        </span>
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex"><strong class="w-25">Title</strong><span>{{ $movie->title }}</span></li>
        <li class="list-group-item d-flex"><strong class="w-25">Genre</strong><span>{{ $movie->genre->name }}</span></li>
        <li class="list-group-item d-flex"><strong class="w-25">Year</strong><span>{{ $movie->year }}</span></li>
        <li class="list-group-item d-flex"><strong class="w-25">Director</strong><span>{{ $movie->director }}</span></li>
        <li class="list-group-item d-flex"><strong class="w-25">Notes</strong><span>{{ $movie->notes ?? 'None' }}</span></li>
    </ul>

    <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Back to Movies List</a>
        <a href="{{