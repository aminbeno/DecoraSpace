<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-3xl text-lux-black leading-tight">
            {{ __('Account Settings') }}
        </h2>
    </x-slot>

    <div class="bg-lux-grey-light min-h-screen py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="bg-white shadow-sm p-8">
                    @livewire('profile.update-profile-information-form')
                </div>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="bg-white shadow-sm p-8">
                    @livewire('profile.update-password-form')
                </div>
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="bg-white shadow-sm p-8">
                    @livewire('profile.two-factor-authentication-form')
                </div>
            @endif

            <div class="bg-white shadow-sm p-8">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <div class="bg-white shadow-sm p-8 border-t-4 border-red-500">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
