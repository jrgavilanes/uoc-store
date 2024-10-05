@extends('layouts.app')

@section('title', 'My Store')

@section('content')

    <nav class="flex justify-between items-center w-[400px]">
        <ul class="flex gap-4 ">
            <li><a class="text-blue-300 hover:text-blue-500" href="/">Home</a></li>
            <li><a class="text-blue-300 hover:text-blue-500" href="/categories">Category 1</a></li>
            <li><a class="text-blue-300 hover:text-blue-500" href="/categories">Category 2</a></li>
        </ul>
    </nav>
    <div class="text-red-200 mt-4 border border-red-400 w-[400px] min-h-[400px] p-2">
        <p>Cart</p>
        <section class="flex flex-col items-center justify-center space-y-4 my-8">

            <div class="flex justify-between items-center gap-4 w-full">
                <img src="https://via.placeholder.com/50x50/ff0000/ffffff
                    " alt="">
                <p class="text-xs flex-1">Product 1</p>
                <input class="w-[50px] text-slate-800 ps-2" type="number" value="1" />
                <button class="bg-blue-500 hover:bg-blue-700 duration-300 text-white px-4 py-2 rounded">Remove</button>
            </div>

            <div class="flex justify-between items-center gap-4 w-full">
                <img src="https://via.placeholder.com/50x50/ff0000/ffffff
                    " alt="">
                <p class="text-xs flex-1">Lorem, ipsum.</p>
                <input class="w-[50px] text-slate-800 ps-2" type="number" value="1" />
                <button class="bg-blue-500 hover:bg-blue-700 duration-300 text-white px-4 py-2 rounded">Remove</button>
            </div>

            <div class="flex justify-between items-center gap-4 w-full">
                <img src="https://via.placeholder.com/50x50/ff0000/ffffff
                    " alt="">
                <p class="text-xs flex-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, totam.</p>
                <input class="w-[50px] text-slate-800 ps-2" type="number" value="1" />
                <button class="bg-blue-500 hover:bg-blue-700 duration-300 text-white px-4 py-2 rounded">Remove</button>
            </div>

            <div class="flex justify-between items-center gap-4 w-full">
                <img src="https://via.placeholder.com/50x50/ff0000/ffffff
                    " alt="">
                <p class="text-xs flex-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, totam.</p>
                <input class="w-[50px] text-slate-800 ps-2" type="number" value="1" />
                <button class="bg-blue-500 hover:bg-blue-700 duration-300 text-white px-4 py-2 rounded">Remove</button>
            </div>

            <div class="flex justify-between items-center gap-4 w-full">
                <img src="https://via.placeholder.com/50x50/ff0000/ffffff
                    " alt="">
                <p class="text-xs flex-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, totam.</p>
                <input class="w-[50px] text-slate-800 ps-2" type="number" value="1" />
                <button class="bg-blue-500 hover:bg-blue-700 duration-300 text-white px-4 py-2 rounded">Remove</button>
            </div>
        </section>
        <div class="flex flex-col items-center justify-center bg-slate-900 p-4 rounded-lg cursor-pointer hover:bg-slate-900/75">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
            </svg>
            <p>
                checkout
            </p>
        </div>
    </div>

@endsection
