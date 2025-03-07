<nav class="bg-gray-100">
    <div class="container mx-auto flex justify-between items-center p-4">
        <!-- Logo -->
        <div class="col-span-1 content-center justify-start hidden lg:flex flex">
            <a href="{{ route('welcome')}}" class="content-center justify-center flex">
                <x-application-logo class="block h-8 w-auto fill-current text-gray-800 dark:text-gray-200"/>
            </a>
        </div>
        <div class="col-span-2 flex lg:hidden">
            <a href="{{route('welcome')}}" class="content-center justify-center flex">
                <x-application-logo class="block h-6 w-auto fill-current text-gray-800 dark:text-gray-200"/>
            </a>
        </div>
        <div class="col-span-1 content-center justify-end flex lg:hidden ">
            @if(Route::is('welcome'))
                <div class="dropdown inline-block relative">
                    <button class="bg-transparent hover:bg-white-400 text-red-500 border-2 border-red-500 font-bold py-2 px-3 rounded inline-flex items-center transition-all duration-300" id="dropdown-button-mobile">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 mx-1 w-4 md:h-5 md:w-5" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 5h7"></path><path d="M9 3v2c0 4.418 -2.239 8 -5 8"></path><path d="M5 9c0 2.144 2.952 3.908 6.7 4"></path><path d="M12 20l4 -9l4 9"></path><path d="M19.1 18h-6.2"></path></svg>
                        <span class="">{{LaravelLocalization::getCurrentLocaleNative()}}</span>
                    </button>
                    <ul class="dropdown-menu absolute  text-left text-gray-700 pt-1 text-sm bg-white border border-gray-300 rounded shadow-lg" id="dropdown-menu-mobile" style="max-height:200px; overflow-y: auto;">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if($localeCode == 'en')
                                <li class="">
                                    <a href="https://www.myconvertertool.com/" class="block px-3 py-2 hover:bg-blue-500 hover:text-white">{{ $properties['native'] }}</a>
                                </li>
                            @else
                                <li class="">
                                    <a href="{{LaravelLocalization::getURLFromRouteNameTranslated($localeCode,'routes.welcome')}}" class="block px-3 py-2 hover:bg-blue-500 hover:text-white">{{ $properties['native'] }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <!-- Responsive Menu Button -->
        <div class="lg:hidden">
            <button id="toggleMenu" class="block text-gray-800 dark:text-gray-200 focus:outline-none">
                <svg class="w-5 lg:w-auto text-gray-900 dark:text-gray-100" id="i-menu" width="32" height="32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M4 8 L28 8 M4 16 L28 16 M4 24 L28 24"></path>
                </svg>
            </button>
        </div>
        <!-- Navigation Links -->
        <div id="navbar" class="hidden lg:flex lg:items-center lg:space-x-8">
            <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')" class="hover:text-orange-600">
                {{ __('_.home') }}
            </x-nav-link>
            <x-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                Blog
            </x-nav-link>
            <div class="dropdown-menu absolute z-10 rounded-md hidden  flex flex-wrap text-black  mt-[60px] bg-gray-50" id="nevmenu">
                <div class="p-2">
                    <h6 class="text-gray-700 font-bold text-[15px] mx-2">CONVERT TO PDF</h6>
                    <ul>
                        <li class="mx-2 p-1 hover:bg-gray-200 hover:text-orange-600 hover:rounded-md">
                            <a href="#" class="font-bold text-[15px]">jpg to pdf</a>
                        </li>
                        <li class="mx-2  p-1 hover:bg-gray-200 hover:text-orange-600 hover:rounded-md">
                            <a href="#" class="font-bold text-[15px]">WORD to PDF</a>
                        </li>
                        <li class="mx-2 p-1 hover:bg-gray-200 hover:text-orange-600 hover:rounded-md">
                            <a href="#" class="font-bold text-[15px]">POWERPOINT to PDF</a>
                        </li>
                        <li class="mx-2 p-1 hover:bg-gray-200 hover:text-orange-600 hover:rounded-md">
                            <a href="#" class="font-bold text-[15px]">EXCEL to PDF</a>
                        </li>
                        <li class="mx-2 p-1 hover:bg-gray-200 hover:text-orange-600 hover:rounded-md">
                            <a href="#" class="font-bold text-[15px]">HTML to PDF</a>
                        </li>
                    </ul>
                </div>
                <div class="w-[50%] p-3">
                    <h6 class="text-gray-700 font-bold text-[15px] mx-2">CONVERT FROM PDF</h6>
                    <ul>
                        <li class="mx-2 p-1 hover:bg-gray-200 hover:text-orange-600 hover:rounded-md">
                            <a href="#" class="font-bold text-[15px]">pdf to jpg</a>
                        </li>
                        <li class="mx-2 p-1 hover:bg-gray-200 hover:text-orange-600 hover:rounded-md">
                            <a href="#" class="font-bold text-[15px]">PDF to WORD </a>
                        </li>
                        <li class="mx-2 p-1 hover:bg-gray-200 hover:text-orange-600 hover:rounded-md">
                            <a href="#" class="font-bold text-[15px]">PDF to POWERPOINT</a>
                        </li>
                        <li class="mx-2 p-1 hover:bg-gray-200 hover:text-orange-600 hover:rounded-md">
                            <a href="#" class="font-bold text-[15px]">PDF to EXCEL</a>
                        </li>
                        <li class="mx-2 p-1 hover:bg-gray-200 hover:text-orange-600 hover:rounded-md">
                            <a href="#" class="font-bold text-[15px]">PDF to HTML</a>
                        </li>

                    </ul>
                </div>
            </div>

            <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                Contact
            </x-nav-link>
            @guest
                <a href="#">
                    <button class="font-semibold bg-blue-300 text-white p-2 rounded-md">Try For Free</button>
                </a>
            @else
                <!--                <logout-button-component></logout-button-component>-->
                <div class=" items-center gap-4 flex">
                    <div class="relative text-sm z-[99]">
                        <div class="py-1 px-1 rounded flex justify-between group peer group items-center gap-1 hover:cursor-pointer">
                            <p class="text-sm flex gap-1 relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.1" fill-rule="evenodd" clip-rule="evenodd" d="M3 12C3 4.5885 4.5885 3 12 3C19.4115 3 21 4.5885 21 12C21 16.3106 20.4627 18.6515 18.5549 19.8557L18.2395 18.878C17.9043 17.6699 17.2931 16.8681 16.262 16.3834C15.2532 15.9092 13.8644 15.75 12 15.75C10.134 15.75 8.74481 15.922 7.73554 16.4097C6.70593 16.9073 6.09582 17.7207 5.7608 18.927L5.45019 19.8589C3.53829 18.6556 3 16.3144 3 12ZM8.75 10C8.75 8.20507 10.2051 6.75 12 6.75C13.7949 6.75 15.25 8.20507 15.25 10C15.25 11.7949 13.7949 13.25 12 13.25C10.2051 13.25 8.75 11.7949 8.75 10Z" fill="#323232"/>
                                    <path d="M3 12C3 4.5885 4.5885 3 12 3C19.4115 3 21 4.5885 21 12C21 19.4115 19.4115 21 12 21C4.5885 21 3 19.4115 3 12Z" stroke="#323232" stroke-width="2"/>
                                    <path d="M15 10C15 11.6569 13.6569 13 12 13C10.3431 13 9 11.6569 9 10C9 8.34315 10.3431 7 12 7C13.6569 7 15 8.34315 15 10Z" stroke="#323232" stroke-width="2"/>
                                    <path d="M6 19C6.63819 16.6928 8.27998 16 12 16C15.72 16 17.3618 16.6425 18 18.9497" stroke="#323232" stroke-width="2" stroke-linecap="round"/>
                                </svg> Account
                            </p>
                            <svg class="transition-all shrink-0 origin-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="m4 7 4 4 4-4"></path>
                            </svg>
                        </div>
                        <div class="w-[150px] text-display translate-y-2 rounded-xl p-4 space-y-1 shadow-card3 absolute ltr:left-1/2 rtl:right-1/2 ltr:-translate-x-1/2 rtl:translate-x-1/2 bg-white peer-hover:scale-y-100 peer-hover:opacity-100 hover:scale-y-100 hover:opacity-100 opacity-100 scale-y-0 transition-all origin-top grid grid-cols-1 shadow-inner">
                            <a href="{{route('profile.edit')}}" class="hover:text-pink-600 py-1 w-full">Profile</a>
                            <div class="hover:text-pink-600 py-1 w-full"> <a class="dropdown-item" href="{{ route('logout') }}"
                                                                             onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endif

        </div>
    </div>
    <!-- Responsive Menu -->
    <div id="responsiveMenu" class="lg:hidden hidden bg-white py-2">
        <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')" class="block px-4 py-2 hover:text-orange-600">
            {{ __('_.home') }}
        </x-nav-link>
        <x-nav-link :href="route('blog')" :active="request()->routeIs('blog')" class="block px-4 py-2 hover:text-orange-600">
            Blog
        </x-nav-link>


        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="block px-4 py-2 hover:text-orange-600">
            Contact
        </x-nav-link>
    </div>

    <div class="hidden md:hidden absolute right-3 bg-white top-10 rounded-lg shadow-lg" id="myDIV" style="z-index:99;">
        <div class="flex lg:w-1/3  md:px-6">
            <nav class="navigation flex items-center justify-center flex-wrap" role="navigation">
                <div class="w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
                    <ul class="nav-list block lg:flex px-4 md:flex  justify-end">
                        <li class="border-b-default border-gray-500 py-2 pr-12 nav-item text-lg md:px-6 hover:font-bold hover:text-blue-100 {{Route::is('welcome')?'font-bold':''}}"><a href="{{route('welcome')}}">{{__('_.home')  }}</a></li>
                        <li class="border-b-default border-gray-500 py-2 pr-12 nav-item text-lg md:px-6 hover:font-bold hover:text-blue-100 {{Route::is('blog')?'font-bold':''}}"><a href="{{route('blog')}}">Blog</a></li>
                        <li class="py-2 pr-12 nav-item text-lg md:px-6 hover:font-bold hover:text-blue-100 {{Route::is('contact')?'font-bold':''}}"><a href="{{route('contact')}}">Contact</a></li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</nav>

