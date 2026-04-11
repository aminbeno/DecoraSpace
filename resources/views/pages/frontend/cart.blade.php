@extends('layouts.frontend')

@section('content')
<div class="bg-lux-grey-light pt-32 pb-24">
    <div class="container mx-auto px-4 md:px-6">
        <!-- Breadcrumbs -->
        <nav class="flex text-[10px] md:text-xs uppercase tracking-widest text-lux-grey-dark mb-8 md:mb-12">
            <a href="{{ route('index') }}" class="hover:text-lux-gold transition-colors">Accueil</a>
            <span class="mx-2">/</span>
            <span class="text-lux-black">Panier</span>
        </nav>

        <h1 class="text-3xl md:text-5xl font-serif text-lux-black mb-8 md:mb-12">Votre Panier</h1>

        @if (session('error'))
        <div class="mb-8 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm">
            {{ session('error') }}
        </div>
        @endif

        <div class="flex flex-col lg:flex-row gap-16">
            <!-- Cart Items -->
            <div class="w-full lg:w-2/3 space-y-8">
                @forelse ($carts as $cart)
                <div class="flex flex-col sm:flex-row items-center bg-white p-6 shadow-sm group">
                    <div class="w-32 h-32 flex-shrink-0 bg-lux-grey-light overflow-hidden mb-4 sm:mb-0">
                        <img src="{{ $cart->product->productGallery()->exists() ? Storage::url($cart->product->productGallery->first()->url) : asset('frontend/images/content/placeholder-product.png') }}"
                            data-fallback="{{ asset('frontend/images/content/placeholder-product.png') }}"
                            onerror="this.onerror=null; this.src=this.dataset.fallback;"
                            alt="{{ $cart->product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                    </div>
                    <div class="sm:ml-8 flex-grow text-center sm:text-left">
                        <h3 class="text-xl font-serif text-lux-black mb-1">{{ $cart->product->name }}</h3>
                        <p class="text-sm text-lux-grey-dark uppercase tracking-widest mb-2">Premium Collection</p>
                        <div class="flex items-center justify-center sm:justify-start space-x-3">
                            <p class="text-lg font-medium text-lux-black">{{ number_format($cart->product->currentPrice()) }} DH</p>
                            @if($cart->product->isOnPromotion())
                            <p class="text-sm text-lux-grey-dark line-through opacity-50">{{ number_format($cart->product->price) }} DH</p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-auto">
                        <form action="{{ route('cart-delete', $cart->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-lux-grey-medium hover:text-red-600 transition-colors p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="text-center py-20 bg-white border border-dashed border-lux-grey-medium rounded-2xl">
                    <p class="text-lux-grey-dark italic mb-6">Your cart is currently empty.</p>
                    <a href="{{ route('catalog') }}" class="inline-block bg-lux-black text-white px-10 py-4 text-xs font-bold uppercase tracking-widest hover:bg-lux-gold transition-all duration-300">
                        Start Shopping
                    </a>
                </div>
                @endforelse

                @if($carts->isNotEmpty())
                <div class="flex justify-between items-center pt-8 border-t border-lux-grey-medium/30">
                    <span class="text-lux-grey-dark uppercase tracking-widest text-sm">Total</span>
                    <span class="text-2xl font-serif text-lux-black">{{ number_format($total_price) }} DH</span>
                </div>
                @endif
            </div>

            <!-- Détails de livraison -->
            <div class="w-full lg:w-1/3" id="details-livraison">
                <div class="bg-white p-8 shadow-lg lg:sticky lg:top-32">
                    <h2 class="text-2xl font-serif text-lux-black mb-8">Détails de livraison</h2>

                    <form action="{{ route('checkout') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="space-y-2">
                            <label for="complete-name" class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold">Nom complet</label>
                            <input data-input type="text" name="name" id="complete-name" value="{{ old('name', auth()->user()->name) }}" required
                                class="w-full border-b border-lux-grey-medium py-2 focus:outline-none focus:border-lux-gold transition-colors text-sm" />
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold">Adresse E-mail</label>
                            <input data-input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required
                                class="w-full border-b border-lux-grey-medium py-2 focus:outline-none focus:border-lux-gold transition-colors text-sm" />
                        </div>

                        <div class="space-y-2">
                            <label for="address" class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold">Adresse de livraison</label>
                            <input data-input type="text" name="address" id="address" value="{{ old('address') }}" required
                                class="w-full border-b border-lux-grey-medium py-2 focus:outline-none focus:border-lux-gold transition-colors text-sm" />
                        </div>

                        <div class="space-y-2">
                            <label for="phone-number" class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold">Numéro de téléphone</label>
                            <input data-input type="tel" name="phone" id="phone-number" value="{{ old('phone') }}" required
                                class="w-full border-b border-lux-grey-medium py-2 focus:outline-none focus:border-lux-gold transition-colors text-sm" />
                        </div>

                        <!-- Courier Selection -->
                        <div class="space-y-4">
                            <label class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold">Choisir le transporteur</label>
                            <div class="grid grid-cols-2 gap-4">
                                <button type="button" data-name="courier" data-value="fedex"
                                    class="border border-lux-grey-medium p-4 hover:border-lux-gold transition-all focus:border-lux-gold focus:outline-none group">
                                    <img src="{{ asset('/frontend/images/content/logo-fedex.svg') }}" alt="Fedex" class="h-4 md:h-6 mx-auto grayscale group-hover:grayscale-0 transition-all" />
                                </button>
                                <button type="button" data-name="courier" data-value="dhl"
                                    class="border border-lux-grey-medium p-4 hover:border-lux-gold transition-all focus:border-lux-gold focus:outline-none group">
                                    <img src="{{ asset('/frontend/images/content/logo-dhl.svg') }}" alt="DHL" class="h-4 md:h-6 mx-auto grayscale group-hover:grayscale-0 transition-all" />
                                </button>
                            </div>
                        </div>

                        <!-- Payment Selection -->
                        <div class="space-y-4">
                            <label class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold">Mode de paiement</label>
                            <div class="p-6 border-2 border-lux-gold bg-lux-gold/5 flex flex-col items-center text-center space-y-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-lux-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <div>
                                    <p class="text-sm font-bold text-lux-black uppercase tracking-widest">Paiement à la livraison (COD)</p>
                                    <p class="text-[10px] text-lux-grey-dark mt-1">Vous payez en espèces dès que vous recevez votre commande.</p>
                                </div>
                                <input type="hidden" name="payment" value="COD">
                            </div>
                        </div>

                        <div class="pt-6">
                            <button type="submit"
                                class="w-full bg-lux-black text-white py-5 text-xs font-bold uppercase tracking-widest hover:bg-lux-gold transition-all duration-300">
                                Confirmer ma commande
                            </button>
                        </div>
                    </form>

                    <div class="mt-8 pt-8 border-t border-lux-grey-medium/30">
                        <p class="text-[10px] text-lux-grey-dark leading-relaxed">
                            Your transaction is secured with industry-standard encryption.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
