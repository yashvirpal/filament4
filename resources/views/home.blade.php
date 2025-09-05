<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome to Home Page</h1>
    <nav>
        <a href="{{ route('home') }}">Home</a> |
        <a href="{{ route('about') }}">About</a> |
        <a href="{{ route('detail') }}">Detail</a>
    </nav>
</body>
</html>
