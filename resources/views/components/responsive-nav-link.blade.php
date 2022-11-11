@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 text-base font-medium text-[#49B2FF] focus:outline-none focus:text-[#49B2FF] transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-[#49B2FF] focus:outline-none focus:text-[#49B2FF] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
