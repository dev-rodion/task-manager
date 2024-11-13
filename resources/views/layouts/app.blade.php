<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <!-- Header content -->
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('tasks') }}">Tasks</a></li>
            <li><a href="{{ route('users') }}">Login</a></li>
        </ul>
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer>
    <!-- Footer content -->
</footer>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
