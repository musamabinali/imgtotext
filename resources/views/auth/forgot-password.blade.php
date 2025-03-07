<x-app-layout>
    <x-slot name="meta">
        <title>Login</title>
    </x-slot>
    <x-slot name="alternate">
        <link rel="alternate" hreflang="x-default" href="{{ Request::url()  }}" />
    </x-slot>

    <section class=" flex flex-wrap justify-center items-center min-h-screen bg-gray-300">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="mb-4 text-2xl tracking-tight font-bold text-center text-gray-900 dark:text-white">{{ __('Reset Password') }}</h1>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="w-full py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-pink-300">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
            </div>
        </div>
    </section>
</x-app-layout>
