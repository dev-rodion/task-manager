<a href="{{ $href }}"
   class="inline-block m-auto p-2 pl-4 pr-4 hover:text-amber-400 {{ request()->routeIs($routeName) ? 'font-bold' : 'font-semibold' }}">
    {{ $slot }}
</a>
