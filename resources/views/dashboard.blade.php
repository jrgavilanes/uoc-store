@extends('layouts.app-admin')

@section('title', 'My Store')

@section('content')

    {{-- @if (!auth()->user()->is_admin)
        <script>
            window.location.href = "{{ route('home') }}";
        </script>
    @endif --}}

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
    <div class="text-red-200 mt-4 sm:min-w-[800px] min-h-[600px] p-2">
        <p class="mb-4">🏠 Dashboard</p>

        <p class="text-4xl font-thin">Purchaches list</p>

        @if ($orders->isEmpty())
            <p class="text-center text-gray-400 text-lg mt-24">No orders found.</p>
        @else
            <table class="w-full border border-slate-700 my-8">
                <thead class="bg-slate-900">
                    <tr class="h-9">
                        <td>Order id</td>
                        <td>Customer type</td>
                        <td>Date</td>
                        <td>Details</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="{{ $order->user_id ? 'bg-gray-700' : '' }}">
                            <td class="h-8">{{ $order->id }}</td>
                            <td>{{ $order->user_id ? 'Registered' : 'Guest' }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                <a class="text-blue-500 hover:text-blue-300 underline cursor-pointer"
                                    href="{{ route('purchase-detail', $order->id) }}">
                                    Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $orders->links() }}

        @endif



        {{-- @foreach ($orders as $order)
            <div class="border border-red-200 p-2 mb-2">
                <p>Order id: {{ $order->id }}</p>
                <p>Customer type: {{ $order->id ? 'registered' : 'guest' }}</p>
                <a class="text-blue-500 hover:text-blue-300 underline cursor-pointer"
                    href="{{ route('order-summary') }}">
                    Details
                </a>
            </div>
        @endforeach --}}



        {{-- <table class="w-full border border-red-200">
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

        </table> --}}
    </div>
@endsection
