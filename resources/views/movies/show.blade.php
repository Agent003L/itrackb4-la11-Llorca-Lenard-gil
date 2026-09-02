<!DOCTYPE html>
<html>
<head>
    <title>{{ $movie['title'] }} Details</title>
</head>
<body>
    <h1>{{ $movie['title'] }}</h1>
    <p>Prepared by: Lenard Gil B. Llorca</p>

    <table border="1" cellpadding="8">
        <tr><th>Field</th><th>Value</th></tr>
        <tr><td>ID</td><td>{{ $movie['id'] }}</td></tr>
        <tr><td>Title</td><td>{{ $movie['title'] }}</td></tr>
        <tr><td>Genre</td><td>{{ $movie['genre'] }}</td></tr>
        <tr><td>Year</td><td>{{ $movie['year'] }}</td></tr>
        <tr><td>Director</td><td>{{ $movie['director'] }}</td></tr>
        <tr><td>Rating</td><td>{{ $movie['rating'] }}</td></tr>
    </table>

    <p>
        <a href="{{ route('movies.index') }}">Back to Movies List</a>
    </p>
</body>
</html>
