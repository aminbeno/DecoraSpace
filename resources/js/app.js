import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

// Mobile Menu Toggle
const menuToggler = document.getElementById('menu-toggler');
const menuClose = document.getElementById('menu-close');
const menu = document.getElementById('menu');

if (menuToggler && menu) {
    menuToggler.addEventListener('click', () => {
        menu.classList.remove('opacity-0', 'pointer-events-none');
        menu.classList.add('opacity-100', 'pointer-events-auto');
    });
}

if (menuClose && menu) {
    menuClose.addEventListener('click', () => {
        menu.classList.add('opacity-0', 'pointer-events-none');
        menu.classList.remove('opacity-100', 'pointer-events-auto');
    });
}

// Header Scroll Effect
const header = document.querySelector('header');
if (header) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('bg-white/90', 'backdrop-blur-md', 'py-4', 'shadow-sm');
            header.classList.remove('py-6');
            if (header.classList.contains('absolute')) {
                header.classList.remove('text-white');
                header.querySelectorAll('nav a, button, #header-cart').forEach(el => {
                    el.classList.add('text-lux-black');
                    el.classList.remove('text-white');
                });
            }
        } else {
            header.classList.remove('bg-white/90', 'backdrop-blur-md', 'py-4', 'shadow-sm');
            header.classList.add('py-6');
            if (header.classList.contains('absolute')) {
                header.querySelectorAll('nav a, button, #header-cart').forEach(el => {
                    el.classList.remove('text-lux-black');
                    el.classList.add('text-white');
                });
            }
        }
    });
}
