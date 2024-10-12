@extends('layouts.app-admin')

@section('title', 'Order summary')

@section('content')

    {{-- {{ dd($purchase->orderLines) }} --}}
    <nav class="flex justify-between items-center sm:w-[800px]">
        <ul></ul>
        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="text-white">
                    Logout
                </button>
            </form>
        @endauth
    </nav>

    <div class="text-red-200 mt-4 sm:w-[800px] min-h-[600px] p-2">
        <a class="text-white" href="{{ route('dashboard') }}">⬅️ Back to dashboard</a>
        <p class="text-4xl font-thin">Purchache Detail 👾</p>

        @if (!$purchase->user_id)
            <section class="flex flex-col items-center justify-center gap-4 mt-4 p-6">
                <div class="border border-blue-800 rounded-xl p-4 w-full">
                    <p class="text-xs italic mb-4 text-blue-500">Guest user</p>
                    <p>Email: {{ $purchase->email }}</p>
                    <p>Address: {{ $purchase->address }}</p>
                </div>
            </section>
        @else
            <section class="flex flex-col items-center justify-center gap-4 mt-4 p-6">
                <div class="border border-green-800 rounded-xl p-4 w-full">
                    <p class="text-xs italic mb-4 text-green-500">Registered user</p>
                    <p><span class="font-extrabold">Name: </span>{{ $purchase->user->name }}</p>
                    <p><span class="font-extrabold">Email: </span>{{ $purchase->email }}</p>
                    <p><span class="font-extrabold">Address: </span>{{ $purchase->address }}</p>
                </div>
            </section>
        @endif

        <div class="min-h-[200px]">
            @foreach ($purchase->orderLines as $orderLine)
                <div class="flex justify-start items-center gap-8 w-full px-16">
                    <img src="{{ $orderLine->product->imageUrl }}" alt="" class="w-12 h-12 mb-4">
                    <p class="flex-1">{{ $orderLine->product->name }}</p>
                    <p>{{ $orderLine->quantity }} x {{ $orderLine->product->price }} € =
                        {{ $orderLine->quantity * $orderLine->product->price }} €</p>
                </div>
            @endforeach
        </div>


        <div class="flex justify-end mb-2 text-xs mt-8">
            <span class="font-bold me-4">Taxes included (21%):</span>
            <span> {{ $orderTaxes }}</span>
            <span class="font-bold ms-4">€</span>
        </div>

        <div class="flex justify-end mb-4">
            <span class="font-bold me-4">Order total:</span>
            <span> {{ $orderTotal }}</span>
            <span class="font-bold ms-4">€</span>
        </div>

    </div>

@endsection
