@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block py-2 pl-3 pr-4 text-gray-700 text-blue-700 lg:p-0'
            : 'block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
