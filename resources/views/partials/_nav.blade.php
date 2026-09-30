@php
    $onFeatured = request()->is('movies/featured');
    $onMovies   = request()->is('movies') || (request()->is('movies/*') && ! $onFeatured);
@endphp

<ul class="navbar-nav ms-auto">
    <li class="nav-item">
        <a class="nav-link {{ $onMovies ? 'active fw-bold' : '' }}" href="{{ route('movies.index') }}">Movies</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $onFeatured ? 'active fw-bold' : '' }}" href="{{ route('movies.featured') }}">Featured Movie</a>
    </li>
</ul>