@extends('layouts.app')
@section('title', 'Create Movie')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Add a Movie</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('movies.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Title</label>
                        <input type="text" id="title" name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" placeholder="e.g. Inception">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="genre" class="form-label fw-bold">Genre</label>
                        <select id="genre" name="genre"
                                class="form-select @error('genre') is-invalid @enderror">
                            <option value="">-- choose --</option>
                            @foreach (['Sci-Fi', 'Action', 'Crime', 'Animation'] as $g)
                                <option value="{{ $g }}" @selected(old('genre') === $g)>{{ $g }}</option>
                            @endforeach
                        </select>
                        @error('genre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="year" class="form-label fw-bold">Year</label>
                            <input type="text" id="year" name="year"
                                   class="form-control @error('year') is-invalid @enderror"
                                   value="{{ old('year') }}" placeholder="e.g. 2010">
                            @error('year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="rating" class="form-label fw-bold">Rating (0-10)</label>
                            <input type="text" id="rating" name="rating"
                                   class="form-control @error('rating') is-invalid @enderror"
                                   value="{{ old('rating') }}" placeholder="e.g. 8.8">
                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="director" class="form-label fw-bold">Director</label>
                        <input type="text" id="director" name="director"
                               class="form-control @error('director') is-invalid @enderror"
                               value="{{ old('director') }}" placeholder="e.g. Christopher Nolan">
                        @error('director')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Movie</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection