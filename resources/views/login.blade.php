@extends('layouts.app-admin')

@section('title', 'Login')

@section('content')

    <div class="flex justify-center items-start h-screen mt-16 sm:max-w-[800px] ">
        <div class="text-red-200 mt-4 w-[400px] min-h-[400px] p-2">
            <p>Login for admin users</p>
            <section>
                <form class = "flex flex-col items-center justify-center space-y-4 my-8 p-4 border border-slate-600" method="post"
                    action="{{ route('login.post') }}">
                    @csrf
                    <input class="px-2 h-9 w-full text-slate-800" type="email" name="email" id="email"
                        value="{{ old('email') }}" placeholder="email" required>
                    <input class="px-2 h-9 w-full text-slate-800" type="password" name="password" id="password"
                        placeholder="password" required>
                    <button type = "submit"
                        class="text-white bg-slate-700 px-2 py-2 w-full rounded-xl hover:bg-slate-900">
                        Log in
                    </button>
                </form>

                <a href="/">
                    <p class="text-center w-full text-blue-500 hover:underline hover:text-blue-400">Back to home</p>
                </a>
            </section>
            @if (session('error'))
                <div class="text-red-500 text-center">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>



@endsection
