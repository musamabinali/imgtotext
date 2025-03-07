<x-app-layout>
    <x-slot name="meta">
        <title>PDF To Text</title>
        <meta name="description" content="">
        <meta name="Publisher" content="www.myconvertertool.com">
        <meta property="og:title" content="">
        <meta property="og:type" content="Landing page">
        <meta name="twitter:title" content="">

        <meta property="og:image" content="https://www.myconvertertool.com/images/logo.png">
        <meta property="og:site_name" content="www.myconvertertool.com">
        <meta property="og:description" content="">
        <meta name="twitter:description" content="">
        <meta name="twitter:image" content="https://www.myconvertertool.com/images/logo.png">
    </x-slot>
    <x-slot name="alternate">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if(trim($localeCode) == 'en')
                <link rel="alternate" hreflang="x-default" href="https://www.myconvertertool.com/pdf-to-text" />
                <link rel="alternate" hreflang="{{ $localeCode }}" href="https://www.myconvertertool.com/pdf-to-text" />
            @else
                <link rel="alternate" hreflang="{{$localeCode }}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated($localeCode,'routes.png-jpg-convert')}}" />
            @endif
        @endforeach
    </x-slot>
    <div class="container mx-auto pt-5 max-w-[1232px]">
        <h1 class="text-center font-semibold text-[35px]">Free PDF to TEXT Converter</h1>
        <div class="w-full justify-center  items-center gap-4">
            <pdf-to-text-component></pdf-to-text-component>
        </div>


    </div>

</x-app-layout>
