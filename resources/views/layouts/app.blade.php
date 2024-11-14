<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container min-h-screen p-4 m-auto flex">
    <div class="container bg-gray-100 p-4 rounded-2xl flex flex-col flex-1 gap-4">
        <header>
            <!-- Header content -->
            <x-nav>
                <x-nav.link href="{{ route('home') }}" :routeName="'home'">Home</x-nav.link>
                <x-nav.link href="{{ route('tasks') }}" :routeName="'tasks'">Tasks</x-nav.link>
                <x-nav.link href="{{ route('users') }}" :routeName="'users'">Login</x-nav.link>
            </x-nav>
        </header>
        <main class="bg-gray-50 p-4 rounded-2xl flex-1">
            <!-- Form to edit an existing task -->
            @yield('content')
        </main>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
