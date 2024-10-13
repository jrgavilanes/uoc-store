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
    <div class="min-h-screen flex flex-col justify-start items-center mt-4 w-full">

        <nav class="flex flex-col sm:flex-row justify-between items-center sm:w-[800px]">
            <ul class="flex flex-col sm:flex-row gap-4 w-full">
                <li>
                    <a class="text-blue-300 hover:text-blue-500" href="{{ route('home') }}">Home</a>
                </li>
                @foreach ($categories as $it)
                    <li>
                        <a class="text-blue-300 hover:text-blue-500" href="/categories/{{ $it->slug }}">
                            {{ $it->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul>
                <li class="mt-8 sm:mt-0 text-white hover:scale-105 cursor-pointer hover:bg-red-800 rounded-xl">
                    <a href="/cart">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>

        @yield('content')

        {{-- footer --}}
        <div class="h-[1px] bg-white/5 sm:w-[800px]"></div>
        <p class="text-white text-xs mt-2">
            <a href="{{ route('dashboard') }}">- admin -</a>
        </p>

    </div>





    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
