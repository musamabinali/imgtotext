<x-app-layout>
    <x-slot name="meta">
        <title>Password Reset</title>
    </x-slot>
    <x-slot name="alternate">
        <link rel="alternate" hreflang="x-default" href="{{ Request::url()  }}" />
    </x-slot>
    <section class="flex flex-wrap justify-center items-center min-h-screen	">
        <div class="bg-white mx-auto w-full sm:max-w-md mt-6 px-4 py-8 bg-white  overflow-hidden sm:rounded-lg">
            <div class="mb-3">
                <h1 class="mb-1 text-3xl tracking-tight font-semibold text-left text-gray-900 dark:text-white">Welcome to</h1>
                <span class="text-3xl tracking-tight font-bold text-left text-pink-700">JPC Converter</span>
            </div>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="my-1">
            <div class="cf-turnstile" data-sitekey="0x4AAAAAAAaT7cMWwC6Rj-TT"></div>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
        </div>
    </section>

</x-app-layout>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
