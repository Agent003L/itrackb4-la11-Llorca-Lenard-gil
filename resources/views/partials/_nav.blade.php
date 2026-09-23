<nav>
    <ul>
        <li class="{{ request()->is('movies') || request()->routeIs('movies.show') ? 'active' : '' }}">
            <a href="{{ route('movies.index') }}">Movies</a>
        </li>
        <li class="{{ request()->routeIs('movies.featured') ? 'active' : '' }}">
            <a href="{{ route('movies.featured') }}">Featured Movie</a>
        </li>
    </ul>
</nav>
