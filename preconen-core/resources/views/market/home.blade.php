@extends('layouts.base')

@section('content')
    <div class="max-w-7xl w-11/12 p-4 mx-auto">
        <div class="flex justify-between text-[#495E57] mb-3">
            <h1 class="text-4xl  font-semibold flex-1">Warung Preconen</h1>
            <button class="btn btn-ghost text-xl normal-case"><img src="{{ asset('img/chat.icon.svg') }}" alt=""
                    class="mr-2 h-6">Pesan</button>
            <button class="btn btn-ghost text-xl normal-case"><img src="{{ asset('img/cart.icon.svg') }}" alt=""
                    class="mr-2 h-6">Keranjang</button>
        </div>
        <div class="flex justify-between text-[#495E57] mb-3">
            <div class="relative flex items-stretch w-full">
                <input type="text"
                    class="block w-full py-2 pl-10 pr-4 border border-gray-300 rounded-l-md focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-300 transition duration-300"
                    placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m0 0l-6-6m6 6l-6-6"></path>
                    </svg>
                </div>
                <span
                    class="inline-flex items-center px-3 text-white bg-gray-700 border border-gray-300 rounded-r-md text-sm">
                    @example.com
                </span>
            </div>

            <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs mr-6" />
            <input type="text" placeholder="Type here" class="input input-bordered w-full flex-1" />

        </div>

    </div>
@endsection
