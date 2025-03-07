<x-app-layout>

    <x-slot name="meta">
        <title>Blogs</title>
    </x-slot>
    <x-slot name="alternate">
        <link rel="alternate" hreflang="x-default" href="{{ Request::url()}}"/>
    </x-slot>
    <section class="bg-white dark:bg-gray-900">
        <div class="mx-auto max-w-6xl px-2">
            <h1 class="text-center mx-auto py-8  text-3xl font-bold capitalize text-red-500">
                Our Latest  Blog
            </h1>
        </div>
    </section>
    <section class="py-24 ">
        <div class="px-4">
            <div class="md:w-full flex flex-wrap justify-center items-center">
                <div class="w-[400px] mx-2 my-2 border border-gray-300 rounded-2xl">
                    <div class="flex items-center">
                        <img src="https://pagedone.io/asset/uploads/1696244317.png" alt="blogs tailwind section" class="rounded-t-2xl object-cover md:w-full">
                    </div>
                    <div class="p-4 lg:p-6 transition-all duration-300 rounded-b-2xl group-hover:bg-gray-50">
                        <span class="text-indigo-600 font-medium mb-3 block">Jan 01, 2023</span>
                        <h4 class="text-xl text-gray-900 font-medium leading-8 mb-5">Clever ways to invest in product to organize your portfolio</h4>
                        <p class="text-gray-500 leading-6 mb-10">Discover smart investment strategies to streamline and organize your portfolio..</p>
                        <a href="javascript:;" class="cursor-pointer text-lg text-indigo-600 font-semibold">Read more..</a>
                    </div>
                </div>
                <div class="w-[400px] mx-2 my-2 border border-gray-300 rounded-2xl">
                    <div class="flex items-center">
                        <img src="https://pagedone.io/asset/uploads/1696244340.png" alt="blogs tailwind section" class="rounded-t-2xl object-cover md:w-full">
                    </div>
                    <div class="p-4 lg:p-6 transition-all duration-300 rounded-b-2xl group-hover:bg-gray-50">
                        <span class="text-indigo-600 font-medium mb-3 block">Feb 01, 2023</span>
                        <h4 class="text-xl text-gray-900 font-medium leading-8 mb-5">How to grow your profit through systematic investment with us</h4>
                        <p class="text-gray-500 leading-6 mb-10">Unlock the power of systematic investment with us and watch your profits soar. Our..</p>
                        <a href="javascript:;" class="cursor-pointer text-lg text-indigo-600 font-semibold">Read more..</a>
                    </div>
                </div>
                <div class="w-[400px] mx-2 my-2 border border-gray-300 rounded-2xl">
                    <div class="flex items-center">
                        <img src="https://pagedone.io/asset/uploads/1696244356.png" alt="blogs tailwind section" class="rounded-t-2xl object-cover md:w-full">
                    </div>
                    <div class="p-4 lg:p-6 transition-all duration-300 rounded-b-2xl group-hover:bg-gray-50">
                        <span class="text-indigo-600 font-medium mb-3 block">Mar 01, 20233</span>
                        <h4 class="text-xl text-gray-900 font-medium leading-8 mb-5">How to analyze every holdings of your portfolio</h4>
                        <p class="text-gray-500 leading-6 mb-10">Our comprehensive guide will equip you with the tools and insights needed to..</p>
                        <a href="javascript:;" class="cursor-pointer text-lg text-indigo-600 font-semibold">Read more..</a>
                    </div>
                </div>
            </div>
        </div>
    </section>




</x-app-layout>

