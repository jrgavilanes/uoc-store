<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RetroStore - @yield('title')</title>
    @vite('resources/css/app.css')
    
    @livewireStyles
</head>

<body class="bg-slate-800">
    <div class="flex w-full bg-orange-400 text-blue-900 p-0 justify-center">
        <p>Demo website for "Comerç electrònic" course at Universitat Oberta de Catalunya (UOC). Author: Juan Ramón
            Gavilanes.
        </p>
    </div>
    <div class="min-h-screen flex flex-col justify-start items-center mt-4 w-full">

        <x-nav :categories="$categories" />

        @yield('content')

        <x-footer />

    </div>

    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
