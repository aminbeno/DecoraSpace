<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-10 text-center">
            <h1 class="text-3xl font-serif text-lux-black mb-2">{{ __('Welcome Back') }}</h1>
            <p class="text-sm text-lux-grey-dark">{{ __('Enter your credentials to access your account.') }}</p>
        </div>

        <x-validation-errors class="mb-6" />

        @if (session('status'))
            <div class="mb-6 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-2 w-full border-0 border-b border-lux-grey-medium px-0 focus:border-lux-gold focus:ring-0 transition-all" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-2 w-full border-0 border-b border-lux-grey-medium px-0 focus:border-lux-gold focus:ring-0 transition-all" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" class="rounded-none border-lux-grey-medium text-lux-gold focus:ring-lux-gold" />
                    <span class="ml-2 text-[10px] uppercase tracking-widest text-lux-grey-dark font-bold">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-[10px] uppercase tracking-widest text-lux-grey-dark font-bold hover:text-lux-gold transition-colors" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <div class="pt-4">
                <x-button class="w-full justify-center py-5">
                    {{ __('Log in') }}
                </x-button>
            </div>
            
            <div class="text-center pt-4">
                <p class="text-[10px] uppercase tracking-widest text-lux-grey-dark font-bold">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="text-lux-black hover:text-lux-gold transition-colors ml-1">{{ __('Register') }}</a>
                </p>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
