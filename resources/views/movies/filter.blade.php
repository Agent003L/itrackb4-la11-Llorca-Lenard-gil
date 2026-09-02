<!DOCTYPE html>
<html>
<head>
    <title>Movie Filter</title>
</head>
<body>
    <h1>Movie Filter</h1>
    <p>Prepared by: Lenard Gil B. Llorca</p>

    <p><strong>{{ $filterMessage }}</strong></p>

    @if ($activeFilter)
        <p>Current filter: {{ $activeFilter }}</p>
    @else
        <p>Current filter: none</p>
    @endif

    <p>
        <a href="{{ route('movies.index') }}">Back to Movies List</a>
    </p>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Year</th>
        </tr>

        @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie['id'] }}</td>
                <td><a href="{{ route('movies.show', ['id' => $movie['id']]) }}">{{ $movie['title'] }}</a></td>
                <td>{{ $movie['genre'] }}</td>
                <td>{{ $movie['year'] }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
