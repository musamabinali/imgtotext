<x-app-layout>

    <x-slot name="meta">
        <title>Login</title>
    </x-slot>
    <x-slot name="alternate">
        <link rel="alternate" hreflang="x-default" href="{{ Request::url()  }}" />
    </x-slot>
    <div class="w-full flex">
        <section class="w-1/2 flex flex-wrap justify-center items-center min-h-screen	">
            <div class="bg-white mx-auto w-auto max-w-screen-sm py-8 px-4 mx-auto ">
                <h1 class="mb-4 text-4xl tracking-tight font-bold text-center text-gray-900 dark:text-white">{{ __('Register') }}</h1>
                <p class="mb-8 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Register to be more secure and personalized experience </p>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

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
    {{--            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">--}}
    {{--                {{ __('Already registered?') }}--}}
    {{--            </a>--}}

                <button class="w-full py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none">
                    {{ __('Register') }}
                </button>
            </div>
            <div>
                <div class="my-2 text-center">OR</div>
                <a href="#" class="w-full flex flex-wrap justify-center items-center cursor-pointer gap-2 border border-gray-300 py-3 px-5 text-sm font-medium text-center text-black rounded-lg bg-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <svg viewBox="-3 0 262 262" class="w-4 h-4"  fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027" fill="#4285F4"></path><path d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1" fill="#34A853"></path><path d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782" fill="#FBBC05"></path><path d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251" fill="#EB4335"></path></g></svg>
                    {{ __('Register with Google ') }}
                </a>
            </div>
        </form>
            </div>
        </section>

        <section class="w-1/2 bg-red-500 flex flex-wrap justify-center items-center min-h-scree">
            <img src="{{ asset('images/Group.png') }}" alt="">
        </section>
    </div>
</x-app-layout>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
