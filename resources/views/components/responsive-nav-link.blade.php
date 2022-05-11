@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-white-400 text-base font-medium text-white-700 bg-white-50 focus:outline-none focus:text-white-800 focus:bg-white-100 focus:border-white-700 transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white-600 hover:text-white-800 hover:bg-white-50 hover:border-white-300 focus:outline-none focus:text-white-800 focus:bg-white-50 focus:border-white-300 transition duration-150 ease-in-out reset-reboot-scss';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
