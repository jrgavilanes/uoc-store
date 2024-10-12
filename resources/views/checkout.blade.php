@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

    <div x-data="checkout()" class="text-red-200 mt-4 sm:max-w-[800px] min-h-[600px] p-2">
        <p>Checkout</p>
        <section class="flex flex-col sm:flex-row items-start justify-center gap-4 mt-4 ">

            <div class="flex flex-col gap-4 w-full border border-blue-500 rounded-xl p-4">
                <p>Guest users</p>
                <div class="flex flex-col gap-2">
                    <label for="guest_email" class="text-xs">Guest email</label>
                    <input x-model="user.guest_email" class="px-2 h-9 w-full text-slate-800" type="email" name="guest_email"
                        id="guest_email" placeholder="ex: name@server.com" autocomplete="off">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="guest_address" class="text-xs">Guest address</label>
                    <textarea x-model="user.guest_address" class="px-2 text-slate-800" name="guest_address" id="guest_address"
                        rows="3" placeholder="postal address"></textarea>
                </div>

                <button @click="setGuest()" class="text-white bg-blue-700 hover:bg-blue-600  px-2 py-2 w-full rounded-xl">
                    Checkout
                </button>
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
                <button @click="login()" class="text-white bg-green-700 px-2 py-2 w-full rounded-xl hover:bg-green-600">
                    Checkout
                </button>
            </div>

        </section>
    </div>

    <script>
        function checkout() {
            return {
                user: {
                    name: "{{ session('user.name', '') }}",
                    email: "{{ session('user.email', '') }}",
                    address: "{{ session('user.address', '') }}",
                    password: '',
                    guest_email: "{{ session('user.guest_email', '') }}",
                    guest_address: "{{ session('user.guest_address', '') }}",
                },
                async setGuest() {

                    if (!this.user.guest_email || !this.user.guest_address) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'All Guest fields are required!',
                            background: '#333',
                            color: '#fff',
                            confirmButtonColor: '#1d72b8',
                        });
                        return;
                    }

                    const payload = {
                        user: this.user,
                    }

                    let response = await fetch("{{ route('checkout-set-guest') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(payload)
                    });

                    if (!response.ok) {
                        console.error('There has been a problem with your fetch operation:', error);
                        return;
                    }

                    window.location.href = '{{ route('order-summary') }}';
                },
                async login() {

                    if (!this.user.name || !this.user.email || !this.user.address || !this.user.password) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'All fields are required!',
                            background: '#333',
                            color: '#fff',
                            confirmButtonColor: '#1d72b8',
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

                            window.location.href = '{{ route('order-summary') }}';

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
