<!DOCTYPE html>
<html>
<head>
    <title>My Movies List</title>
</head>
<body>
    <h1>My Movies List</h1>
    <p>Prepared by: Lenard Gil B. Llorca</p>

    <p>
        <a href="{{ route('movies.featured') }}">Featured Movie</a> |
        <a href="{{ route('movies.filter') }}">All Movies</a> |
        <a href="{{ route('movies.filter', ['value' => 'Sci-Fi']) }}">Sci-Fi Movies</a>
    </p>

    <table border="1" cellpadding="8">
        <tr>
            <th>Title</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Action</th>
        </tr>

        @foreach ($movies as $movie)
            <tr>
                <td><a href="{{ route('movies.show', ['id' => $movie['id']]) }}">{{ $movie['title'] }}</a></td>
                <td>{{ $movie['genre'] }}</td>
                <td>{{ $movie['year'] }}</td>
                <td><a href="{{ route('movies.show', ['id' => $movie['id']]) }}">View Details</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>