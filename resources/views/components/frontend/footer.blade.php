<!-- START: FOOTER -->
<footer class="bg-lux-black text-white pt-20 pb-10">
    <div class="container mx-auto px-4 md:px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <!-- Brand & Description -->
            <div class="space-y-6">
                <a href="{{ route('index') }}" class="block">
                    <img src="{{ asset('frontend/images/content/logo.png') }}" alt="Luxspace" class="h-8 brightness-0 invert" />
                </a>
                <p class="text-gray-400 text-sm leading-relaxed max-w-xs">
                    {{ __('Sublimez votre espace de vie avec notre collection de meubles et de décoration haut de gamme. Le design intemporel rencontre le confort moderne.') }}
                </p>
                <div class="flex space-x-4 rtl:space-x-reverse pt-4">
                    <a href="#" class="text-gray-400 hover:text-lux-gold transition-colors duration-200">
                        <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-lux-gold transition-colors duration-200">
                        <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.947.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-lux-gold transition-colors duration-200">
                        <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="lg:pl-10">
                <h5 class="text-white font-serif text-lg mb-6 tracking-wide">{{ __('Overview') }}</h5>
                <ul class="space-y-4">
                    <li><a href="#" class="text-gray-400 hover:text-lux-gold text-sm transition-colors duration-200 block">{{ __('Expédition') }}</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-lux-gold text-sm transition-colors duration-200 block">{{ __('Politique de remboursement') }}</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-lux-gold text-sm transition-colors duration-200 block">{{ __('Nos promotions') }}</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div class="lg:pl-10">
                <h5 class="text-white font-serif text-lg mb-6 tracking-wide">{{ __('Company') }}</h5>
                <ul class="space-y-4">
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-lux-gold text-sm transition-colors duration-200 block">{{ __('À propos de nous') }}</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-lux-gold text-sm transition-colors duration-200 block">{{ __('Careers') }}</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-lux-gold text-sm transition-colors duration-200 block">{{ __('Contact') }}</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="space-y-6">
                <h5 class="text-white font-serif text-lg mb-6 tracking-wide">{{ __('Newsletter') }}</h5>
                <p class="text-gray-400 text-sm leading-relaxed">
                    {{ __('Subscribe to receive updates, access to exclusive deals, and more.') }}
                </p>
                <form action="#" class="relative">
                    <input type="email" placeholder="{{ __('Email Address') }}"
                        class="w-full bg-lux-dark border border-gray-800 rounded-none py-4 px-6 text-sm text-white focus:outline-none focus:border-lux-gold transition-colors duration-300 rtl:pl-12 rtl:pr-6" />
                    <button type="submit" class="absolute right-4 rtl:right-auto rtl:left-4 top-1/2 -translate-y-1/2 text-lux-gold hover:text-white transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-900 pt-10 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <p class="text-gray-500 text-xs tracking-widest uppercase">
                &copy; {{ now()->year }} LuxSpace. {{ __('All Rights Reserved.') }}
            </p>
            <div class="flex space-x-6 rtl:space-x-reverse">
                <a href="{{ Route::has('terms.show') ? route('terms.show') : '#' }}" class="text-gray-500 hover:text-white text-xs tracking-widest uppercase transition-colors duration-200">{{ __('Terms') }}</a>
                <a href="{{ Route::has('policy.show') ? route('policy.show') : '#' }}" class="text-gray-500 hover:text-white text-xs tracking-widest uppercase transition-colors duration-200">{{ __('Privacy') }}</a>
            </div>
        </div>
    </div>
</footer>
<!-- END: FOOTER -->
