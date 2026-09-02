<!DOCTYPE html>
<html>
<head>
    <title>Featured Movie</title>
</head>
<body>
    <h1>Featured Movie</h1>
    <p>Prepared by: Lenard Gil B. Llorca</p>

    <h2>{{ $movie['title'] }}</h2>
    <p><strong>Genre:</strong> {{ $movie['genre'] }}</p>
    <p><strong>Year:</strong> {{ $movie['year'] }}</p>
    <p><strong>Director:</strong> {{ $movie['director'] }}</p>
    <p><strong>Rating:</strong> {{ $movie['rating'] }}</p>

    <p>
        <a href="{{ route('movies.index') }}">Back to Movies List</a>
    </p>
</body>
</html>
