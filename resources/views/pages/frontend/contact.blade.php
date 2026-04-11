@extends('layouts.frontend')

@section('content')
<section class="py-24 bg-lux-grey-light">
    <div class="container mx-auto px-4 md:px-6">
        <div class="max-w-4xl mx-auto text-center mb-16">
            <span class="text-lux-gold uppercase tracking-[0.3em] text-sm font-medium mb-6 block">{{ __('Prenez Contact') }}</span>
            <h1 class="text-5xl md:text-6xl font-serif text-lux-black mb-8">{{ __('Contactez-nous') }}</h1>
            <p class="text-lg text-lux-grey-dark leading-relaxed">
                {{ __('Vous avez une question ou besoin d\'aide pour votre projet d\'aménagement ? Notre équipe d\'experts est à votre écoute pour vous accompagner.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Informations de contact -->
            <div class="lg:col-span-1 space-y-8 bg-white p-12 shadow-2xl rounded-2xl">
                <div class="flex items-start space-x-6 rtl:space-x-reverse">
                    <div class="w-12 h-12 rounded-full bg-lux-gold/10 flex items-center justify-center text-lux-gold shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-2 uppercase tracking-widest text-lux-black">{{ __('E-mail') }}</h3>
                        <p class="text-lux-grey-dark">support@luxspace.com</p>
                        <p class="text-lux-grey-dark">contact@luxspace.com</p>
                    </div>
                </div>
                <div class="flex items-start space-x-6 rtl:space-x-reverse">
                    <div class="w-12 h-12 rounded-full bg-lux-gold/10 flex items-center justify-center text-lux-gold shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-2 uppercase tracking-widest text-lux-black">{{ __('Téléphone') }}</h3>
                        <p class="text-lux-grey-dark">+33 (0)1 23 45 67 89</p>
                        <p class="text-lux-grey-dark">{{ __('Lun-Ven, 9h-18h') }}</p>
                    </div>
                </div>
                <div class="flex items-start space-x-6 rtl:space-x-reverse">
                    <div class="w-12 h-12 rounded-full bg-lux-gold/10 flex items-center justify-center text-lux-gold shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-2 uppercase tracking-widest text-lux-black">{{ __('Adresse') }}</h3>
                        <p class="text-lux-grey-dark">123 Avenue du Design</p>
                        <p class="text-lux-grey-dark">75001 Paris, France</p>
                    </div>
                </div>
            </div>

            <!-- Formulaire de contact -->
            <div class="lg:col-span-2 bg-white p-12 shadow-2xl rounded-2xl">
                <form action="#" class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block uppercase tracking-widest text-gray-700 text-xs font-bold mb-2">{{ __('Nom Complet') }}</label>
                            <input type="text" placeholder="Ex: Jean Dupont" class="block w-full bg-lux-grey-light border-0 border-b border-lux-grey-medium px-0 py-4 focus:border-lux-gold focus:ring-0 transition-all rtl:text-right">
                        </div>
                        <div>
                            <label class="block uppercase tracking-widest text-gray-700 text-xs font-bold mb-2">{{ __('Email Address') }}</label>
                            <input type="email" placeholder="Ex: jean@email.com" class="block w-full bg-lux-grey-light border-0 border-b border-lux-grey-medium px-0 py-4 focus:border-lux-gold focus:ring-0 transition-all rtl:text-right">
                        </div>
                    </div>
                    <div>
                        <label class="block uppercase tracking-widest text-gray-700 text-xs font-bold mb-2">{{ __('Sujet') }}</label>
                        <input type="text" placeholder="{{ __('Comment pouvons-nous vous aider ?') }}" class="block w-full bg-lux-grey-light border-0 border-b border-lux-grey-medium px-0 py-4 focus:border-lux-gold focus:ring-0 transition-all rtl:text-right">
                    </div>
                    <div>
                        <label class="block uppercase tracking-widest text-gray-700 text-xs font-bold mb-2">{{ __('Message') }}</label>
                        <textarea placeholder="{{ __('Votre message ici...') }}" rows="6" class="block w-full bg-lux-grey-light border-0 border-b border-lux-grey-medium px-0 py-4 focus:border-lux-gold focus:ring-0 transition-all rtl:text-right"></textarea>
                    </div>
                    <button type="submit" class="bg-lux-black text-white px-12 py-5 text-sm font-bold uppercase tracking-widest hover:bg-lux-gold transition-all duration-300 w-full md:w-auto">
                        {{ __('Envoyer le message') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
