@extends('layouts.base')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
@stop
@section('content')

<style>
    .color-calendar {
        width: 100%;
        height: 100%;
    }
    .calendar__weekdays {
        grid-template-columns: repeat(7, minmax(100px, 55px)) !important;
    }
    .calendar__header {
        grid-template-columns: repeat(7, minmax(100px, 55px)) !important;
    }
    .calendar__days {
        grid-template-columns: repeat(7, minmax(100px, 55px)) !important;
    }

</style>
    @include('components.navigation')
    <div class="max-w-7xl px-4 mx-auto overflow-hidden max-w-screen">
        <h2 class="text-4xl font-extrabold my-3 mb-4">Halo, Selamat datang Lorem</h2>
        <div class="grid grid-cols-4 grid-rows-3 gap-8 mt-4 mx-auto mb-8">
            <div class="rounded-lg opacity-80 border-2 border-neutral-400/50  col-span-2 row-span-3"
                style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);">
                <div class="cuaca h-42 p-4 pb-0 flex flex-row justify-center items-center">
                    <div class="h-36 w-36 mx-3">@include('icons/cerah-berawan')</div>
                    <div class="kanan flex flex-col pb-3">
                        <span class="text-3xl font-bold">23&#xb0;C</span>
                        <span class="text-lg">Cerah</span>
                        <span class="text-lg">Bogor, Indonesia</span>

                    </div>
                </div>
                <div id="main-calendar" class="flex justify-center justify-items-stretch"></div>
            </div>
            <div style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);"
                class="rounded-lg opacity-80 border-2 border-neutral-400/50 drop-shadow-md col-span-2 row-span-2 p-4">
                <h2 class="text-2xl mb-3 font-bold ">Harga Komoditas Hari Ini</h2>
                <div class="flex flex-row overflow-x-auto">
                    <div class="flex-shrink-0">
                        <div class="flex flex-row gap-2">
                            @foreach (DB::table('comodities')->get() as $item)
                            <div class="relative w-48 min-w-48 rounded-lg overflow-hidden">
                                <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                                <img src="{{ asset('storage/comodities/wortel.jpg') }}" alt="Gambar"
                                    class="w-full h-full object-cover rounded-lg">

                                <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                                <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                                    <div class="absolute p-3 inset-x-0 bottom-0">
                                        <p class="text-xl font-extrabold text-white inset-x-0 bottom-0 mb">{{$item->name}}</p>
                                        <p class="text-md font-bold text-white">Rp. {{$price[$item->code]['harga']}}</p>
                                    </div>

                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, sapiente. Praesentium reiciendis
                    doloremque,
                    quidem magnam corrupti culpa temporibus itaque repellat dolore suscipit error magni ab ipsa maiores
                    nulla
                    nisi quis!</p>
            </div>
            <div style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);"
                class="rounded-lg opacity-80 border-2 border-neutral-400/50 drop-shadow-md col-span-1 row-span-1 justify-center flex flex-col">
                <h2 class="text-lg m-3 font-bold mx-4 text-center">Jadwalkan Penanaman</h2>
                <button class="btn btn-outline mx-4 mb-4 mt-2">Jadwalkan</button>
            </div>
            <div style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);"
                class="rounded-lg opacity-80 border-2 border-neutral-400/50 drop-shadow-md col-span-1 row-span-1 justify-center flex flex-col">
                <h2 class="text-lg m-3 font-bold mx-4 text-center">Suplai Tanaman</h2>
                <button class="btn btn-outline mx-4 mb-4 mt-2">Jadwalkan</button>
            </div>

        </div>
        <div class="grid grid-cols-3 gap-8 my-3 m-auto ">
            <div class="bg-white h-42 rounded-lg p-4 flex-col items-center "
                style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);">
                <p class="text-center text-2xl text-slate-500 font-bold mb-4">Kecepatan Angin</p>
                <div class="flex flex-1 justify-center items-center">
                    <div class="h-12 w-12 mx-2">@include('icons/wind')</div>
                    <p class="text-4xl text-slate-500 font-bold"> 14 km/h</p>
                </div>
            </div>
            <div class="bg-white h-42 rounded-lg p-4 flex-col items-center"
                style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);">
                <p class="text-center text-2xl text-slate-500 font-bold mb-4">Kemungkinan Hujan</p>
                <div class="flex flex-1 justify-center items-center">
                    <div class="h-12 w-12 mx-2">@include('icons/rain')</div>
                    <p class="text-4xl text-slate-500 font-bold"> 28%</p>
                </div>
            </div>
            <div class="bg-white h-42 rounded-lg p-4 flex-col items-center"
                style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);">
                <p class="text-center text-2xl text-slate-500 font-bold mb-4">Tutupan Awan</p>
                <div class="flex flex-1 justify-center items-center">
                    <div class="h-12 w-12 mx-2">@include('icons/cloud')</div>
                    <p class="text-4xl text-slate-500 font-bold"> 24%</p>
                </div>
            </div>
        </div>
        <h2 class="text-4xl font-extrabold mt-5 mb-3">Lahan Anda</h2>
        <div class="grid grid-cols-3 grid-rows-2 gap-4 my-3 m-auto">
            <div class="rounded-lg  row-span-2 col-span-1 py-3">
                <h3 class="text-2xl text-center font-semibold flex">Komoditas</h3>
                <div></div>
                <div class="h-20 rounded-lg bg-white my-3"
                    style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
                backdrop-filter: blur(2px);">

                </div>
                <div class="h-20 rounded-lg bg-white my-3"
                    style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
                backdrop-filter: blur(2px);">

                </div>
                <div class="h-20 rounded-lg bg-white my-3"
                    style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
                backdrop-filter: blur(2px);">

                </div>
                <div class="h-20 rounded-lg bg-white my-3"
                    style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
                backdrop-filter: blur(2px);">

                </div>
                <div class="h-20 rounded-lg bg-white my-3"
                    style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
                backdrop-filter: blur(2px);">

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
                        <p class="text-center text-xl text-white font-bold mb-3">Hari ini</p>
                        <div class="h-16">
                            @include('icons/cerah-berawan')
                        </div>
                        <p class="text-4xl text-white  text-center"> 22&#xb0;C</p>
                    </div>
                    <div class="bg-slate-400 h-48 w-40 rounded-lg p-4 flex-row items-center">
                        <p class="text-center text-xl text-white font-bold mb-3">Hari ini</p>
                        <div class="h-16">
                            @include('icons/berawan')
                        </div>
                        <p class="text-4xl text-white  text-center"> 22&#xb0;C</p>
                    </div>
                    <div class="bg-slate-400 h-48 w-40 rounded-lg p-4 flex-row items-center">
                        <p class="text-center text-xl text-white font-bold mb-3">Hari ini</p>
                        <div class="h-16">
                            @include('icons/cerah')
                        </div>
                        <p class="text-4xl text-white  text-center"> 22&#xb0;C</p>
                    </div>
                    <div class="bg-slate-400 h-48 w-40 rounded-lg p-4 flex-row items-center">
                        <p class="text-center text-xl text-white font-bold mb-3">Hari ini</p>
                        <div class="h-16">
                            @include('icons/hujan')
                        </div>
                        <p class="text-4xl text-white  text-center"> 22&#xb0;C</p>
                    </div>
                    <div class="bg-slate-400 h-48 w-40 rounded-lg p-4 flex-row items-center">
                        <p class="text-center text-xl text-white font-bold mb-3">Hari ini</p>
                        <div class="h-16">
                            @include('icons/cerah-berawan')
                        </div>
                        <p class="text-4xl text-white  text-center"> 22&#xb0;C</p>
                    </div>
                    <div class="bg-slate-400 h-48 w-40 rounded-lg p-4 flex-row items-center">
                        <p class="text-center text-xl text-white font-bold mb-3">Hari ini</p>
                        <div class="h-16">
                            @include('icons/hujan')
                        </div>
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
            eventsData: calendarEvents,
            calendarSize: "large",
        })
    </script>
@stop
