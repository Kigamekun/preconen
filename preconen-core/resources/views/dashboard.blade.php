@extends('layouts.base')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
@stop
@section('content')
    <div class="max-w-7xl px-4 mx-auto overflow-hidden max-w-screen text-[#495E57]">
        <h2 class="text-4xl font-extrabold mt-6 mb-8 ">Halo, Selamat datang {{ Auth::user()->name }}</h2>
        <div class="grid grid-cols-4 grid-rows-3 gap-8 mt-4 mx-auto mb-8">
            <div class="rounded-lg opacity-80 border-2 border-neutral-400/50  col-span-2 row-span-3"
                style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);">
                <div class="cuaca h-36 p-4 pb-0 flex flex-row justify-center items-center">
                    <img src="https://openweathermap.org/img/wn/{{ $forecast[0]['weather'][0]['icon'] }}@4x.png" />

                    <div class="kanan flex flex-col pb-3 text-[#495E57]">
                        <span class="text-3xl font-bold">
                            {{ round($forecast[0]['temp']['day'] - 273.15) }}&#xb0;C</span>
                        <span class="text-lg">{{ ucwords($forecast[0]['weather'][0]['description']) }}</span>
                        <span class="text-lg">{{ $forecast[0]['city']['name'] }}</span>

                    </div>
                </div>
                <div id="main-calendar" class="flex justify-center justify-items-stretch"></div>
            </div>
            <div style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);"
                class="rounded-lg opacity-80 border-2 border-neutral-400/50 drop-shadow-md col-span-2 row-span-2 p-4">
                <h2 class="text-2xl mb-3 font-bold ">Harga Komoditas Hari Ini</h2>
                <div class="flex flex-row overflow-x-auto mb-3">
                    <div class="flex-shrink-0">
                        <div class="flex flex-row gap-2">
                            @foreach (DB::table('comodities')->get() as $item)
                                @if (array_key_exists($item->code, $price))
                                    <div class="relative w-48 min-w-48 rounded-lg overflow-hidden">
                                        <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                                        <img src="{{ asset('storage/comodities/' . $item->thumb) }}" alt="Gambar"
                                            class="w-full h-full object-cover rounded-lg">

                                        <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                                        <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                                            <div class="absolute p-3 inset-x-0 bottom-0">
                                                <p class="text-xl font-extrabold text-white inset-x-0 bottom-0 mb">
                                                    {{ $item->name }}</p>
                                                <p class="text-md font-bold text-white">Rp.
                                                    {{ number_format($price[$item->code]['total'], 0, ',', '.') }}
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            @endforeach


                        </div>
                    </div>
                </div>

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
                <a href="{{ route('planting-planning.index') }}" class="btn btn-outline mx-4 mb-4 mt-2">Jadwalkan</a>
            </div>
            <div style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);"
                class="rounded-lg opacity-80 border-2 border-neutral-400/50 drop-shadow-md col-span-1 row-span-1 justify-center flex flex-col">
                <h2 class="text-lg m-3 font-bold mx-4 text-center">Suplai Tanaman</h2>
                <button class="btn btn-outline mx-4 mb-4 mt-2">Jadwalkan</button>
            </div>

        </div>
        <div class="grid grid-cols-3 gap-8 my-3 m-auto text-[#495E57]">
            <div class="bg-white h-42 rounded-lg p-4 flex-col items-center "
                style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);">
                <p class="text-center text-2xl font-bold mb-4">Kecepatan Angin</p>
                <div class="flex flex-1 justify-center items-center">
                    <div class="h-12 w-12 mx-2">@include('icons/wind')</div>
                    <p class="text-4xl text-slate-500 font-bold"> {{ $forecast[0]['speed'] }} km/h</p>
                </div>
            </div>
            <div class="bg-white h-42 rounded-lg p-4 flex-col items-center"
                style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);">
                <p class="text-center text-2xl font-bold mb-4 ">Kemungkinan Hujan</p>
                <div class="flex flex-1 justify-center items-center">
                    <div class="h-12 w-12 mx-2">@include('icons/rain')</div>
                    <p class="text-4xl text-slate-500 font-bold"> {{ $forecast[0]['rain'] }}%</p>
                </div>
            </div>
            <div class="bg-white h-42 rounded-lg p-4 flex-col items-center"
                style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(2px);">
                <p class="text-center text-2xl font-bold mb-4">Tutupan Awan</p>
                <div class="flex flex-1 justify-center items-center">
                    <div class="h-12 w-12 mx-2">@include('icons/cloud')</div>
                    <p class="text-4xl text-slate-500 font-bold"> {{ $forecast[0]['clouds'] }}%</p>
                </div>
            </div>
        </div>
        <h2 class="text-4xl font-extrabold my-8">Lahan Anda</h2>
        <div class="grid grid-cols-3  gap-4 my-3 m-auto">

            @foreach (App\Models\Land::where('user_id', Auth::id())->limit(5)->get() as $item)
                <a class="relative h-56 rounded-lg bg-slate-400 overflow-hidden flex items-center justify-center"
                    style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);"
                    href="{{ route('land.index') . '/' . $item->id }}">
                    <img src="{{ asset('img/lahan.png') }}" alt="" class="object-cover w-full ">
                    <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                        <div class="absolute p-3 inset-x-0 bottom-0">
                            <p class="text-3xl font-extrabold text-white inset-x-0 bottom-0 mb">
                                {{ $item->name }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
            <a href="{{ route('land.index') }}"
                class="relative h-56 rounded-lg bg-white overflow-hidden flex items-center justify-center"
                style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);">

                <div class="absolute inset-0 0 rounded-lg">
                    <div class="flex items-center justify-center  h-full p-3 inset-x-0 bottom-0 flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-plus-circle mb-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        <p class="text-3xl font-extrabold ">
                            Tambahkan Lahan
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <h2 class="text-4xl font-extrabold my-8">Prakiraan Cuaca</h2>
        <div class="flex flex-row overflow-x-auto">
            <div class="flex-shrink-0">
                <div class="flex flex-row gap-2">

                    @php
                        $dateFormatter = new IntlDateFormatter('id_ID', IntlDateFormatter::RELATIVE_SHORT, IntlDateFormatter::NONE);
                    @endphp
                    @foreach ($forecast as $item)
                        <div class="bg-slate-400 h-48 w-40 rounded-lg p-4 flex-row items-center">
                            <p class="text-center text-xl text-white  mb-1">
                                {{ ucwords($dateFormatter->format(DateTime::createFromFormat('Y-m-d H:i:s', $item['date']))) }}
                            </p>
                            <div class="">
                                <img src="https://openweathermap.org/img/wn/{{ $item['weather'][0]['icon'] }}@2x.png"
                                    alt="" class="h-20 mx-auto">
                                {{-- @switch($item['weather'][0]['main'])
                                    @case('Rain')
                                        @include('icons/hujan')
                                    @break

                                    @case('Clouds')
                                        @include('icons/berawan')
                                    @break

                                    @case('Clear')
                                        @include('icons/cerah')
                                    @break

                                    @default
                                @endswitch --}}
                            </div>
                            <p class="text-2xl text-white  font-bold text-center">
                                {{ $item['temp']['day'] - 273.15 }}&#xb0;C</p>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>

        <div class="mb-5"></div>
    </div>
    <script>
        const calendarEvents = [
            // {
            //     start: '2023-10-22T06:00:00',
            //     end: '2021-10-25T20:30:00',
            //     name: 'Tanam',
            //     desc: 'Tanam Apa gitu',
            // },
            // {
            //     start: '2023-10-30T06:00:00',
            //     end: '2021-10-31T20:30:00',
            //     name: 'Tanam',
            //     desc: 'Tanam Apa gitu',
            // },
        ]
        new Calendar({
            id: '#main-calendar',
            layoutModifiers: ['month-align-left'],
            eventsData: calendarEvents,
            calendarSize: "large",
        })
    </script>

@stop


@section('scripts')
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {

            let currentURL = window.location.href;

            let newParameter = `lat=${position.coords.latitude}&long=${position.coords.longitude}`;

            if (currentURL.includes('?')) {
                currentURL = currentURL + '&' + newParameter;
            } else {
                currentURL = currentURL + '?' + newParameter;
            }

            window.location.href = currentURL;
        }
    </script>
@endsection
