<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-10 text-center">
            <h1 class="text-3xl font-serif text-lux-black mb-2">{{ __('Create Account') }}</h1>
            <p class="text-sm text-lux-grey-dark">{{ __('Join our premium community today.') }}</p>
        </div>

        <x-validation-errors class="mb-6" />

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-2 w-full border-0 border-b border-lux-grey-medium px-0 focus:border-lux-gold focus:ring-0 transition-all" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-2 w-full border-0 border-b border-lux-grey-medium px-0 focus:border-lux-gold focus:ring-0 transition-all" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-2 w-full border-0 border-b border-lux-grey-medium px-0 focus:border-lux-gold focus:ring-0 transition-all" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-2 w-full border-0 border-b border-lux-grey-medium px-0 focus:border-lux-gold focus:ring-0 transition-all" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required class="rounded-none border-lux-grey-medium text-lux-gold focus:ring-lux-gold" />

                            <div class="ml-2 text-[10px] uppercase tracking-widest text-lux-grey-dark font-bold">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-lux-black hover:text-lux-gold transition-colors underline">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-lux-black hover:text-lux-gold transition-colors underline">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="pt-4">
                <x-button class="w-full justify-center py-5">
                    {{ __('Register') }}
                </x-button>
            </div>

            <div class="text-center pt-4">
                <p class="text-[10px] uppercase tracking-widest text-lux-grey-dark font-bold">
                    {{ __('Already registered?') }}
                    <a href="{{ route('login') }}" class="text-lux-black hover:text-lux-gold transition-colors ml-1">{{ __('Log in') }}</a>
                </p>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
