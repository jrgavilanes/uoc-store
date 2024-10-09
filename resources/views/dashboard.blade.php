@extends('layouts.app-admin')

@section('title', 'My Store')

@section('content')

    <nav class="flex justify-between items-center w-[400px]">
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
    <div class="text-red-200 mt-4 border border-red-400 min-w-[400px] min-h-[400px] p-2">
        <p class="mb-4">Dashboard</p>
        <table class="w-full border border-red-200">
            <thead class="border">
                <tr>
                    <td>Order id</td>
                    <td>Customer type</td>
                    <td>Details</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>guest</td>
                    <td>
                        <a class="text-blue-500 hover:text-blue-300 underline cursor-pointer"
                            href="{{ route('order-summary') }}">
                            Details
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>registered</td>
                    <td>
                        <a class="text-blue-500 hover:text-blue-300 underline cursor-pointer"
                            href="{{ route('order-summary') }}">
                            Details
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>guest</td>
                    <td>
                        <a class="text-blue-500 hover:text-blue-300 underline cursor-pointer"
                            href="{{ route('order-summary') }}">
                            Details
                        </a>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
@endsection
