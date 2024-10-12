@extends('layouts.app')

@section('title', 'Order summary')

@section('content')

    {{-- <script>
        if (!sessionStorage.getItem('cart')) {
            window.location.href = '{{ route('cart') }}';
        }
    </script> --}}


    @if (session()->has('user'))
        @php
            $user = session('user');
        @endphp

        <div x-data="orderSummary()" class="text-red-200 mt-4 sm:w-[800px] min-h-[600px] p-2">
            <p>Order summary</p>

            @if ($user['type'] == 'guest')
                <section class="flex flex-col items-center justify-center gap-4 mt-4 p-6">
                    <div class="border border-blue-800 rounded-xl p-4 w-full">
                        <p class="text-xs italic mb-4 text-blue-500">Guest user</p>
                        <p>Email: {{ $user['guest_email'] }}</p>
                        <p>Address: {{ $user['guest_address'] }}</p>
                    </div>
                </section>
            @else
                <section class="flex flex-col items-center justify-center gap-4 mt-4 p-6">
                    <div class="border border-green-800 rounded-xl p-4 w-full">
                        <p class="text-xs italic mb-4 text-green-500">Registered user</p>
                        <p><span class="font-extrabold">Name: </span>{{ $user['name'] }}</p>
                        <p><span class="font-extrabold">Email: </span>{{ $user['email'] }}</p>
                        <p><span class="font-extrabold">Address: </span>{{ $user['address'] }}</p>
                    </div>
                </section>
            @endif

            <div class="min-h-[200px]">
                <template x-for="(product, index) in cart" :key="product.product_id">
                    <div class="flex justify-start items-center gap-8 w-full px-16">
                        <img :src="product.imageUrl" alt="" class="w-12 h-12 mb-4">
                        <p class="flex-1" x-text="product.product_name"></p>
                        <p x-text="`x ${product.quantity} = ${product.price*product.quantity} €`"></p>
                    </div>
                </template>
            </div>


            <div class="flex justify-end mb-2 text-xs mt-8">
                <span class="font-bold me-4">Taxes included (21%):</span>
                <span x-text="((total()/1.21)*0.21).toFixed(2)"></span>
                <span class="font-bold ms-4">€</span>
            </div>
            <div class="flex justify-end mb-4">
                <span class="font-bold me-4">Order total:</span>
                <span x-text="total()"></span>
                <span class="font-bold ms-4">€</span>
            </div>



            <button @click="checkout()" class="w-full">
                <div
                    class="flex flex-col items-center justify-center bg-slate-700/50 rounded-lg cursor-pointer hover:bg-slate-700 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                    <p>
                        Procced to checkout
                    </p>
                </div>
            </button>

        </div>


        <script>
            function orderSummary() {
                return {
                    cart: [],
                    total() {
                        return this.cart.reduce((acc, item) => acc + item.price * item.quantity, 0);
                    },
                    async checkout() {

                        if (this.cart.length === 0) {
                            alert('Your cart is empty');
                            return;
                        }

                        const payload = {
                            cart: this.cart
                        };

                        const response = await fetch("{{ route('final-checkout') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(payload)
                        });

                        if (!response.ok) {
                            alert('There has been a problem with your fetch operation');
                            console.error('There has been a problem with your fetch operation:', error);
                            return;
                        }

                        const result = await response.json();

                        await sessionStorage.removeItem('cart');

                        Swal.fire({
                            title: `Order #${result['order_id']} confirmed`,
                            text: 'Check your email for the order details (not really ;)',
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            background: '#333',
                            color: '#fff',
                            confirmButtonColor: '#1d72b8',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '{{ route('home') }}';
                            }
                        });
                    },
                    init() {
                        this.cart = JSON.parse(sessionStorage.getItem('cart')) || [];
                        if (this.cart.length === 0) {
                            window.location.href = '{{ route('cart') }}';
                        }
                    },
                }
            }
        </script>
    @else
        <script>
            // alert('There is a problem with your session. Please login again');
            window.location.href = '{{ route('home') }}';
        </script>
    @endif


@endsection
