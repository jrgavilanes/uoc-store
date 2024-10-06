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
        <p>Order summary</p>
        <section class="flex flex-col items-center justify-center gap-4 mt-4 p-6">
            <div class="border border-yellow-50 p-4 w-full">
                <p>Name: {{ __('name') }}</p>
                <p>Email: {{ __('Email') }}</p>
                <p>Address: {{ __('Address') }}</p>
            </div>
        </section>


        <section class="flex flex-col items-center justify-center border border-red-400">

            <div class="flex justify-between items-center gap-4 py-2">
                <img src="https://via.placeholder.com/50x50/ff0000/ffffff
                    " alt="">
                <p>1 x Product 1</p>
            </div>

            <div class="flex justify-between items-center gap-4 p-2">
                <img src="https://via.placeholder.com/50x50/ff0000/ffffff
                    " alt="">
                <p>2 x Product 2</p>
            </div>

            <div class="flex justify-between items-center gap-4 p-2">
                <img src="https://via.placeholder.com/50x50/ff0000/ffffff
                    " alt="">
                <p>3 x Product 3</p>
            </div>

            <div class="flex justify-between items-center gap-4 p-2">
                <img src="https://via.placeholder.com/50x50/ff0000/ffffff
                    " alt="">
                <p>4 x Product 4</p>
            </div>

        </section>
    </div>

    <button x-data
        @click="Swal.fire({
            title: 'Checkout confirmed',
            text: 'Check your email for the order details',
            icon: 'success',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('home') }}';
            }
        })"
        class="flex flex-col  text-white items-center justify-center bg-slate-900 p-4 rounded-lg cursor-pointer hover:bg-slate-900/75 mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
        </svg>
        <p>
            Confirm Checkout
        </p>
    </button>


@endsection
