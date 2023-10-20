@extends('layouts.base')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
@stop
@section('content')
    @include('components.navigation')
    <div class="xl:container px-4 mx-auto">
        <h2 class="text-4xl font-extrabold my-3 mb-4">Halo, Selamat datang Lorem</h2>
        <div class="grid grid-cols-4 grid-rows-3 gap-4 my-3  mx-auto">
            <div class="rounded-lg opacity-80 border-2 border-neutral-400/50 drop-shadow-md col-span-2 row-span-3">
                <a class="weatherwidget-io" href="https://forecast7.com/en/n6d55106d63/bogor/" data-label_1="BOGOR"
                    data-label_2="Cuaca Hari Ini" data-mode="Current" data-theme="original">BOGOR Cuaca Hari Ini</a>
                <script>
                    ! function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = 'https://weatherwidget.io/js/widget.min.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, 'script', 'weatherwidget-io-js');
                </script>
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
        <div class="grid grid-cols-3 gap-4 my-3 m-auto">
            <div class="bg-slate-400 h-42 rounded-lg p-4 flex-col items-center">
                <p class="text-center text-2xl text-white font-bold mb-4">Kecepatan Angin</p>
                <div class="flex flex-1 justify-center items-center">
                    <img src="{{ asset('img/wind.svg') }}" class="h-16 mr-5" alt="">
                    <p class="text-4xl text-white font-bold"> 14 km/h</p>
                </div>
            </div>
            <div class=" h-42 rounded-lg p-4 flex-col items-center " style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            ">
                <p class="text-center text-2xl text-white font-bold mb-4">Kemungkinan Hujan</p>
                <div class="flex flex-1 justify-center items-center">
                    <img src="{{ asset('img/precip.png') }}" class="h-16 mr-5" alt="">
                    <p class="text-4xl text-white font-bold"> 28%</p>
                </div>
            </div>
            <div class="bg-slate-400 h-42 rounded-lg p-4 flex-col items-center">
                <p class="text-center text-2xl text-white font-bold mb-4">Tutupan Awan</p>
                <div class="flex flex-1 justify-center items-center">
                    <img src="{{ asset('img/cloud.png') }}" class="h-16 mr-5" alt="">
                    <p class="text-4xl text-white font-bold"> 24%</p>
                </div>
            </div>
        </div>
        <h2 class="text-4xl font-extrabold mt-5 mb-3">Lahan Anda</h2>
        <div class="grid grid-cols-3 grid-rows-2 gap-4 my-3 m-auto">
            <div class="rounded-lg bg-slate-400 row-span-2 col-span-1 p-3">
                <div class="h-20 rounded-lg bg-white my-2">

                </div>
                <div class="h-20 rounded-lg bg-white my-2">

                </div>
                <div class="h-20 rounded-lg bg-white my-2">

                </div>
                <div class="h-20 rounded-lg bg-white my-2">

                </div>
                <div class="h-20 rounded-lg bg-white my-2">

                </div>
            </div>

            <div class="relative h-56 rounded-lg bg-slate-400 overflow-hidden flex items-center justify-center">
                <img src="{{ asset('img/lahan.png') }}" alt="" class="object-cover w-full ">
                <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                    <div class="absolute p-3 inset-x-0 bottom-0">
                        <p class="text-3xl font-extrabold text-white inset-x-0 bottom-0 mb">Sawah Tadah Hujan</p>
                    </div>
                </div>
            </div>
            <div class="relative h-56 rounded-lg bg-slate-400 overflow-hidden flex items-center justify-center">
                <img src="{{ asset('img/lahan.png') }}" alt="" class="object-cover w-full ">
                <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                    <div class="absolute p-3 inset-x-0 bottom-0">
                        <p class="text-3xl font-extrabold text-white inset-x-0 bottom-0 mb">Gurun Pasir</p>
                    </div>
                </div>
            </div>
            <div class="relative h-56 rounded-lg bg-slate-400 overflow-hidden flex items-center justify-center">
                <img src="{{ asset('img/lahan.png') }}" alt="" class="object-cover w-full ">
                <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                    <div class="absolute p-3 inset-x-0 bottom-0">
                        <p class="text-3xl font-extrabold text-white inset-x-0 bottom-0 mb">Pegunungan</p>
                    </div>
                </div>
            </div>
            <div class="relative h-56 rounded-lg bg-slate-400 overflow-hidden flex items-center justify-center">
                <img src="{{ asset('img/lahan.png') }}" alt="" class="object-cover w-full ">
                <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                    <div class="absolute p-3 inset-x-0 bottom-0">
                        <p class="text-3xl font-extrabold text-white inset-x-0 bottom-0 mb">Lahan Gambut</p>
                    </div>
                </div>
            </div>

        </div>
        <h2 class="text-4xl font-extrabold mt-5 mb-3">Prakiraan Cuaca</h2>
        <div class="flex flex-row overflow-x-auto">
            <div class="flex-shrink-0">
                <div class="flex flex-row gap-2">
                    <div class="bg-slate-400 h-48 w-40 rounded-lg p-4 flex-row items-center">
                        <p class="text-center text-xl text-white font-bold mb-4">Hari ini</p>
                        <img src="{{ asset('img/cerah-berawan.svg') }}" class="h-12 mr-5 mx-auto" alt="">
                        <p class="text-4xl text-white  text-center"> 22&#xb0;C</p>
                    </div>
                    <div class="bg-slate-400 h-48 w-40 rounded-lg p-4 flex-row items-center">
                        <p class="text-center text-xl text-white font-bold mb-4">Hari ini</p>
                        <img src="{{ asset('img/cerah-berawan.svg') }}" class="h-12 mr-5 mx-auto" alt="">
                        <p class="text-4xl text-white  text-center"> 22&#xb0;C</p>
                    </div>
                    <div class="bg-slate-400 h-48 w-40 rounded-lg p-4 flex-row items-center">
                        <p class="text-center text-xl text-white font-bold mb-4">Hari ini</p>
                        <img src="{{ asset('img/cerah-berawan.svg') }}" class="h-12 mr-5 mx-auto" alt="">
                        <p class="text-4xl text-white  text-center"> 22&#xb0;C</p>
                    </div>
                    <div class="bg-slate-400 h-48 w-40 rounded-lg p-4 flex-row items-center">
                        <p class="text-center text-xl text-white font-bold mb-4">Hari ini</p>
                        <img src="{{ asset('img/cerah-berawan.svg') }}" class="h-12 mr-5 mx-auto" alt="">
                        <p class="text-4xl text-white  text-center"> 22&#xb0;C</p>
                    </div>
                    <div class="bg-slate-400 h-48 w-40 rounded-lg p-4 flex-row items-center">
                        <p class="text-center text-xl text-white font-bold mb-4">Hari ini</p>
                        <img src="{{ asset('img/cerah-berawan.svg') }}" class="h-12 mr-5 mx-auto" alt="">
                        <p class="text-4xl text-white  text-center"> 22&#xb0;C</p>
                    </div>
                    <div class="bg-slate-400 h-48 w-40 rounded-lg p-4 flex-row items-center">
                        <p class="text-center text-xl text-white font-bold mb-4">Hari ini</p>
                        <img src="{{ asset('img/cerah-berawan.svg') }}" class="h-12 mr-5 mx-auto" alt="">
                        <p class="text-4xl text-white  text-center"> 22&#xb0;C</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="mb-5"></div>
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
