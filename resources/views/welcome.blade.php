<x-app-layout>
    <x-slot name="meta">
        <title>{{__('_.title')}}</title>
        <meta name="description" content="{{__('_.title_desc')}}">
        <meta name="Publisher" content="www.myconvertertool.com">
        <meta property="og:title" content="{{__('_.title')  }}">
        <meta property="og:type" content="Landing page">
        <meta name="twitter:title" content="{{__('_.title')  }}">

        <meta property="og:image" content="https://www.myconvertertool.com/images/logo.png">
        <meta property="og:site_name" content="www.myconvertertool.com">
        <meta property="og:description" content="{{__('_.title_desc')  }}">
        <meta name="twitter:description" content="{{__('_.title_desc')  }}">
        <meta name="twitter:image" content="https://www.myconvertertool.com/images/logo.png">
    </x-slot>
    <x-slot name="alternate">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if(trim($localeCode) == 'en')
                <link rel="alternate" hreflang="x-default" href="https://www.myconvertertool.com/" />
                <link rel="alternate" hreflang="{{ $localeCode }}" href="https://www.myconvertertool.com/" />
            @else
                <link rel="alternate" hreflang="{{$localeCode }}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated($localeCode,'routes.welcome')}}" />
            @endif
        @endforeach
    </x-slot>

    <div class="w-full bg-blue-100 flex flex-wrap rounded-b-lg min-h-[300px] px-5">
        <div class="container flex flex-wrap mx-auto justify-center items-center">
            <h1 class="font-semibold text-black text-[35px]">Convert All Tool's Here</h1>
        </div>
    </div>

    <div class="flex flex-wrap">
        <div class="container lg:grid-cols-4 md:grid-cols-1 mx-auto justify-center flex flex-wrap mt-8">

            <a href="{{route('pdf-to-text')}}">
                <div class="max-w-2xl border-solid border-2 border-[#f5eff3] rounded-md w-[180px] h-[180px] mx-1 my-1 bg-[#f5eff3] flex justify-center flex-col items-center [&_a]:flex [&_a]:justify-center [&_a]:flex-col [&_a]:items-center group [&_h3]:font-semibold">
                    <div class=" mt-[5px]">
                            <h3 class="text-xl leading-[28px] p-3">PDF To Text</h3>
                    </div>
                </div>
            </a>
            <a href="{{route('pdf-to-word')}}">
                <div class="max-w-2xl border-solid border-2 border-[#f8f4dd] rounded-md w-[180px] h-[180px] mx-1 my-1 bg-[#f8f4dd] flex justify-center flex-col items-center [&_a]:flex [&_a]:justify-center [&_a]:flex-col [&_a]:items-center group [&_h3]:font-semibold">
                    <div class=" mt-[5px]">
                        <h3 class="text-xl leading-[28px] p-3">PDF To Word</h3>
                    </div>
                </div>
            </a>
            <a href="{{route('jpg-to-word')}}">
                <div class="max-w-2xl border-solid border-2 border-[#fdf3f1] rounded-md w-[180px] h-[180px] mx-1 my-1 flex justify-center flex-col items-center bg-[#fdf3f1] [&_a]:flex [&_a]:justify-center [&_a]:flex-col [&_a]:items-center group [&_h3]:font-semibold">
                    <div class=" mt-[5px]">
                        <h3 class="text-xl leading-[28px] p-3">JPG to Word</h3>
                    </div>
                </div>
            </a>
            <a href="{{route('image-to-text')}}">
                <div class="max-w-2xl border-solid border-2 border-[#ffedf1] rounded-md w-[180px] h-[180px] mx-1 my-1 flex justify-center flex-col items-center bg-[#ffedf1] [&_a]:flex [&_a]:justify-center [&_a]:flex-col [&_a]:items-center group [&_h3]:font-semibold">
                    <div class=" mt-[5px]">
                        <h3 class="text-xl leading-[28px] p-3">Image to text</h3>
                    </div>
                </div>
            </a>
            <a href="{{route('image-text-translator')}}">
                <div class="max-w-2xl border-solid border-2 border-[#ffdfe6] rounded-md w-[180px] h-[180px] mx-1 my-1 flex justify-center flex-col items-center bg-[#ffdfe6] [&_a]:flex [&_a]:justify-center [&_a]:flex-col [&_a]:items-center group [&_h3]:font-semibold">
                    <div class=" mt-[5px]">
                        <h3 class="text-xl leading-[28px] p-3">Image text translator</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>

</x-app-layout>

