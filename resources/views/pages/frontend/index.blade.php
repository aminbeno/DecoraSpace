@extends('layouts.frontend')

@section('content')
<!-- START: HERO -->
<section class="relative h-screen min-h-[600px] md:min-h-[700px] flex items-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="/frontend/images/content/image-section-1.png" alt="Premium Furniture"
            class="w-full h-full object-cover object-center scale-105" />
        <div class="absolute inset-0 bg-lux-black/40"></div>
    </div>

    <div class="container mx-auto px-4 md:px-6 relative z-10">
        <div class="max-w-3xl">
            <span class="inline-block text-lux-gold uppercase tracking-[0.2em] md:tracking-[0.3em] text-xs md:text-sm font-medium mb-4 md:mb-6 animate-fade-in-up">
                {{ __('Décoration d\'intérieur haut de gamme') }}
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-7xl lg:text-8xl text-white font-serif leading-tight md:leading-[1.1] mb-6 md:mb-8 animate-fade-in-up animation-delay-200">
                @if(app()->getLocale() == 'ar')
                    {{ __('La pièce dont vous avez toujours rêvé') }}
                @else
                    La pièce <br class="hidden sm:block" />dont vous avez <br class="hidden sm:block" /><span class="italic text-lux-gold">toujours rêvé</span>
                @endif
            </h1>
            <p class="text-base md:text-xl text-gray-200 mb-8 md:mb-10 max-w-lg leading-relaxed animate-fade-in-up animation-delay-400">
                {{ __('Découvrez notre collection de meubles artisanaux qui transforment votre espace de vie en un sanctuaire d\'élégance et de confort.') }}
            </p>
            <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-6 sm:space-y-0 sm:space-x-6 rtl:space-x-reverse animate-fade-in-up animation-delay-600">
                <a href="{{ route('catalog') }}"
                    class="w-full sm:w-auto bg-white text-lux-black px-8 md:px-10 py-4 md:py-5 text-xs md:text-sm font-bold uppercase tracking-widest hover:bg-lux-gold hover:text-white transition-all duration-300 text-center">
                    {{ __('Explorer la collection') }}
                </a>
                @guest
                <a href="{{ route('register') }}"
                    class="w-full sm:w-auto border border-white/30 text-white px-8 md:px-10 py-4 md:py-5 text-xs md:text-sm font-bold uppercase tracking-widest hover:bg-white hover:text-lux-black transition-all duration-300 text-center">
                    {{ __('S\'inscrire') }}
                </a>
                @endguest
                <button class="flex items-center space-x-4 rtl:space-x-reverse group modal-trigger" data-content='<div class="w-[90vw] md:w-[80vw] lg:w-[70vw] aspect-video relative z-50">
                    <div class="absolute w-full h-full">
                      <iframe width="100%" height="100%" src="https://www.youtube.com/embed/3h0_v1cdUIA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                  </div>'>
                    <span class="w-12 h-12 md:w-14 md:h-14 rounded-full border border-white/30 flex items-center justify-center group-hover:bg-white group-hover:border-white transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-white group-hover:text-lux-black transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </span>
                    <span class="text-white text-xs md:text-sm font-bold uppercase tracking-widest">{{ __('Watch Story') }}</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center space-y-4">
        <span class="text-white/50 text-[10px] uppercase tracking-[0.2em] [writing-mode:vertical-lr]">{{ __('Scroll') }}</span>
        <div class="w-[1px] h-12 bg-gradient-to-b from-white/50 to-transparent"></div>
    </div>
</section>
<!-- END: HERO -->

<!-- START: BROWSE THE ROOM -->
<section class="py-24 bg-lux-grey-light" id="browse-the-room">
    <div class="container mx-auto px-4 md:px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 space-y-6 md:space-y-0 text-center md:text-left rtl:md:text-right">
            <div class="max-w-2xl mx-auto md:mx-0">
                <h2 class="text-4xl md:text-5xl font-serif text-lux-black mb-6">{{ __('Browse by Category') }}</h2>
                <p class="text-lux-grey-dark leading-relaxed">
                    {{ __('Every space has a story. Find the perfect pieces to tell yours, categorized by style for your convenience.') }}
                </p>
            </div>
            <a href="{{ route('catalog') }}" class="inline-block text-lux-black font-bold text-sm uppercase tracking-widest border-b-2 border-lux-gold pb-1 hover:text-lux-gold transition-colors mx-auto md:mx-0">
                {{ __('View All Collection') }}
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @forelse($categories as $index => $category)
                @php
                    $spanClass = ($index == 0) ? 'md:col-span-2' : '';
                    $heightClass = 'h-[400px]';
                    if ($index == 3) {
                        $spanClass = 'md:col-span-4';
                        $heightClass = 'h-[300px]';
                    }
                @endphp
                <div class="relative group overflow-hidden {{ $spanClass }} {{ $heightClass }}">
                    <img src="{{ $category->image ? Storage::url($category->image) : asset('frontend/images/content/image-catalog-'.(($index % 4) + 1).'.png') }}"
                        alt="{{ $category->name }}"
                        data-fallback="{{ asset('frontend/images/content/image-catalog-'.(($index % 4) + 1).'.png') }}"
                        onerror="this.onerror=null; this.src=this.dataset.fallback;"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                    <div class="absolute inset-0 bg-gradient-to-t from-lux-black/80 via-lux-black/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                    <div class="absolute bottom-10 left-10 rtl:left-auto rtl:right-10">
                        <h3 class="text-2xl font-serif text-white mb-2">{{ $category->name }}</h3>
                        <p class="text-gray-300 text-sm tracking-wide">{{ number_format($category->products_count) }} {{ __('items') }}</p>
                    </div>
                    <a href="{{ route('catalog', ['category' => $category->slug]) }}" class="absolute inset-0"></a>
                </div>
            @empty
                <div class="col-span-4 py-20 text-center bg-white rounded-2xl border border-dashed border-lux-grey-medium">
                    <p class="text-lux-grey-dark italic">{{ __('No categories available at the moment.') }}</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- END: BROWSE THE ROOM -->

<!-- START: PROMOTIONS -->
@if($promoProducts->isNotEmpty())
<section class="py-24 bg-white">
    <div class="container mx-auto px-4 md:px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-lux-gold uppercase tracking-[0.3em] text-xs font-bold mb-4 block">{{ __('Offres limitées') }}</span>
            <h2 class="text-4xl md:text-5xl font-serif text-lux-black mb-6">{{ __('Our Promotions') }}</h2>
            <p class="text-lux-grey-dark">
                {{ __('Découvrez nos pièces d\'exception à prix réduit. Profitez-en avant qu\'il ne soit trop tard.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($promoProducts as $product)
            <div class="group relative">
                <div class="absolute top-4 left-4 rtl:left-auto rtl:right-4 z-10">
                    <span class="bg-lux-gold text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1">
                        {{ $product->promo_label ?? __('Promotion') }}
                    </span>
                </div>
                <div class="relative aspect-[3/4] overflow-hidden bg-lux-grey-light mb-6">
                    <img src="{{ $product->productGallery()->exists() ? Storage::url($product->productGallery->first()->url) : asset('frontend/images/content/placeholder-product.png') }}"
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />

                    <div class="absolute inset-0 bg-lux-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center space-x-4 rtl:space-x-reverse">
                        <a href="{{ route('details', $product->slug) }}"
                            class="bg-white text-lux-black p-4 rounded-full hover:bg-lux-gold hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="text-lg font-serif text-lux-black mb-2 group-hover:text-lux-gold transition-colors">
                        <a href="{{ route('details', $product->slug) }}">{{ $product->name }}</a>
                    </h3>
                    <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse">
                        <p class="text-lux-gold font-bold tracking-widest text-sm">
                            {{ number_format($product->promo_price) }} DH
                        </p>
                        <p class="text-lux-grey-dark font-medium tracking-widest text-xs line-through opacity-50">
                            {{ number_format($product->price) }} DH
                        </p>
                    </div>
                    @if($product->promo_end_at)
                    <p class="mt-2 text-[10px] text-red-500 uppercase tracking-widest font-bold">
                        {{ __('Finit le') }} {{ \Carbon\Carbon::parse($product->promo_end_at)->format('d/m/Y') }}
                    </p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- END: PROMOTIONS -->

<!-- START: JUST ARRIVED -->
<section class="py-24">
    <div class="container mx-auto px-4 md:px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-lux-gold uppercase tracking-[0.3em] text-xs font-bold mb-4 block">{{ __('New Collection') }}</span>
            <h2 class="text-4xl md:text-5xl font-serif text-lux-black mb-6">{{ __('Just Arrived') }}</h2>
            <p class="text-lux-grey-dark">
                {{ __('Be the first to explore our latest additions, freshly crafted for the modern home.') }}
            </p>
        </div>

        @if ($products->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($products as $product)
                <div class="group relative">
                    @if($product->isOnPromotion())
                    <div class="absolute top-4 left-4 rtl:left-auto rtl:right-4 z-10">
                        <span class="bg-lux-gold text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1">
                            {{ $product->promo_label ?? __('Promotion') }}
                        </span>
                    </div>
                    @endif
                    <div class="relative aspect-[3/4] overflow-hidden bg-lux-grey-light mb-6">
                        <img src="{{ $product->productGallery()->exists() ? Storage::url($product->productGallery->first()->url) : asset('frontend/images/content/placeholder-product.png') }}"
                            alt="{{ $product->name }}"
                            data-fallback="{{ asset('frontend/images/content/placeholder-product.png') }}"
                            onerror="this.onerror=null; this.src=this.dataset.fallback;"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />

                        <!-- Overlay Actions -->
                        <div class="absolute inset-0 bg-lux-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center space-x-4 rtl:space-x-reverse">
                            <a href="{{ route('details', $product->slug) }}"
                                class="bg-white text-lux-black p-4 rounded-full hover:bg-lux-gold hover:text-white transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3 class="text-lg font-serif text-lux-black mb-2 group-hover:text-lux-gold transition-colors">
                            <a href="{{ route('details', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                        <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse">
                            <p class="text-lux-black font-bold tracking-widest text-sm">
                                {{ number_format($product->currentPrice()) }} DH
                            </p>
                            @if($product->isOnPromotion())
                            <p class="text-lux-grey-dark font-medium tracking-widest text-xs line-through opacity-50">
                                {{ number_format($product->price) }} DH
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 bg-lux-grey-light rounded-2xl border border-dashed border-lux-grey-medium">
                <p class="text-lux-grey-dark italic">{{ __('No products available at the moment.') }}</p>
            </div>
        @endif
    </div>
</section>
<!-- END: JUST ARRIVED -->

<!-- START: CLIENTS -->
<section class="py-20 border-t border-lux-grey-medium/30">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center items-center gap-12 md:gap-24 opacity-40 hover:opacity-100 transition-opacity duration-500">
            <img src="/frontend/images/content/logo-adobe.svg" alt="Adobe" class="h-8 grayscale hover:grayscale-0 transition-all" />
            <img src="/frontend/images/content/logo-ikea.svg" alt="IKEA" class="h-8 grayscale hover:grayscale-0 transition-all" />
            <img src="/frontend/images/content/logo-hermanmiller.svg" alt="Herman Miller" class="h-8 grayscale hover:grayscale-0 transition-all" />
            <img src="/frontend/images/content/logo-miele.svg" alt="Miele" class="h-8 grayscale hover:grayscale-0 transition-all" />
        </div>
    </div>
</section>
<!-- END: CLIENTS -->
@endsection
