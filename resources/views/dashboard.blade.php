<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-3xl text-lux-black leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-10">
                <div class="max-w-xl">
                    <span class="text-lux-gold uppercase tracking-[0.3em] text-xs font-bold mb-4 block">Welcome back</span>
                    <h3 class="text-4xl font-serif text-lux-black mb-6">Hello, {{ Auth::user()->name }}</h3>
                    <p class="text-lux-grey-dark leading-relaxed mb-10">
                        From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="{{ route('dashboard.my-transaction.index') }}" class="group border border-lux-grey-medium p-8 hover:border-lux-gold transition-all duration-300">
                            <h4 class="text-sm font-bold uppercase tracking-widest text-lux-black group-hover:text-lux-gold mb-2">My Orders</h4>
                            <p class="text-xs text-lux-grey-dark">Check the status of your purchases.</p>
                        </a>
                        <a href="{{ route('profile.show') }}" class="group border border-lux-grey-medium p-8 hover:border-lux-gold transition-all duration-300">
                            <h4 class="text-sm font-bold uppercase tracking-widest text-lux-black group-hover:text-lux-gold mb-2">Account Settings</h4>
                            <p class="text-xs text-lux-grey-dark">Update your profile and security.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
