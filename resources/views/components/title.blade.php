@php
    $headingType = $type ?? 'h1';
@endphp

<{{ $headingType }} class="text-2xl font-bold">
{{ $slot }}
</{{ $headingType }}>
