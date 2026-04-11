@extends('layouts.frontend')

@section('content')
<div class="bg-white pt-32 pb-24">
    <div class="container mx-auto px-4 md:px-6">
        <!-- Breadcrumbs -->
        <nav class="flex text-[10px] md:text-xs uppercase tracking-widest text-lux-grey-dark mb-8 md:mb-12 overflow-x-auto whitespace-nowrap pb-2 md:pb-0">
            <a href="{{ route('index') }}" class="hover:text-lux-gold transition-colors">Accueil</a>
            <span class="mx-2">/</span>
            <a href="{{ route('catalog') }}" class="hover:text-lux-gold transition-colors">Catalogue</a>
            <span class="mx-2">/</span>
            <span class="text-lux-black">{{ $product->name }}</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-10 md:gap-16">
            <!-- Product Images -->
            <div class="w-full lg:w-3/5 space-y-4 md:space-y-6">
                <div class="relative aspect-square bg-lux-grey-light overflow-hidden rounded-lg">
                    <img id="main-preview" src="{{ $product->productGallery()->exists() ? Storage::url($product->productGallery->first()->url) : asset('frontend/images/content/placeholder-product.png') }}"
                        data-fallback="{{ asset('frontend/images/content/placeholder-product.png') }}"
                        onerror="this.onerror=null; this.src=this.dataset.fallback;"
                        alt="{{ $product->name }}" class="w-full h-full object-cover transition-all duration-500" />
                </div>
                <div class="grid grid-cols-4 gap-2 md:gap-4">
                    @foreach ($product->productGallery as $item)
                    <button class="aspect-square bg-lux-grey-light overflow-hidden border-2 {{ $loop->first ? 'border-lux-gold' : 'border-transparent hover:border-lux-grey-medium' }} transition-all thumbnail-btn rounded-md"
                        data-img="{{ Storage::url($item->url) }}">
                        <img src="{{ Storage::url($item->url) }}" alt="{{ $product->name }}" class="w-full h-full object-cover" />
                    </button>
                    @endforeach
                </div>
            </div>

            <!-- Product Info -->
            <div class="w-full lg:w-2/5 space-y-8 md:space-y-10">
                <div class="space-y-4">
                    @if($product->isOnPromotion())
                    <span class="bg-lux-gold text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1 inline-block mb-2">
                        {{ $product->promo_label ?? 'Promotion' }}
                    </span>
                    @endif
                    <span class="text-lux-gold uppercase tracking-[0.3em] text-[10px] md:text-xs font-bold block">Premium Furniture</span>
                    <h1 class="text-3xl md:text-5xl font-serif text-lux-black leading-tight">{{ $product->name }}</h1>
                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                        <p class="text-2xl md:text-3xl font-light text-lux-black tracking-wider">
                            {{ number_format($product->currentPrice()) }} DH
                        </p>
                        @if($product->isOnPromotion())
                        <p class="text-lg md:text-xl font-light text-lux-grey-dark tracking-wider line-through opacity-50">
                            {{ number_format($product->price) }} DH
                        </p>
                        @endif
                    </div>
                    @if($product->isOnPromotion() && $product->promo_end_at)
                    <p class="text-[10px] md:text-xs text-red-500 font-bold uppercase tracking-widest bg-red-50 px-3 py-2 inline-block">
                        Offre valable jusqu'au {{ \Carbon\Carbon::parse($product->promo_end_at)->format('d/m/Y H:i') }}
                    </p>
                    @endif
                </div>

                <div class="prose prose-sm text-lux-grey-dark leading-relaxed max-w-none">
                    {!! $product->description !!}
                </div>

                <div class="pt-6 border-t border-lux-grey-medium/30">
                    <form action="{{ route('cart-add', $product->id) }}" method="post" class="space-y-6">
                        @csrf
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-4 sm:space-y-0 sm:space-x-4">
                            <div class="flex border border-lux-grey-medium h-14 justify-between sm:justify-start">
                                <button type="button" class="px-6 hover:bg-lux-grey-light transition-colors">-</button>
                                <input type="number" value="1" min="1" class="w-16 text-center border-none focus:ring-0 text-sm font-medium" />
                                <button type="button" class="px-6 hover:bg-lux-grey-light transition-colors">+</button>
                            </div>
                            <button type="submit"
                                class="flex-grow bg-lux-black text-white h-14 px-8 text-[10px] md:text-xs font-bold uppercase tracking-widest hover:bg-lux-gold transition-all duration-300 flex items-center justify-center space-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span>Ajouter au panier</span>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="space-y-4 pt-10 border-t border-lux-grey-medium/30">
                    <div class="flex items-center space-x-4 text-xs uppercase tracking-widest text-lux-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lux-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Free Premium Delivery</span>
                    </div>
                    <div class="flex items-center space-x-4 text-xs uppercase tracking-widest text-lux-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lux-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>2 Years Warranty</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- START: COMPLETE YOUR ROOM -->
<section class="py-16 md:py-24 bg-lux-grey-light">
    <div class="container mx-auto px-4 md:px-6">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-2xl md:text-4xl font-serif text-lux-black mb-4">Complétez votre intérieur</h2>
            <p class="text-sm md:text-base text-lux-grey-dark">Se marie parfaitement avec ces pièces sélectionnées.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @foreach ($recommendations as $recommendation)
            <div class="group relative">
                <div class="relative aspect-[3/4] overflow-hidden bg-white mb-6 rounded-lg">
                    <img src="{{ $recommendation->productGallery()->exists() ? Storage::url($recommendation->productGallery->first()->url) : asset('frontend/images/content/placeholder-product.png') }}"
                        data-fallback="{{ asset('frontend/images/content/placeholder-product.png') }}"
                        onerror="this.onerror=null; this.src=this.dataset.fallback;"
                        alt="{{ $recommendation->name }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                    <a href="{{ route('details', $recommendation->slug) }}" class="absolute inset-0"></a>
                </div>
                <div class="text-center">
                    <h3 class="text-base md:text-lg font-serif text-lux-black mb-2 group-hover:text-lux-gold transition-colors">
                        <a href="{{ route('details', $recommendation->slug) }}">{{ $recommendation->name }}</a>
                    </h3>
                    <p class="text-lux-grey-dark font-medium tracking-widest text-xs md:text-sm">
                        {{ number_format($recommendation->price) }} DH
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- END: COMPLETE YOUR ROOM -->

<script>
    document.querySelectorAll('.thumbnail-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const newImg = this.getAttribute('data-img');
            const mainPreview = document.getElementById('main-preview');

            // Fade effect
            mainPreview.style.opacity = '0';
            setTimeout(() => {
                mainPreview.src = newImg;
                mainPreview.style.opacity = '1';
            }, 300);

            // Active border
            document.querySelectorAll('.thumbnail-btn').forEach(b => b.classList.remove('border-lux-gold'));
            document.querySelectorAll('.thumbnail-btn').forEach(b => b.classList.add('border-transparent'));
            this.classList.remove('border-transparent');
            this.classList.add('border-lux-gold');
        });
    });
</script>
@endsection
