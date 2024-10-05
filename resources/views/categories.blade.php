@extends('layouts.app')

@section('title', 'My Store')

@section('content')

    <nav class="flex justify-between items-center w-[400px]">
        <ul class="flex gap-4 ">
            <li><a class="text-blue-300 hover:text-blue-500" href="/">Home</a></li>
            <li><a class="text-blue-300 hover:text-blue-500" href="/categories">Category 1</a></li>
            <li><a class="text-blue-300 hover:text-blue-500" href="/categories">Category 2</a></li>
        </ul>
        <ul>
            <li class="text-white hover:scale-105 cursor-pointer hover:bg-red-800 rounded-xl">
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
    <div class="text-red-200 mt-4 border border-red-400 min-w-[400px] min-h-[400px] p-2">
        <p>Category</p>
        <section class="flex flex-col items-center justify-center space-y-4 my-8">
            <a href="/products/1">
                <div class="flex justify-between items-center gap-4">
                    <img src="https://via.placeholder.com/50x50/ff0000/ffffff
                    " alt="">
                    <p>Product 1</p>
                </div>
            </a>

            <a href="/products/2">
                <div class="flex justify-between items-center gap-4">
                    <img src="https://via.placeholder.com/50x50/ff0000/ffffff
                    " alt="">
                    <p>Product 2</p>
                </div>
            </a>
            <a href="/products/3">
                <div class="flex justify-between items-center gap-4">
                    <img src="https://via.placeholder.com/50x50/ff0000/ffffff
                    " alt="">
                    <p>Product 3</p>
                </div>
            </a>
        </section>
    </div>
@endsection
