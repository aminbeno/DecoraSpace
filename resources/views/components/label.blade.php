@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold']) }}>
    {{ $value ?? $slot }}
</label>
