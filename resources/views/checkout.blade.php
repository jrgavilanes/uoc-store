@extends('layouts.app')

@section('title', 'My Store')

@section('content')

    <div x-data="checkout()" class="text-red-200 mt-4 sm:w-[800px] min-h-[600px] p-2">
        <p>Checkout</p>
        <section class="flex items-start justify-center gap-4 mt-4 ">

            <div class="flex flex-col gap-4 w-full border border-blue-500 rounded-xl p-4">
                <p>Guest users</p>
                <div class="flex flex-col gap-2">
                    <label for="guest_email" class="text-xs">Guest email</label>
                    <input class="px-2 h-9 w-full text-slate-800" type="email" name="guest_email" id="guest_email"
                        placeholder="ex: name@server.com" autocomplete="off">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="guest_name" class="text-xs">Guest name</label>
                    <textarea class="px-2 text-slate-800" name="guest_address" id="guest_address" rows="3"
                        placeholder="postal address"></textarea>
                </div>

                <a href="{{ route('order-summary') }}">
                    <button class="text-white bg-blue-700 hover:bg-blue-600  px-2 py-2 w-full rounded-xl">
                        Checkout
                    </button>
                </a>
            </div>

            <div class="flex flex-col gap-4 w-full border border-green-500 rounded-xl p-4">
                <p>Registered users</p>
                <div class="flex flex-col gap-2">
                    <label for="registered_name" class="text-xs">Name</label>
                    <input x-model="user.name" class="px-2 h-9 w-full text-slate-800" name="registered_name"
                        id="registered_name" placeholder="name">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="email" class="text-xs">Email</label>
                    <input x-model="user.email" class="px-2 h-9 w-full text-slate-800" type="email" name="email"
                        id="email" placeholder="email" autocomplete="off">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="password" class="text-xs">Password</label>
                    <input x-model="user.password" class="px-2 h-9 w-full text-slate-800" type="password" name="password"
                        id="password" placeholder="your password" autocomplete="off">
                </div>

                <div class="flex flex-col gap-2">
                    <label for="address" class="text-xs">Address</label>
                    <textarea x-model="user.address" class="px-2 text-slate-800" name="address" id="address" rows="3"
                        placeholder="postal address"></textarea>
                </div>
                {{-- <a href="{{ route('order-summary') }}"> --}}
                <button @click="login()" class="text-white bg-green-700 px-2 py-2 w-full rounded-xl hover:bg-green-600">
                    Checkout
                </button>
                {{-- </a> --}}
            </div>

        </section>
    </div>

    <script>
        function checkout() {
            return {
                user: {
                    name: '',
                    email: '',
                    address: '',
                    password: '',
                },
                async login() {

                    if (!this.user.name || !this.user.email || !this.user.address || !this.user.password) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'All fields are required!',
                            background: '#333', // Fondo oscuro
                            color: '#fff', // Texto en blanco para contraste en modo oscuro
                            confirmButtonColor: '#1d72b8', // Color del botón de confirmación en modo oscuro
                        });
                        return;
                    }

                    try {
                        let response = await fetch("{{ route('checkout-login') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(this.user)
                        });

                        if (response.ok) {
                            let data = await response.json()

                            sessionStorage.setItem('user', JSON.stringify({
                                name: this.user.name,
                                email: this.user.email,
                                address: this.user.address,
                                id: data.user_id
                            }));

                            // Swal de 1,5s usuario logueado
                            Swal.fire({
                                icon: 'success',
                                title: 'Logged In',
                                text: 'User logged in',
                                timer: 1500,
                                showConfirmButton: false,
                                background: '#333', // Fondo oscuro
                                color: '#fff', // Texto blanco para contraste en modo oscuro
                            }).then(() => {
                                //redirige a la página de resumen de order-summary
                                window.location.href = '{{ route('order-summary') }}';
                            });

                            //redirige a la página de resumen de order-summary
                            // window.location.href = '{{ route('order-summary') }}';

                            // let result = await response.json();
                            // alert('Login successful');
                            // console.log(result);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Wrong credentials!',
                                background: '#333',
                                color: '#fff',
                                confirmButtonColor: '#3085d6',
                            });
                            throw new Error('Network response was not ok.');
                        }
                    } catch (error) {
                        console.error('There has been a problem with your fetch operation:', error);
                    }
                }
            }
        }
    </script>

@endsection
