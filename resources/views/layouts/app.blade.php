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
            <x-nav.link href="{{ route('home') }}">Home</x-nav.link>
            <x-nav.link href="{{ route('tasks.index') }}">Tasks</x-nav.link>
            <x-nav.link href="{{ route('users') }}">Login</x-nav.link>

            <x-nav.link href="{{ route('tasks.create') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 ml-auto">
                Add Task
            </x-nav.link>
        </x-nav>

    </header>
    <main class="">
        @if (session('success'))
            <div
                class="fixed right-5 top-5 max-w-96 w-fit cursor-pointer hover:bg-teal-200 transition-all bg-teal-100 border-l-4 border-teal-500 rounded text-teal-900 px-4 py-3 shadow-md"
                role="alert"
                onclick="this.classList.add('hidden')"
            >
                <div class="flex items-center">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                        </svg>
                    </div>
                    <p class="font-bold">{{ session('success') }}</p>
                </div>
            </div>
        @endif


        <!-- Form to edit an existing task -->
        @yield('content')
    </main>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
