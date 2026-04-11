@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-lux-grey-medium focus:border-lux-gold focus:ring-0 rounded-none shadow-none py-3 px-4 text-sm transition-colors']) !!}>
