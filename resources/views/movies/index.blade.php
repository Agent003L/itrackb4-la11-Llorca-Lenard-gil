@extends ('layouts.app')
@section('title', 'My Movie list')
@section('content')
 <h3>My Movies List</h3>
 
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
