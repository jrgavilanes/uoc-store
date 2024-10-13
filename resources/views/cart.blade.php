@extends('layouts.app')

@section('title', 'Cart')

@section('content')

    <div x-data="cart()" x-init="init()" class="text-red-200 mt-4 sm:w-[800px] min-h-[600px] p-2">
        <p>Cart</p>

        <section class="flex flex-col items-center justify-start space-y-4 my-8 min-h-[400px]">

            <p class="sm:text-4xl" x-show="cart.length==0">Your cart is empty</p>

            <template x-for="(product, index) in cart" :key="product.product_id">
                <div class="flex justify-start items-center gap-4 w-full">
                    <img :src="product.imageUrl" alt="" class="sm:w-12 h-12">
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
                        class="bg-red-500 hover:bg-red-700 duration-300 text-white px-4 py-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>

                </div>

            </template>

        </section>

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
                    checkout
                </p>
            </div>
        </button>

    </div>

    <script>
        function cart() {
            return {
                cart: [],
                init() {
                    this.cart = JSON.parse(sessionStorage.getItem('cart')) || [];
                },
                checkout() {
                    if (this.cart.length == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'The cart is empty!',
                            background: '#333',
                            color: '#fff',
                        });
                    } else {
                        window.location.href = "{{ route('checkout') }}";
                    }
                },
                remove(index) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        background: '#333',
                        color: '#fff',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.cart.splice(index, 1);
                            sessionStorage.setItem('cart', JSON.stringify(this.cart));
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your item has been deleted.',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false,
                                background: '#333',
                                color: '#fff',
                            });
                        }
                    })

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
