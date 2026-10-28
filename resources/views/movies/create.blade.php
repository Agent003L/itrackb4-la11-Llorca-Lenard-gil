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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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
                        <label for="genre_id" class="form-label fw-bold">Genre</label>
                        <select id="genre_id" name="genre_id"
                                class="form-select @error('genre_id') is-invalid @enderror">
                            <option value="">-- choose --</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}"
                                    @selected(old('genre_id') == $genre->id)
                                >{{ $genre->name }}</option>
                            @endforeach
                        </select>
                        @error('genre_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label fw-bold">Year</label>
                        <input type="text" id="year" name="year"
                               class="form-control @error('year') is-invalid @enderror"
                               value="{{ old('year') }}" placeholder="e.g. 2010">
                        @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="director" class="form-label fw-bold">Director</label>
                        <input type="text" id="director" name="director"
                               class="form-control @error('director') is-invalid @enderror"
                               value="{{ old('director') }}" placeholder="e.g. Christopher Nolan">
                        @error('director')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="is_watched" class="form-label fw-bold">Watched?</label>
                        <select id="is_watched" name="is_watched"
                                class="form-select @error('is_watched') is-invalid @enderror">
                            <option value="">-- choose --</option>
                            <option value="1" @selected(old('is_watched') === '1')>Yes</option>
                            <option value="0" @selected(old('is_watched') === '0')>No</option>
                        </select>
                        @error('is_watched')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="notes" class="form-label fw-bold">Notes (optional)</label>
                        <textarea id="notes" name="notes" rows="3"
                                  class="form-control @error('notes') is-invalid @enderror"
                                  placeholder="Anything you want to remember">{{ old('notes') }}</textarea>
                        @error('notes')
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