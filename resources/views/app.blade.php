<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.page_title', 'JPG Converter') }}</title>
    <meta name="description" content="{{ config('app.page_desc') }}" />
    <meta name="application-name" content="JPG Converter">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
{{--    <link rel="shortcut icon" href="https://www.myconvertertool.com/favicon.ico" type="image/x-icon">--}}
{{--    <link rel="icon" href="https://www.myconvertertool.com/favicon.ico" type="image/x-icon">--}}
    <link rel="canonical" href="https://www.myconvertertool.com/" />
    <link rel="alternate" hreflang="x-default" href="https://www.myconvertertool.com/" />
    <link rel="alternate" hreflang="en" href="https://www.myconvertertool.com/" />
    <link rel="manifest" href="https://www.myconvertertool.com/site.webmanifest">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    @routes
    @vite(['resources/js/app.js'])
</head>
<body class=" ">
<div id="app"></div>
</body>
</html>
