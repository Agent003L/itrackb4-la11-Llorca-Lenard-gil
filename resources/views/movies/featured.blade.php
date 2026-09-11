@extends ('layouts.app')
@section('title', 'Featured Movie')
@section('content')
<h1>Featured Movie</h1>
    
<table class="table table-bordered table-striped">
        <tr class="table-dark">
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td><strong>Title:</strong></td>
            <td>{{ $movie['title'] }}</td>
        </tr>
        <tr>
            <td><strong>Genre:</strong></td>
            <td>{{ $movie['genre'] }}</td>
        </tr>
        <tr>
            <td><strong>Year:</strong></td>
            <td>{{ $movie['year'] }}</td>
        </tr>
        <tr>
            <td><strong>Director:</strong></td>
            <td>{{ $movie['director'] }}</td>
        </tr>
        <tr>
            <td><strong>Rating:</strong></td>
            <td>{{ $movie['rating'] }}</td>
        </tr>
    </table>

    <p>
        <a href="{{ route('movies.index') }}">Back to Movies List</a>
    </p>
@endsection

