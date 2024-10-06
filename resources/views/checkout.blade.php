@extends('layouts.app')

@section('title', 'My Store')

@section('content')

    <nav class="flex justify-between items-center w-[800px]">
        <ul class="flex gap-4 ">
            <li><a class="text-blue-300 hover:text-blue-500" href="/">Home</a></li>
            <li><a class="text-blue-300 hover:text-blue-500" href="/categories">Category 1</a></li>
            <li><a class="text-blue-300 hover:text-blue-500" href="/categories">Category 2</a></li>
        </ul>
    </nav>
    <div class="text-red-200 mt-4 border border-red-400 w-[800px] min-h-[400px] p-2">
        <p>Checkout</p>
        <section class="flex items-start justify-center gap-4 mt-4">

            <div class="flex flex-col gap-4 w-full border border-red-400 p-4">
                <p>Guest users</p>
                <input class="px-2 h-9 w-full" type="email" name="email" id="email" placeholder="email">
                <textarea class="px-2" name="address" id="address" rows="3" placeholder="dirección postal"></textarea>
                <a href="{{ route('order-summary') }}">
                    <button class="text-white bg-slate-300/50 px-2 py-2 w-full rounded-xl hover:bg-slate-500">
                        Checkout
                    </button>
                </a>

            </div>

            <div class="flex flex-col gap-4 w-full border border-red-400 p-4">
                <p>Registered users</p>
                <input class="px-2 h-9 w-full" name="name" id="name" placeholder="name">
                <input class="px-2 h-9 w-full" type="password" name="password" id="password" placeholder="password">
                <input class="px-2 h-9 w-full" type="email" name="email" id="email" placeholder="email">
                <textarea class="px-2" name="address" id="address" rows="3" placeholder="dirección postal"></textarea>
                <a href="{{ route('order-summary') }}">
                    <button class="text-white bg-slate-300/50 px-2 py-2 w-full rounded-xl hover:bg-slate-500">
                        Checkout
                    </button>
                </a>
            </div>
        </section>
    </div>

@endsection
