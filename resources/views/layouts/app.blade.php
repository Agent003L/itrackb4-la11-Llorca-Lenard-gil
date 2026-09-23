<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Movies List')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .active > a { font-weight: bold; text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Movies List</h1>
    <p>Prepared by: Lenard Gil B. Llorca</p>
    @include('partials._nav')
    @yield('content')
</body>
</html> 
