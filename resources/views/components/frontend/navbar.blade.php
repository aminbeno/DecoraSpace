<!-- START: HEADER -->
@php($isHomeRoute = Route::currentRouteNamed('index'))
<header class="fixed top-0 left-0 w-full z-50 transition-all duration-300 {{ $isHomeRoute ? 'bg-transparent' : 'bg-white/90 backdrop-blur-md border-b border-lux-grey-medium/10' }}"
    id="main-header"
    data-is-home="{{ $isHomeRoute ? 'true' : 'false' }}">
    <div class="container mx-auto px-4 md:px-6">
        <div class="flex items-center justify-between py-4 md:py-6">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('index') }}" class="block group">
                    <img src="{{ asset('frontend/images/content/logo.png') }}"
                        alt="Luxspace" class="h-8 md:h-10 w-auto transition-transform duration-300 group-hover:scale-105" />
                </a>
            </div>

            <!-- Navigation Links (Desktop) -->
            <nav class="hidden md:flex items-center space-x-10 rtl:space-x-reverse">
                <a href="{{ route('index') }}#browse-the-room"
                    class="text-sm font-medium tracking-widest uppercase transition-colors duration-200 {{ $isHomeRoute ? 'text-white hover:text-lux-gold' : 'text-lux-black hover:text-lux-gold' }}">
                    {{ __('Vitrine') }}
                </a>
                <a href="{{ route('catalog') }}"
                    class="text-sm font-medium tracking-widest uppercase transition-colors duration-200 {{ $isHomeRoute ? 'text-white hover:text-lux-gold' : 'text-lux-black hover:text-lux-gold' }}">
                    {{ __('Catalogue') }}
                </a>
                <a href="#"
                    class="text-sm font-medium tracking-widest uppercase transition-colors duration-200 {{ $isHomeRoute ? 'text-white hover:text-lux-gold' : 'text-lux-black hover:text-lux-gold' }}">
                    {{ __('Livraison') }}
                </a>
                <a href="{{ route('about') }}"
                    class="text-sm font-medium tracking-widest uppercase transition-colors duration-200 {{ $isHomeRoute ? 'text-white hover:text-lux-gold' : 'text-lux-black hover:text-lux-gold' }}">
                    {{ __('À propos') }}
                </a>
                <a href="{{ route('contact') }}"
                    class="text-sm font-medium tracking-widest uppercase transition-colors duration-200 {{ $isHomeRoute ? 'text-white hover:text-lux-gold' : 'text-lux-black hover:text-lux-gold' }}">
                    {{ __('Contact') }}
                </a>
                @auth
                <a href="{{ route('dashboard.index') }}"
                    class="text-sm font-medium tracking-widest uppercase transition-colors duration-200 {{ $isHomeRoute ? 'text-white hover:text-lux-gold' : 'text-lux-black hover:text-lux-gold' }}">
                    {{ __('Tableau de bord') }}
                </a>
                @endauth
                @guest
                <a href="{{ route('login') }}"
                    class="text-sm font-medium tracking-widest uppercase transition-colors duration-200 {{ $isHomeRoute ? 'text-white hover:text-lux-gold' : 'text-lux-black hover:text-lux-gold' }}">
                    {{ __('Connexion') }}
                </a>
                <a href="{{ route('register') }}"
                    class="text-sm font-medium tracking-widest uppercase transition-colors duration-200 {{ $isHomeRoute ? 'text-white hover:text-lux-gold' : 'text-lux-black hover:text-lux-gold' }}">
                    {{ __('Inscription') }}
                </a>
                @endguest

                <!-- Language Selector (Desktop) -->
                <div class="relative group ml-4">
                    <button class="flex items-center space-x-1 text-sm font-medium tracking-widest uppercase transition-colors duration-200 {{ $isHomeRoute ? 'text-white hover:text-lux-gold' : 'text-lux-black hover:text-lux-gold' }}">
                        <span>{{ strtoupper(app()->getLocale()) }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg py-1 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 border border-lux-grey-medium/10">
                        <a href="{{ route('locale.set', 'fr') }}" class="block px-4 py-2 text-sm text-lux-black hover:bg-lux-grey-light hover:text-lux-gold {{ app()->getLocale() == 'fr' ? 'font-bold text-lux-gold' : '' }}">Français</a>
                        <a href="{{ route('locale.set', 'ar') }}" class="block px-4 py-2 text-sm text-lux-black hover:bg-lux-grey-light hover:text-lux-gold {{ app()->getLocale() == 'ar' ? 'font-bold text-lux-gold' : '' }}">العربية (AR)</a>
                        <a href="{{ route('locale.set', 'en') }}" class="block px-4 py-2 text-sm text-lux-black hover:bg-lux-grey-light hover:text-lux-gold {{ app()->getLocale() == 'en' ? 'font-bold text-lux-gold' : '' }}">English</a>
                    </div>
                </div>
            </nav>

            <!-- Right Icons -->
            <div class="flex items-center space-x-3 md:space-x-6">
                <!-- Search Icon (Desktop only) -->
                <button class="hidden md:block transition-colors duration-200 {{ $isHomeRoute ? 'text-white hover:text-lux-gold' : 'text-lux-black hover:text-lux-gold' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <!-- Cart -->
                <a href="{{ route('cart') }}"
                    class="relative p-2 transition-colors duration-200 {{ $isHomeRoute ? 'text-white hover:text-lux-gold' : 'text-lux-black hover:text-lux-gold' }} flex items-center justify-center"
                    aria-label="Shopping Cart">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-7 md:w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </a>

                <!-- Mobile Menu Toggler -->
                <button id="mobile-menu-toggler"
                    class="md:hidden p-2 transition-colors duration-200 {{ $isHomeRoute ? 'text-white hover:text-lux-gold' : 'text-lux-black hover:text-lux-gold' }} flex items-center justify-center"
                    aria-label="Toggle menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu (Sidebar Drawer) -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-lux-black/50 z-[60] opacity-0 pointer-events-none transition-opacity duration-300 md:hidden"></div>
    <div id="mobile-sidebar" class="fixed inset-y-0 right-0 rtl:right-auto rtl:left-0 w-[300px] bg-lux-black z-[100] translate-x-full rtl:-translate-x-full transition-transform duration-300 ease-in-out md:hidden flex flex-col p-10 overflow-y-auto">
        <div class="flex justify-between items-center mb-16">
            <span class="text-lux-gold font-serif text-2xl tracking-widest uppercase">{{ __('Menu') }}</span>
            <button id="mobile-menu-close" class="text-white p-2 hover:text-lux-gold transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <nav class="flex flex-col space-y-8">
            <a href="{{ route('index') }}" class="text-xl font-serif text-white tracking-widest uppercase hover:text-lux-gold transition-colors border-b border-white/5 pb-4">{{ __('Accueil') }}</a>
            <a href="{{ route('catalog') }}" class="text-xl font-serif text-white tracking-widest uppercase hover:text-lux-gold transition-colors border-b border-white/5 pb-4">{{ __('Catalogue') }}</a>
            <a href="#" class="text-xl font-serif text-white tracking-widest uppercase hover:text-lux-gold transition-colors border-b border-white/5 pb-4">{{ __('Livraison') }}</a>
            <a href="{{ route('about') }}" class="text-xl font-serif text-white tracking-widest uppercase hover:text-lux-gold transition-colors border-b border-white/5 pb-4">{{ __('À propos') }}</a>
            <a href="{{ route('contact') }}" class="text-xl font-serif text-white tracking-widest uppercase hover:text-lux-gold transition-colors border-b border-white/5 pb-4">{{ __('Contact') }}</a>

            @auth
            <a href="{{ route('dashboard.index') }}" class="text-xl font-serif text-white tracking-widest uppercase hover:text-lux-gold transition-colors border-b border-white/5 pb-4">{{ __('Tableau de bord') }}</a>
            @endauth

            @guest
            <a href="{{ route('login') }}" class="text-xl font-serif text-white tracking-widest uppercase hover:text-lux-gold transition-colors border-b border-white/5 pb-4">{{ __('Connexion') }}</a>
            <a href="{{ route('register') }}" class="text-xl font-serif text-white tracking-widest uppercase hover:text-lux-gold transition-colors border-b border-white/5 pb-4">{{ __('Inscription') }}</a>
            @endguest

            <!-- Language Switcher (Mobile) -->
            <div class="pt-8 border-t border-white/10 flex flex-wrap gap-4">
                <a href="{{ route('locale.set', 'fr') }}" class="text-sm font-medium uppercase {{ app()->getLocale() == 'fr' ? 'text-lux-gold' : 'text-white/60' }}">FR</a>
                <a href="{{ route('locale.set', 'ar') }}" class="text-sm font-medium uppercase {{ app()->getLocale() == 'ar' ? 'text-lux-gold' : 'text-white/60' }}">AR</a>
                <a href="{{ route('locale.set', 'en') }}" class="text-sm font-medium uppercase {{ app()->getLocale() == 'en' ? 'text-lux-gold' : 'text-white/60' }}">EN</a>
            </div>
        </nav>

    <div class="mt-auto pt-16 text-center">
        <p class="text-white/30 text-xs uppercase tracking-widest">© {{ date('Y') }} LuxSpace</p>
    </div>
</div>

<script>
        (function() {
            document.addEventListener('DOMContentLoaded', function() {
                const header = document.getElementById('main-header');
                const menuToggler = document.getElementById('mobile-menu-toggler');
                const menuClose = document.getElementById('mobile-menu-close');
                const menuOverlay = document.getElementById('mobile-menu-overlay');
                const menu = document.getElementById('mobile-sidebar');

                if (!header) return;

                const isHomePage = header.getAttribute('data-is-home') === 'true';

                // Header scroll effect
                if (isHomePage) {
                    const navLinks = header.querySelectorAll('nav a');
                    const icons = header.querySelectorAll('button, a.relative');
                    const headerContent = header.querySelector('.container > div');

                    window.addEventListener('scroll', () => {
                        if (window.scrollY > 50) {
                            header.classList.remove('bg-transparent');
                            header.classList.add('bg-white/95', 'backdrop-blur-md', 'shadow-sm');
                            if (headerContent) {
                                headerContent.classList.replace('py-4', 'py-2');
                                headerContent.classList.replace('md:py-6', 'md:py-4');
                            }

                            navLinks.forEach(link => {
                                link.classList.remove('text-white');
                                link.classList.add('text-lux-black');
                            });
                            icons.forEach(el => {
                                el.classList.remove('text-white');
                                el.classList.add('text-lux-black');
                            });
                        } else {
                            header.classList.add('bg-transparent');
                            header.classList.remove('bg-white/95', 'backdrop-blur-md', 'shadow-sm');
                            if (headerContent) {
                                headerContent.classList.replace('py-2', 'py-4');
                                headerContent.classList.replace('md:py-4', 'md:py-6');
                            }

                            navLinks.forEach(link => {
                                link.classList.add('text-white');
                                link.classList.remove('text-lux-black');
                            });
                            icons.forEach(el => {
                                el.classList.add('text-white');
                                el.classList.remove('text-lux-black');
                            });
                        }
                    });
                }

                function openMenu() {
                    if (!menu || !menuOverlay) return;
                    const isRtl = document.documentElement.getAttribute('dir') === 'rtl';
                    if (isRtl) {
                        menu.classList.remove('-translate-x-full');
                    } else {
                        menu.classList.remove('translate-x-full');
                    }
                    menuOverlay.classList.remove('opacity-0', 'pointer-events-none');
                    menuOverlay.classList.add('opacity-100', 'pointer-events-auto');
                    document.body.style.overflow = 'hidden';
                }

                function closeMenu() {
                    if (!menu || !menuOverlay) return;
                    const isRtl = document.documentElement.getAttribute('dir') === 'rtl';
                    if (isRtl) {
                        menu.classList.add('-translate-x-full');
                    } else {
                        menu.classList.add('translate-x-full');
                    }
                    menuOverlay.classList.add('opacity-0', 'pointer-events-none');
                    menuOverlay.classList.remove('opacity-100', 'pointer-events-auto');
                    document.body.style.overflow = 'auto';
                }

                if (menuToggler && menu && menuClose && menuOverlay) {
                    menuToggler.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        openMenu();
                    });

                    menuClose.addEventListener('click', closeMenu);
                    menuOverlay.addEventListener('click', closeMenu);

                    const menuLinks = menu.querySelectorAll('a');
                    menuLinks.forEach(link => {
                        link.addEventListener('click', (e) => {
                            if (link.hash && link.pathname === window.location.pathname) {
                                closeMenu();
                            }
                        });
                    });
                }
            });
        })();
    </script>
<!-- END: HEADER -->
