@extends ('layouts.app')
@section('title', 'Movie Filter')
@section('content')
    <h1>Movie Filter</h1>
  
    <p><strong>{{ $filterMessage }}</strong></p>

    @if ($activeFilter)
        <p>Current filter: {{ $activeFilter }}</p>
    @else
        <p>Current filter: none</p>
    @endif

    <p>
        <a href="{{ route('movies.index') }}">Back to Movies List</a>
    </p>

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
                <td>{{ $movie['title'] }}</a></td>
                <td>{{ $movie['genre'] }}</td>
                <td>{{ $movie['year'] }}</td>
                <td><a href="{{ route('movies.show', ['id' => $movie['id']]) }}">View Details</a></td>
            </tr>
        @endforeach
    </table>    

@endsection

