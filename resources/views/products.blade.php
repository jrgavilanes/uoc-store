@extends('layouts.app')

@section('title', 'My Store')

@section('content')

    <div x-data="productDetail()" class="text-red-200 mt-4 w-[800px] min-h-[600px] p-2">
        <p>Product detail</p>
        <section>
            <div class="flex gap-4 mt-8">
                <img class="w-1/4" src="{{ $product->imageUrl }}" alt="">
                <div class="w-3/4 flex flex-col gap-4">
                    <p class="font-bold">{{ $product->name }}</p>
                    <p class="text-sm"><span class="font-semibold">Description: </span><br>{{ $product->description }}</p>
                    <p class="text-sm"><span class="font-semibold">Price: </span><br>{{ $product->price }} €</p>
                    <button x-data
                        @click="addToCart({{ $product->id }}, '{{ $product->name }}', '{{ $product->imageUrl }}', {{ $product->price }})"
                        class="text-white bg-slate-700/50 px-2 py-2 w-1/2 rounded-xl hover:bg-slate-700">
                        Add to Cart
                    </button>
                </div>
            </div>

        </section>
    </div>

    <script>
        function productDetail() {
            return {
                showModal: false,
                addToCart(product_id, product_name, imageUrl, price) {
                    this.writeSession(product_id, product_name, imageUrl, price);

                    // Swal.fire({
                    //     title: 'Product added to cart',
                    //     text: 'Do you want to go to the cart or continue shopping?',
                    //     icon: 'success',
                    //     showCancelButton: true,
                    //     confirmButtonText: 'Go to cart',
                    //     cancelButtonText: 'Continue shopping',
                    //     reverseButtons: true
                    // }).then((result) => {
                    //     if (result.isConfirmed) {
                    //         window.location.href = '{{ route('cart') }}';
                    //     } else if (result.dismiss === Swal.DismissReason.cancel) {
                    //         window.location.href = '{{ route('home') }}';
                    //     }
                    // });

                    Swal.fire({
                        title: 'Product added to cart',
                        text: 'Do you want to go to the cart or continue shopping?',
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonText: 'Go to cart',
                        cancelButtonText: 'Continue shopping',
                        reverseButtons: true,
                        background: '#333', // Fondo oscuro
                        color: '#fff', // Texto blanco para contraste en modo oscuro
                        confirmButtonColor: '#1d72b8', // Color del botón de confirmación en modo oscuro
                        cancelButtonColor: '#555' // Color del botón de cancelación en modo oscuro
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route('cart') }}';
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            window.location.href = '{{ route('home') }}';
                        }
                    });


                },

                writeSession(product_id, product_name, imageUrl, price) {
                    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

                    const existingProduct = cart.find(item => item.product_id === product_id);

                    if (!existingProduct) {
                        cart.push({
                            product_id,
                            product_name,
                            imageUrl,
                            price,
                            quantity: 1
                        });
                    }

                    sessionStorage.setItem('cart', JSON.stringify(cart));
                },
            }
        }
    </script>

@endsection
