@extends('layouts.frontend')

@section('content')
<div class="bg-lux-grey-light min-h-screen flex items-center justify-center pt-32 pb-24">
    <div class="container mx-auto px-4 md:px-6">
        <div class="max-w-xl mx-auto text-center bg-white p-12 shadow-lg">
            <div class="mb-10 inline-flex items-center justify-center w-24 h-24 bg-lux-gold/10 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-lux-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <span class="block text-lux-gold uppercase tracking-[0.3em] text-xs font-bold mb-4">Commande Confirmée</span>
            <h1 class="text-4xl md:text-5xl font-serif text-lux-black mb-6">Merci pour <br />votre commande</h1>

            <p class="text-lux-grey-dark leading-relaxed mb-10">
                Votre commande a été reçue et est en cours de préparation. <br>
                <strong>Mode de paiement :</strong> Paiement à la livraison (Cash on Delivery). <br>
                Vous recevrez un appel ou un e-mail de confirmation très prochainement.
            </p>

            <div class="space-y-4">
                <a href="{{ route('catalog') }}"
                    class="block w-full bg-lux-black text-white py-5 text-xs font-bold uppercase tracking-widest hover:bg-lux-gold transition-all duration-300">
                    Continuer mes achats
                </a>
                <a href="{{ route('dashboard.index') }}"
                    class="block w-full text-lux-black py-4 text-xs font-bold uppercase tracking-widest hover:text-lux-gold transition-colors">
                    Voir mes commandes
                </a>
            </div>

            <div class="mt-12 pt-12 border-t border-lux-grey-medium/30">
                <p class="text-[10px] text-lux-grey-dark uppercase tracking-widest">
                    Besoin d'aide ? <a href="{{ route('contact') }}" class="text-lux-black font-bold border-b border-lux-black pb-0.5 ml-1">Contactez le support</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
