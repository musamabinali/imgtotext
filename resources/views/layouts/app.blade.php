<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($meta))
        {!! $meta !!}
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    @if (isset($alternate))
        {{ $alternate }}
    @endif
    @if (isset($header))
        {{ $header }}
    @endif
    <!-- Scripts -->
    @vite([
    'resources/css/app.css',
    'resources/js/app.js'])
</head>
{{-- font-sans antialiased --}}

<body class="font-sans antialiased">
<div id="app" class="min-h-screen">
    @include('layouts.navigation')
    <!-- Page Heading -->
    @if(isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
<footer class="mt-3">
    <div class="bg-blue-300 w-full flex flex-wrap">
        <div class="container p-4 mx-auto">
            <div class="md:w-full flex flex-row flex-wrap justify-between md:mt-6 2xl:mt-7.5 2xl:gap-7.5">
                <div class="md:w-1/2">
                    <div class="col-span-12 md:col-span-6 lg:col-span-5">
                        <div class="flex">
                            <a class="navbar-brand" href="/"><img src="{{ asset('images/logo_icon.svg') }}" width="50px" height="50px" alt="logo" class="w-[50px] h-[50px]" /></a>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 flex flex-row flex-wrap justify-between">
                <div class="col-span-12 md:col-span-6 lg:md:col-span-3">
                    <span class="pb-2 text-white font-medium">
                        Online Tools
                    </span>
                    <ul class="text-small">
                        <li class="py-1 custom-footer-font">
                            <a class=" hover-custom text-decoration-none text-white text-[14px] font-normal hover:text-black"
                               href="#">PDF To Text</a>
                        </li>
                        <li class="py-1 custom-footer-font">
                            <a class=" hover-custom text-decoration-none text-white text-[14px] font-normal hover:text-black"
                               href="#">PDF To Word</a>
                        </li>
                        <li class="py-1 custom-footer-font">
                            <a class=" hover-custom text-decoration-none text-white text-[14px] font-normal hover:text-black"
                               href="#">JPF To Word</a>
                        </li>
                    </ul>
                </div>
                <div class="col-span-12 md:col-span-6 lg:md:col-span-2">
                    <span class="pb-4 font-medium text-white">
                        Quick Links
                    </span>
                    <ul class=" ml-lg-5 list-unstyled text-small">
                        <li class="py-1 custom-footer-font">
                            <a class=" text-decoration-none text-white hover-custom text-[14px] font-normal hover:text-black"
                               href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="py-1 custom-footer-font">
                            <a class="text-decoration-none text-white  hover-custom text-[14px] font-normal hover:text-black"
                               href="{{ route('contact') }}">Contact us</a>
                        </li>
                        <li class="py-1 custom-footer-font">
                            <a class="text-decoration-none text-white  hover-custom text-[14px] font-normal hover:text-black"
                               href="{{ route('privacy') }}">Privacy Policy</a>
                        </li>
                        <li class="py-1 custom-footer-font">
                            <a class="text-decoration-none text-white  hover-custom text-[14px] font-normal hover:text-black"
                               href="#">Term and Condition</a>
                        </li>
                    </ul>
                </div>
                <div class="col-span-12 md:col-span-6 lg:md:col-span-2">
                    <span class="pb-4 font-medium text-white">
                        Select Language
                    </span>
                    <ul class="text-small">
                        <li class="py-1 custom-footer-font">
                            <label for="countries" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block md:w-2/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>English</option>
                            </select>
                        </li>

                    </ul>
                    <div class="my-3">
                        <ul class="flex flex-wrap">
                            <li class="pr-3">
                                <a href="https://www.facebook.com/#" aria-label="facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                         fill="currentColor" class="bi bi-facebook text-white hover:fill-orange" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                    </svg>
                                </a>
                            </li>
                            <li class=" footer-icons-list">
                                <a href="https://www.linkedin.com/in/#" aria-label="linkedin">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                         fill="currentColor" class="text-white bi bi-linkedin hover:fill-orange" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                    </svg>
                                </a>
                            </li>
                            <li class="px-3 footer-icons-list">
                                <a href="https://mobile.twitter.com/#" aria-label="twitter">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                         fill="currentColor" class="text-white bi bi-twitter hover:fill-orange" viewBox="0 0 16 16">
                                        <path
                                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                    </svg>
                                </a>
                            </li>
                            <li class=" footer-icons-list">
                                <a href="https://www.pinterest.com/wowpdfnet/" aria-label="printerest">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                         fill="currentColor" class="text-white bi bi-pinterest hover:fill-orange" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-items-center pt-4">
            <div class="text-white w-full text-center border-solid border-t-2  justify-items-center justify-center mt-[-10px] py-4">
                © Copyright {{date('Y')}} myconvertertool.com All rights reserved.
            </div>
        </div>
    </div>
</footer>
</body>

</html>
