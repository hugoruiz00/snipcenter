@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm bg-[#171D2E] border-[#1C6FAC] border-2 focus:border-[#1C6FAC] focus:ring focus:ring-[#1C6FAC] focus:ring-opacity-50']) !!}>
