@extends('layouts.base')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
@stop
@section('content')
    @include('components.navigation')
    <div class="grid grid-cols-4 grid-rows-3 gap-4 my-3 max-w-7xl m-auto">
        <div class="rounded-lg opacity-80 border-2 border-neutral-400/50 drop-shadow-md col-span-2 row-span-3">
            <div id="main-calendar" class="flex justify-center  justify-items-stretch"></div>
        </div>
        <div class="rounded-lg opacity-80 border-2 border-neutral-400/50 drop-shadow-md col-span-2 row-span-2 p-4">
            <h2 class="text-2xl mb-3 font-bold ">Harga Komoditas Hari Ini</h2>
            <div class="flex flex-row overflow-x-auto">
                <div class="flex-shrink-0">
                    <div class="flex flex-row gap-2">
                        <div class="relative w-48 min-w-48 rounded-lg overflow-hidden">
                            <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                            <img src="{{ asset('img/wortel.jpg') }}" alt="Gambar"
                                class="w-full h-full object-cover rounded-lg">

                            <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                            <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                                <div class="absolute p-3 inset-x-0 bottom-0">
                                    <p class="text-xl font-extrabold text-white inset-x-0 bottom-0 mb">Wortel</p>
                                    <p class="text-md font-bold text-white">Rp. 20.000</p>
                                </div>

                            </div>
                        </div>
                        <div class="relative w-48 min-w-48 rounded-lg overflow-hidden">
                            <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                            <img src="{{ asset('img/wortel.jpg') }}" alt="Gambar"
                                class="w-full h-full object-cover rounded-lg">

                            <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                            <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                                <div class="absolute p-3 inset-x-0 bottom-0">
                                    <p class="text-xl font-extrabold text-white inset-x-0 bottom-0 mb">Wortel</p>
                                    <p class="text-md font-bold text-white">Rp. 20.000</p>
                                </div>

                            </div>
                        </div>

                        <div class="relative w-48 min-w-48 rounded-lg overflow-hidden">
                            <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                            <img src="{{ asset('img/wortel.jpg') }}" alt="Gambar"
                                class="w-full h-full object-cover rounded-lg">

                            <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                            <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                                <div class="absolute p-3 inset-x-0 bottom-0">
                                    <p class="text-xl font-extrabold text-white inset-x-0 bottom-0 mb">Wortel</p>
                                    <p class="text-md font-bold text-white">Rp. 20.000</p>
                                </div>

                            </div>
                        </div>
                        <div class="relative w-48 min-w-48 rounded-lg overflow-hidden">
                            <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                            <img src="{{ asset('img/wortel.jpg') }}" alt="Gambar"
                                class="w-full h-full object-cover rounded-lg">

                            <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                            <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                                <div class="absolute p-3 inset-x-0 bottom-0">
                                    <p class="text-xl font-extrabold text-white inset-x-0 bottom-0 mb">Wortel</p>
                                    <p class="text-md font-bold text-white">Rp. 20.000</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, sapiente. Praesentium reiciendis
                doloremque,
                quidem magnam corrupti culpa temporibus itaque repellat dolore suscipit error magni ab ipsa maiores
                nulla
                nisi quis!</p>
        </div>
        <div
            class="rounded-lg opacity-80 border-2 border-neutral-400/50 drop-shadow-md col-span-1 row-span-1 justify-center flex flex-col">
            <h2 class="text-lg m-3 font-bold mx-4 text-center">Jadwalkan Penanaman</h2>
            <button class="btn btn-outline mx-4 mb-4 mt-2">Jadwalkan</button>
        </div>
        <div
            class="rounded-lg opacity-80 border-2 border-neutral-400/50 drop-shadow-md col-span-1 row-span-1 justify-center flex flex-col">
            <h2 class="text-lg m-3 font-bold mx-4 text-center">Suplai Tanaman</h2>
            <button class="btn btn-outline mx-4 mb-4 mt-2">Jadwalkan</button>
        </div>

    </div>
    <div class="grid grid-cols-3 gap-4 my-3 max-w-7xl m-auto">

    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <script>
        const calendarEvents = [{
            start: '2023-10-21T06:00:00',
            end: '2021-10-25T20:30:00',
            name: 'Tanam',
            desc: 'Tanam Apa gitu',

        }, ]
        new Calendar({
            id: '#main-calendar',
            layoutModifiers: ['month-align-left'],
            eventsData: calendarEvents
        })
    </script>
@stop
