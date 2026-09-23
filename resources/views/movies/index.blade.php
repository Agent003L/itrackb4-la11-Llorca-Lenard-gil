@extends ('layouts.app')
@section('title', 'My Movie list')
@section('content')
 <h3>My Movies List</h3>

    <p>
        Active filters:
        @if ($activeGenre !== null || $activeYear !== null)
            @if ($activeGenre !== null) Genre: {{ $activeGenre }} @endif
            @if ($activeYear !== null) Year: {{ $activeYear }} @endif
        @else
            None
        @endif
    </p>

    <p>
        Genres:
        @foreach ($genres as $availableGenre)
            <a href="{{ route('movies.index', ['genre' => $availableGenre, 'year' => $activeYear]) }}">{{ $availableGenre }}</a>
        @endforeach
    </p>

    <p>
        Years:
        @foreach ($years as $availableYear)
            <a href="{{ route('movies.index', ['genre' => $activeGenre, 'year' => $availableYear]) }}">{{ $availableYear }}</a>
        @endforeach
    </p>

    <p><a href="{{ route('movies.index') }}">Clear filters</a></p>
 
    <table class="table table-bordered table-striped">
        <tr class="table-dark">
            <th>ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Action</th>
        </tr>

        @foreach ($movies as $movie)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ $movie['title'] }}
                    @if($movie['rating'] >= 9)
                        <span style="color: green;">(Highly Rated)</span>
                    @endif
                </td>
                <td>{{ $movie['genre'] }}</td>
                <td>{{ $movie['year'] }}</td>
                <td><a href="{{ route('movies.show', ['id' => $movie['id']]) }}">View Details</a></td>
            </tr>
        @endforeach
    </table>
@endsection
