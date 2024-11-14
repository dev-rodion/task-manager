<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container min-h-screen p-4 m-auto">
    <header class="mb-4">
        <!-- Header content -->
        <x-nav>
            <x-nav.link href="{{ route('home') }}" :routeName="'home'">Home</x-nav.link>
            <x-nav.link href="{{ route('tasks') }}" :routeName="'tasks'">Tasks</x-nav.link>
            <x-nav.link href="{{ route('users') }}" :routeName="'users'">Login</x-nav.link>
        </x-nav>
    </header>
    <main class="">
        @if (session('success'))
            <div id="success-alert"
                 class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-96 m-auto mb-4"
                 role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="closeAlert()">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.172 7.066 4.238a1 1 0 10-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 12.828l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934z"/>
                    </svg>
                </span>
            </div>
        @endif


        <!-- Form to edit an existing task -->
        @yield('content')
    </main>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    function closeAlert() {
        document.getElementById('success-alert').style.display = 'none';
    }
</script>
</body>
</html>
