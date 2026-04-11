@extends('layouts.frontend')

@section('content')
<div class="bg-lux-grey-light pt-24 md:pt-32 pb-16 md:pb-24">
    <div class="container mx-auto px-4 md:px-6">
        <!-- Breadcrumbs & Title -->
        <div class="mb-8 md:mb-12">
            <nav class="flex text-[10px] md:text-xs uppercase tracking-widest text-lux-grey-dark mb-4 overflow-x-auto whitespace-nowrap rtl:space-x-reverse">
                <a href="{{ route('index') }}" class="hover:text-lux-gold transition-colors">{{ __('Accueil') }}</a>
                <span class="mx-2">/</span>
                <span class="text-lux-black">{{ __('Catalogue') }}</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-serif text-lux-black">{{ __('Notre Collection') }}</h1>
        </div>

        <div class="flex flex-col lg:flex-row gap-10 lg:gap-12">
            <!-- Sidebar (Filters) -->
            <aside class="w-full lg:w-64 flex-shrink-0 space-y-8 md:space-y-10">
                <div class="bg-white p-6 lg:p-0 shadow-sm lg:shadow-none">
                    <h4 class="text-sm font-bold uppercase tracking-widest text-lux-black mb-6">{{ __('Offres spéciales') }}</h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('catalog', array_merge(request()->except('promo'), request('promo') ? [] : ['promo' => 1])) }}"
                                class="text-sm {{ request()->has('promo') ? 'text-lux-gold font-bold' : 'text-lux-grey-dark' }} hover:text-lux-gold transition-colors flex items-center">
                                <span class="w-4 h-4 border {{ request()->has('promo') ? 'bg-lux-gold border-lux-gold' : 'border-lux-grey-medium' }} mr-3 rtl:mr-0 rtl:ml-3 flex items-center justify-center">
                                    @if(request()->has('promo'))
                                    <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    @endif
                                </span>
                                {{ __('En promotion') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-6 lg:p-0 shadow-sm lg:shadow-none">
                    <h4 class="text-sm font-bold uppercase tracking-widest text-lux-black mb-6">{{ __('Catégories') }}</h4>
                    <ul class="grid grid-cols-2 lg:grid-cols-1 gap-4">
                        <li>
                            <a href="{{ route('catalog') }}"
                                class="text-sm {{ !request()->has('category') ? 'text-lux-gold font-bold' : 'text-lux-grey-dark' }} hover:text-lux-gold transition-colors flex justify-between">
                                {{ __('Toutes les collections') }}
                            </a>
                        </li>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('catalog', ['category' => $category->slug]) }}"
                                class="text-sm {{ request('category') == $category->slug ? 'text-lux-gold font-bold' : 'text-lux-grey-dark' }} hover:text-lux-gold transition-colors flex justify-between">
                                {{ $category->name }} <span class="text-[10px] text-lux-grey-medium">({{ $category->products_count }})</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-bold uppercase tracking-widest text-lux-black mb-6">{{ __('Gamme de prix') }}</h4>
                    <div class="space-y-4">
                        <label class="flex items-center space-x-3 rtl:space-x-reverse cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 border-lux-grey-medium text-lux-gold focus:ring-lux-gold rounded-none" />
                            <span class="text-sm text-lux-grey-dark group-hover:text-lux-black transition-colors">{{ __('Moins de 1,000 DH') }}</span>
                        </label>
                        <label class="flex items-center space-x-3 rtl:space-x-reverse cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 border-lux-grey-medium text-lux-gold focus:ring-lux-gold rounded-none" />
                            <span class="text-sm text-lux-grey-dark group-hover:text-lux-black transition-colors">{{ __('1,000 DH - 5,000 DH') }}</span>
                        </label>
                        <label class="flex items-center space-x-3 rtl:space-x-reverse cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 border-lux-grey-medium text-lux-gold focus:ring-lux-gold rounded-none" />
                            <span class="text-sm text-lux-grey-dark group-hover:text-lux-black transition-colors">{{ __('Plus de 5,000 DH') }}</span>
                        </label>
                    </div>
                </div>

                <div class="pt-6">
                    <button class="w-full bg-lux-black text-white py-4 text-xs font-bold uppercase tracking-widest hover:bg-lux-gold transition-all duration-300">
                        {{ __('Appliquer les filtres') }}
                    </button>
                </div>
            </aside>

            <!-- Main Catalog -->
            <div class="flex-grow">
                <!-- Sorting & Info -->
                <div class="flex flex-col sm:flex-row justify-between items-center mb-10 pb-6 border-b border-lux-grey-medium/30 space-y-4 sm:space-y-0">
                    <p class="text-sm text-lux-grey-dark">@if(app()->getLocale() == 'ar') {{ __('Affichage de') }} <span class="text-lux-black font-medium">{{ $products->count() }}</span> {{ __('produits') }} @else Showing <span class="text-lux-black font-medium">{{ $products->count() }}</span> products @endif</p>
                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                        <label class="text-xs uppercase tracking-widest text-lux-grey-dark">{{ __('Trier par :') }}</label>
                        <select class="bg-transparent border-none text-sm font-medium text-lux-black focus:ring-0 cursor-pointer">
                            <option>{{ __('Plus récent') }}</option>
                            <option>{{ __('Prix : croissant') }}</option>
                            <option>{{ __('Prix : décroissant') }}</option>
                            <option>{{ __('Plus populaire') }}</option>
                        </select>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-12">
                    @forelse ($products as $product)
                    <div class="group relative">
                        @if($product->isOnPromotion())
                        <div class="absolute top-4 left-4 rtl:left-auto rtl:right-4 z-10">
                            <span class="bg-lux-gold text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1">
                                {{ $product->promo_label ?? __('Promotion') }}
                            </span>
                        </div>
                        @endif
                        <div class="relative aspect-[3/4] overflow-hidden bg-white mb-6">
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                src="{{ $product->productGallery()->exists() ? Storage::url($product->productGallery->first()->url) : asset('frontend/images/content/placeholder-product.png') }}"
                                data-fallback="{{ asset('frontend/images/content/placeholder-product.png') }}"
                                onerror="this.onerror=null; this.src=this.dataset.fallback;"
                                alt="{{ $product->name }}">

                            <!-- Overlay Actions -->
                            <div class="absolute inset-0 bg-lux-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center space-x-4 rtl:space-x-reverse">
                                <a href="{{ route('details', $product->slug) }}"
                                    class="bg-white text-lux-black p-4 rounded-full hover:bg-lux-gold hover:text-white transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                    @empty
                    <div class="col-span-full py-24 text-center bg-white border border-dashed border-lux-grey-medium rounded-2xl">
                        <p class="text-lux-grey-dark italic">{{ __('No products found in this category.') }}</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination (Placeholder) -->
                @if($products->count() > 0)
                <div class="mt-20 flex justify-center">
                    <nav class="flex items-center space-x-2 rtl:space-x-reverse">
                        <a href="#" class="w-10 h-10 flex items-center justify-center border border-lux-grey-medium text-lux-black hover:border-lux-gold hover:text-lux-gold transition-colors">1</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center border border-lux-grey-medium text-lux-black hover:border-lux-gold hover:text-lux-gold transition-colors">2</a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center border border-lux-grey-medium text-lux-black hover:border-lux-gold hover:text-lux-gold transition-colors">3</a>
                        <span class="px-2">...</span>
                        <a href="#" class="w-10 h-10 flex items-center justify-center border border-lux-grey-medium text-lux-black hover:border-lux-gold hover:text-lux-gold transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </nav>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
