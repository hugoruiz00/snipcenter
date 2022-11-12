<x-app-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded text-[#1C6FAC] shadow-sm" name="remember">
                    <span class="ml-2 text-sm text-[#ACACAC]">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4 flex justify-center">
                <x-primary-button class="mt-3 sm:w-1/2 justify-center">
                    {{ __('Log in') }}
                </x-primary-button>                
            </div>
            @if (Route::has('password.request'))
                <div class="mt-2 flex justify-center">
                    <a class="underline text-sm text-[#ACACAC] hover:text-[#1C6FAC]" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
            @endif
        </form>
    </x-auth-card>
</x-app-layout>
