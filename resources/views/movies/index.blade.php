@extends('layouts.app')
@section('title', 'My Movie list')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">My Movies List</h3>
    <a class="btn btn-primary" href="{{ route('movies.create') }}">+ Add Movie</a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <p class="mb-3">
            <span class="fw-bold">Active filters:</span>
            @if ($activeGenre !== null || $activeYear !== null)
                @if ($activeGenre !== null)
                    <span class="badge bg-primary">Genre: {{ $activeGenre }}</span>
                @endif
                @if ($activeYear !== null)
                    <span class="badge bg-primary">Year: {{ $activeYear }}</span>
                @endif
            @else
                <span class="text-muted">None</span>
            @endif
        </p>

        <div class="mb-2">
            <span class="fw-bold me-2">Genres:</span>
            @foreach ($genres as $g)
                <a href="{{ request()->fullUrlWithQuery(['genre' => $g->id]) }}"
                class="btn btn-outline-primary btn-sm">{{ $g->name }}</a>
            @endforeach
        </div>

        <div class="mb-3">
            <span class="fw-bold me-2">Years:</span>
            @foreach ($years as $availableYear)
                <a href="{{ route('movies.index', ['genre' => $activeGenre, 'year' => $availableYear]) }}"
                   class="btn btn-sm {{ (string) $activeYear === (string) $availableYear ? 'btn-primary' : 'btn-outline-primary' }}">
                    {{ $availableYear }}
                </a>
            @endforeach
        </div>

        <a href="{{ route('movies.index') }}" class="btn btn-sm btn-outline-danger">Clear filters</a>
    </div>
</div>

<table class="table table-hover table-striped align-middle shadow-sm">
    <thead class="table-dark">
        <tr>
            <th style="width: 70px;">ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Year</th>
            <th class="text-end">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($movies as $movie)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ $movie['title'] }}
                    @if (($movie['rating'] ?? 0) >= 9)
                        <span class="badge bg-success ms-1">Highly Rated</span>
                    @endif
                </td>
                <td><span class="badge bg-secondary">{{ $movie->genre->name }}</span></td>
                <td>{{ $movie['year'] }}</td>
                <td class="text-end">
                    <a class="btn btn-sm btn-outline-dark"
                      <a class="btn btn-sm btn-outline-dark"
                        href="{{ route('movies.show', $movie) }}">View Details</a>
                       <a href="{{ route('movies.edit', $movie) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <form action="{{ route('movies.destroy', $movie) }}" method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Delete this record?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted py-4">No movies match these filters.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection