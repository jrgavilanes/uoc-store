@extends('layouts.app')

@section('title', 'Cagegories')

@section('content')

    <div class="text-red-200 mt-4 sm:w-[800px] min-h-[600px] p-2">
        <p>{{ $category->name }}</p>
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-8 mb-16">
            @if ($products->isEmpty())
                <p class="col-span-3 text-center text-gray-400 text-lg mt-24">No products found. <a
                        href="{{ url()->previous() }}" class="underline text-blue-500 hover:text-blue-300">Go back</a></p>
            @else
                @foreach ($products as $product)
                    <a href="{{ route('products', $product->slug) }}">
                        <div
                            class="shadow-xl p-4 flex justify-between items-center gap-4 border border-red-300/25 rounded-xl hover:scale-105 duration-300 hover:bg-slate-900 min-h-[150px]">
                            <div><img src="{{ $product->imageUrl }}" width="100" alt=""></div>
                            <div>
                                <p>{{ $product->name }}</p>
                                <p class="text-xs">{{ $product->description }}</p>
                                <p>{{ $product->price }} €</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </section>
    </div>
@endsection
