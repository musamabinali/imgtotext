<x-app-layout>
    <x-slot name="meta">
        <title>Login</title>
    </x-slot>
    <x-slot name="alternate">
        <link rel="alternate" hreflang="x-default" href="{{ Request::url()  }}" />
    </x-slot>
    <section class="flex justify-center items-center min-h-screen	">
        <div class="bg-white mx-auto w-auto max-w-screen-sm py-8 px-4 mx-auto rounded-lg">

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button class="w-full py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline font-bold text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none">
                {{ __('Log Out') }}
            </button>
        </form>
            </div>
        </div>
    </section>
</x-app-layout>
