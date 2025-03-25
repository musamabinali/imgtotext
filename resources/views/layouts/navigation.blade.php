<nav class="hidden lg:flex items-center justify-between bg-gray-100 px-5 py-3">
    <a href="/" class="content-center justify-center flex">
        <x-application-logo class="block h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
    </a>
    <ul class="flex space-x-4 list-none p-0 m-0 [&>li]:m-auto">
        <li>
            <a class="text-black no-underline px-3 py-2 hover:text-blue-600" href="/">Home</a>
        </li>
        <li class="dropdown relative group">
            <a class="text-black no-underline px-3 py-2 hover:text-blue-600 flex items-center" href="#">
                Converters <i class="fas fa-caret-down ml-1"></i>
            </a>
            <ul class="dropdown-menu hidden absolute top-full left-0 bg-white shadow-lg list-none p-2 min-w-[200px] group-hover:block">
                <li><a class="text-black no-underline block px-3 py-2 hover:bg-gray-100" href="/image-to-text">image to text</a></li>
                <li><a class="text-black no-underline block px-3 py-2 hover:bg-gray-100" href="/image-text-translator">image text translator</a></li>
                <li><a class="text-black no-underline block px-3 py-2 hover:bg-gray-100" href="/pdf-to-text">pdf to text</a></li>
                <li><a class="text-black no-underline block px-3 py-2 hover:bg-gray-100" href="/pdf-to-word">pdf to word</a></li>
                <li><a class="text-black no-underline block px-3 py-2 hover:bg-gray-100" href="/jpg-to-word">jpg to word</a></li>
            </ul>
        </li>
        <li>
            <a class="text-black no-underline px-3 py-2 hover:text-blue-600" href="{{route('blog')}}">About</a>
        </li>
        <li>
            <a class="text-black no-underline px-3 py-2 hover:text-blue-600" href="{{route('contact')}}">Contact</a>
        </li>
    </ul>
</nav>

<!-- Mobile Navbar -->
<nav class="lg:hidden bg-gray-100">
    <div class="container-fluid flex justify-between items-center px-4 py-2">
        <a href="/" class="content-center justify-center flex">
            <x-application-logo class="block h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </a>
        <button class="navbar-toggler p-2" type="button" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>

<!-- Mobile Sidebar -->
<div class="overlay hidden fixed inset-0 bg-black bg-opacity-50 z-[999]" id="overlay"></div>

<div class="sidebar fixed top-0 left-[-250px] w-[250px] h-full bg-gray-100 transition-all duration-300 ease-in-out pt-16 pl-5 shadow-lg z-[1000]" id="sidebar">
    <span class="close-btn absolute top-3 right-4 text-2xl cursor-pointer" id="closeSidebar">&times;</span>
    <ul class="navbar-nav list-none p-0">
        <li class="py-2">
            <a class="text-black no-underline hover:text-blue-600" href="#">Home</a>
        </li>
        <li class="mobile-dropdown py-2">
            <a class="text-black no-underline hover:text-blue-600 flex items-center" href="#" id="servicesDropdownMobile">
                Converters <i class="fas fa-caret-down ml-1"></i>
            </a>
            <ul class="dropdown-menu hidden list-none pl-4 mt-1 group-hover:block" id="mobileDropdownMenu">
                <li class="py-1"><a class="text-black no-underline hover:text-blue-600" href="/image-to-text">image to text</a></li>
                <li class="py-1"><a class="text-black no-underline hover:text-blue-600" href="/image-text-translator">image text translator</a></li>
                <li class="py-1"><a class="text-black no-underline hover:text-blue-600" href="/pdf-to-text">pdf to text</a></li>
                <li class="py-1"><a class="text-black no-underline hover:text-blue-600" href="/pdf-to-word">pdf to word</a></li>
                <li class="py-1"><a class="text-black no-underline hover:text-blue-600" href="/jpg-to-word">jpg to word</a></li>
            </ul>
        </li>
        <li class="py-2">
            <a class="text-black no-underline hover:text-blue-600" href="{{route('blog')}}">About</a>
        </li>
        <li class="py-2">
            <a class="text-black no-underline hover:text-blue-600" href="{{route('contact')}}">Contact</a>
        </li>
    </ul>
</div>