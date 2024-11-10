@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="banner bg-gradient-to-r from-purple-700 via-blue-800 to-black text-white py-20 px-8 text-center mt-4 w-full">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-4">RetroStore 👾</h1>
        <p class="text-lg md:text-2xl mb-6">Relive the nostalgia of classic video games</p>
        <p class="text-sm md:text-lg mb-8">Find your favorite games from Nintendo, Sega, PlayStation, and more.</p>
        <a href="{{ route('categories', 'sega') }}"
            class="bg-yellow-400 text-black font-semibold py-3 px-8 rounded-lg shadow-md hover:bg-yellow-300 transition">
            Explore SEGA week's TOP
        </a>
    </div>

    <div class="text-red-200 sm:w-[800px] min-h-[600px] p-2">
        <section>
            @foreach ($categories as $category)
                <a href="{{ route('categories', $category->slug) }}">
                    <div
                        class="shadow-xl p-4 flex justify-between items-center gap-4 border border-red-300/25
                                rounded-xl hover:scale-105 duration-300 hover:bg-slate-900 min-h-[150px]
                                my-8 cursor-pointer"
                    >
                        <div>
                            <img src="{{ $category->imageUrl }}" width="100" alt="">
                        </div>
                        <div class="flex-1">
                            <p>{{ $category->name }}</p>
                            <p class="text-xs">{{ $category->description }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </section>
    </div>

@endsection
