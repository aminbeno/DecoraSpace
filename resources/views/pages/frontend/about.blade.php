@extends('layouts.frontend')

@section('content')
<section class="relative py-24 bg-lux-grey-light">
    <div class="container mx-auto px-4 md:px-6">
        <div class="max-w-4xl mx-auto text-center mb-16">
            <span class="text-lux-gold uppercase tracking-[0.3em] text-sm font-medium mb-6 block">{{ __('Notre Histoire') }}</span>
            <h1 class="text-5xl md:text-6xl font-serif text-lux-black mb-8">{{ __('À Propos de LuxSpace') }}</h1>
            <p class="text-lg text-lux-grey-dark leading-relaxed">
                {{ __('Depuis notre création, LuxSpace s\'est donné pour mission de transformer chaque maison en un sanctuaire d\'élégance et de confort. Nous croyons que le mobilier n\'est pas seulement fonctionnel, mais qu\'il définit l\'âme de votre espace de vie.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center mb-24">
            <div>
                <img src="/frontend/images/content/image-section-1.png" alt="{{ __('Notre Atelier') }}" class="rounded-2xl shadow-2xl w-full h-[500px] object-cover">
            </div>
            <div class="space-y-8">
                <h2 class="text-3xl font-serif text-lux-black">{{ __('Qualité Artisanale & Design Moderne') }}</h2>
                <p class="text-lux-grey-dark leading-relaxed">
                    {{ __('Chaque pièce de notre collection est sélectionnée avec soin pour sa qualité exceptionnelle et son design intemporel. Nous travaillons avec les meilleurs artisans pour vous offrir des meubles qui durent toute une vie.') }}
                </p>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-4 rtl:space-x-reverse">
                        <span class="w-8 h-8 rounded-full bg-lux-gold flex items-center justify-center text-white">✓</span>
                        <span class="font-medium">{{ __('Matériaux Premium uniquement') }}</span>
                    </li>
                    <li class="flex items-center space-x-4 rtl:space-x-reverse">
                        <span class="w-8 h-8 rounded-full bg-lux-gold flex items-center justify-center text-white">✓</span>
                        <span class="font-medium">{{ __('Design Exclusif & Unique') }}</span>
                    </li>
                    <li class="flex items-center space-x-4 rtl:space-x-reverse">
                        <span class="w-8 h-8 rounded-full bg-lux-gold flex items-center justify-center text-white">✓</span>
                        <span class="font-medium">{{ __('Livraison Sécurisée à Domicile') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
