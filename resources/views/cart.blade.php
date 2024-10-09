@extends('layouts.app')

@section('title', 'My Store')

@section('content')

    <div x-data="cart()" x-init="init()" class="text-red-200 mt-4 w-[800px] min-h-[600px] p-2">
        <p>Cart</p>

        <section class="flex flex-col items-center justify-start space-y-4 my-8 min-h-[400px]">

            <p class="sm:text-4xl" x-show="cart.length==0">The cart is empty</p>

            <template x-for="(product, index) in cart" :key="product.product_id">
                <div class="flex justify-start items-center gap-4 w-full">
                    <img :src="product.imageUrl" alt="" class="w-12 h-12">
                    <p class="flex-1" x-text="product.product_name"></p>

                    <div class="relative flex items-center max-w-[8rem]">
                        <button @click="subtract(index)" type="button" id="decrement-button"
                            data-input-counter-decrement="quantity-input"
                            class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 1h16" />
                            </svg>
                        </button>
                        <input :value="product.quantity" type="text" id="quantity-input" data-input-counter
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="1" required readonly min="1" />
                        <button @click="add(index)" type="button" id="increment-button"
                            data-input-counter-increment="quantity-input"
                            class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 1v16M1 9h16" />
                            </svg>
                        </button>
                    </div>

                    <p class="text-xs" x-text="`${product.price*product.quantity} €`"></p>
                    <button @click="remove(index)"
                        class="bg-blue-500 hover:bg-blue-700 duration-300 text-white px-4 py-2 rounded">
                        Remove
                    </button>

                </div>

            </template>

        </section>

        <div class="flex justify-end mb-4">
            <span class="font-bold me-4">Order total:</span>
            <span x-text="total()"></span>
            <span class="font-bold ms-4">€</span>
        </div>

        <a href="{{ route('checkout') }}">
            <div
                class="flex flex-col items-center justify-center bg-slate-900 rounded-lg cursor-pointer hover:bg-slate-900/75 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                </svg>
                <p>
                    checkout
                </p>
            </div>
        </a>

    </div>

    <script>
        function cart() {
            return {
                cart: [],
                init() {
                    this.cart = JSON.parse(sessionStorage.getItem('cart')) || [];
                },
                remove(index) {
                    this.cart.splice(index, 1);
                    sessionStorage.setItem('cart', JSON.stringify(this.cart));
                },
                add(index) {
                    if (this.cart[index].quantity < 5) {
                        this.cart[index].quantity++;
                        sessionStorage.setItem('cart', JSON.stringify(this.cart));
                    }

                },
                subtract(index) {
                    if (this.cart[index].quantity > 1) {
                        this.cart[index].quantity--;
                    }
                    sessionStorage.setItem('cart', JSON.stringify(this.cart));
                },
                total() {
                    return this.cart.reduce((acc, item) => acc + item.price * item.quantity, 0);
                }
            };
        }
    </script>

@endsection
