@extends('layouts.app')

@section('title', 'My Store: home')

@section('content')

    <div class="text-red-200 mt-4 sm:w-[800px] min-h-[600px] p-2">
        <p>Home</p>
        <section>
            @foreach ($categories as $category)
                {{-- <div class="flex p-4 gap-4 items-center justify-bettwen"> --}}
                <a href="{{ route('categories', $category->slug) }}">
                    <div
                        class="shadow-xl p-4 flex justify-between items-center gap-4 border border-red-300/25 rounded-xl hover:scale-105 duration-300 hover:bg-slate-900 min-h-[150px] my-8 cursor-pointer">
                        <div>
                            <img src="{{ $category->imageUrl }}" width="100" alt="">
                        </div>
                        <div class="flex-1">
                            <p>{{ $category->name }}</p>
                            <p class="text-xs">{{ $category->description }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </section>
    </div>

    {{-- @if(auth()->check())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Logged In',
                    text: "{{ session('logged') }}",
                    timer: 1500,
                    showConfirmButton: false
                });
            });
        </script>
    @endif --}}




@endsection
