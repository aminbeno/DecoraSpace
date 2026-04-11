<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-8 py-3 bg-lux-black border border-transparent font-bold text-xs text-white uppercase tracking-[0.2em] hover:bg-lux-gold focus:bg-lux-gold active:bg-lux-black focus:outline-none focus:ring-2 focus:ring-lux-gold focus:ring-offset-2 transition-all duration-300']) }}>
    {{ $slot }}
</button>
