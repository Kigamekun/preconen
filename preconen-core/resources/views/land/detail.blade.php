@extends('layouts.base')


@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
@endsection
@section('content')
    {{-- <style>
        input[readonly],
        input[disabled] {
            /* Add your desired styles here */
            background-color: #f0f0f0;
            color: #999;
            cursor: not-allowed;
            /* Add other styles as needed */
        }

        /* Optionally, you can remove the default border and outline for both inputs */
        input[readonly],
        input[disabled] {
            border: none;
            outline: none;
        }
    </style> --}}

    <div class=" mx-auto mt-10  ">
        <h1 class="text-[#495E57] text-5xl font-bold ">Detail Lahan {{ $data->name }}</h1>
        <div class="text breadcrumbs mb-8">
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('land.index') }}">Lahan Saya</a></li>
                <li>{{ $data->name }}</li>

            </ul>
        </div>
        <div class="grid grid-cols-2">
            <div class="flex flex-col mr-6">
                <div class="img-container overflow-hidden rounded-[25px] ">
                    <img src="{{ asset('img/sawah.jpg') }}" alt="" class="aspect-video">
                </div>
                <div class="flex justify-end mt-2">
                    <button class="btn btn-info  text-2xl normal-case shadow-md mr-2" onclick="edit_land.showModal()"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil" viewBox="0 0 16 16">
                            <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                        </svg>
                    </button>
                    <form action="{{ route('land.delete', ['id' => $data->id_land]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-error  text-2xl normal-case shadow-md w-full" type="submit"
                            value="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg></button>

                    </form>
                </div>
                <div class="">
                    <h2 class="text-3xl font-bold text-[#495E57] mb-5">Informasi terkait lahan</h2>
                    <div class="grid  gap-5 mb-10">
                        <div
                            class=" bg-slate-100 h-24 rounded-[25px] grid grid-cols-2 items-center justify-center row-span-2">
                            <h2 class="text-xl font-bold mx-5 text-right">Luas Lahan</h2>
                            <div class="text-white text-lg font-bold mt-2 px-8 py-4 rounded-[25px] max-w-min bg-[#495E57]">
                                {{ $data->wide }}m<span class="align-super text-xs font-semibold">2</span>
                            </div>
                        </div>
                        <div
                            class=" bg-slate-100 pt-4 rounded-[25px] flex flex-col items-stretch justify-center row-span-2">
                            <h2 class="text-2xl font-bold mx-5">Alamat Lahan</h2>
                            <div class="bg-white mt-2 px-5 py-4 rounded-[25px]  mx-5 flex items-center mb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path
                                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg><span class="flex-1 ml-2">Jl. Pemuda No.39, Embong Kaliasin, Kec. Genteng, Surabaya,
                                    Jawa
                                    Timur
                                    60271</span>
                            </div>
                        </div>
                        <div
                            class=" bg-slate-100  pt-4 rounded-[25px] flex flex-col items-stretch justify-center row-span-2">
                            <h2 class="text-2xl font-bold mx-5">Catatan</h2>
                            <div class="bg-white mt-2 px-5 py-4 rounded-[25px]  mx-5 flex items-center mb-5">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, cupiditate? Modi quis eos culpa
                                suscipit accusamus deserunt, vitae quae veritatis exercitationem iusto saepe nulla ipsa
                                provident libero quidem dicta magni.
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="">
                @if (true)
                    <h2 class="text-3xl font-bold text-[#495E57] mb-5">Penanaman di Lahan ini</h2>
                    <div class="grid gap-5 mb-10">
                        <div class=" bg-slate-100 h-36 rounded-[25px] flex flex-col items-center justify-center row-span-2">
                            <h2 class="text-xl font-bold">Komoditas yang ditanam</h2>
                            <div class="text-white  text-lg font-bold mt-2 px-8 py-4 rounded-[25px] bg-[#495E57]">Wortel
                                Hijau
                                {{-- @if (array_key_exists($comodity->code, $price))
                                {{ number_format(($price[$comodity->code]['total'] * $data->wide * ($comodity->potential_results_max + $comodity->potential_results_min)) / 2, 0, ',', '.') }}
                            @endif --}}
                            </div>
                        </div>

                        <div class=" bg-slate-100 h-36 rounded-[25px] flex flex-col items-center justify-center row-span-2">
                            <h2 class="text-xl font-bold">Keuntungan saat ini</h2>
                            <div class="text-white bg-[#495E57] text-lg font-bold mt-2 px-8 py-4 rounded-[25px]">Rp. 25.000

                                {{-- @if (array_key_exists($comodity->code, $price))
                                {{ number_format(($price[$comodity->code]['total'] * $data->wide * ($comodity->potential_results_max + $comodity->potential_results_min)) / 2, 0, ',', '.') }}
                            @endif --}}
                            </div>
                        </div>
                        <div class=" bg-slate-100 h-36 rounded-[25px] flex flex-col items-center justify-center row-span-2">
                            <h2 class="text-2xl font-bold">Suplai Komoditas</h2>
                            <div class="bg-white  text-3xl font-bold mt-2 px-8 py-4 rounded-[25px]">80.000

                                {{-- @if (array_key_exists($comodity->code, $price))
                                {{ number_format(($price[$comodity->code]['total'] * $data->wide * ($comodity->potential_results_max + $comodity->potential_results_min)) / 2, 0, ',', '.') }}
                            @endif --}}
                            </div>
                        </div>
                        <a href="{{ route('planting-planning.index') }}"
                            class="btn btn-ghost  text-2xl normal-case shadow-md my-2">Ke
                            Halaman Jadwal Penanaman</a>
                    </div>
                @else
                    <div class="flex flex-col items-center">

                        <div class="mx-10 mb-10">

                            <img src="{{ asset('img/no-plan.svg') }}" alt="">
                        </div>
                        <a class="btn btn-ghost  text-2xl normal-case shadow-md my-3"
                            href="{{ route('planting-planning.create') }}">Jadwalkan Penanaman</a>
                    </div>
                @endif
            </div>
            @if (!is_null(DB::table('lands')->where('user_id', Auth::id())->first()))
                <div class="grid grid-cols-2 grid-rows-7 gap-4 text-[#495E57]">



                    {{-- @if (!is_null($data) &&
    !is_null(
        $comodity = DB::table('comodities')->where('id', $data->comodity_id)->first(),
    ))
                        <div class="relative  rounded-[25px] overflow-hidden row-span-3">
                            <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                            <img src="{{ asset('img/sawah.jpg') }}" alt="Gambar"
                                class="w-full h-full object-cover rounded-[25px]">

                            <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                            <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-[25px]">
                                <div class="absolute p-3 inset-x-0 bottom-0 text-white">
                                    <h2 class="text-2xl font-extrabold  inset-x-0 bottom-0 mb">
                                        {{ $comodity->name }}</h2>

                                    @if (array_key_exists($comodity->code, $price))
                                        <p>Rp{{ number_format($price[$comodity->code]['total'], 0, ',', '.') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class=" bg-slate-100  rounded-[25px] flex flex-col items-center justify-center row-span-2">
                            <h2 class="text-2xl font-bold">Luas Lahan</h2>
                            <div class="bg-white text-3xl font-bold mt-2 px-4 py-2 rounded-[25px]">{{ $data->wide }} m^2
                            </div>
                        </div>
                        <div class=" bg-slate-100  rounded-[25px] flex flex-col items-center justify-center row-span-2">
                            <h2 class="text-2xl font-bold">Keuntungan saat ini</h2>
                            <div class="bg-white  text-3xl font-bold mt-2 px-4 py-2 rounded-[25px]">Rp.

                                @if (array_key_exists($comodity->code, $price))
                                    {{ number_format(($price[$comodity->code]['total'] * $data->wide * ($comodity->potential_results_max + $comodity->potential_results_min)) / 2, 0, ',', '.') }}
                                @endif
                            </div>
                        </div>
                    @else
                        <center>
                            Anda tidak punya Rencana tanam

                        </center>
                    @endif --}}


                </div>
            @else
                Anda tidak punya lahan :(
            @endif


        </div>


    </div>
    @include('components/edit-land')
@endsection


@section('scripts')
    <script src="{{ asset('assets/vendor/splide-4.1.3/dist/js/splide.min.js') }}"></script>

    <script>
        var splide = new Splide('.splide', {
            direction: 'ttb',
            height: '36rem',
            wheel: true,
            autoScroll: {
                speed: 1,
            },
            focus: 'center',
        });

        splide.mount();
    </script>

    <script>
        const calendarEvents = [{
                start: '2023-10-22T06:00:00',
                end: '2021-10-25T20:30:00',
                name: 'Tanam',
                desc: 'Tanam Apa gitu',
            },
            {
                start: '2023-10-30T06:00:00',
                end: '2021-10-31T20:30:00',
                name: 'Tanam',
                desc: 'Tanam Apa gitu',

            },
        ]
        new Calendar({
            id: '#main-calendar',
            layoutModifiers: ['month-align-left'],
            eventsData: calendarEvents,
            calendarSize: "large",
        })


        $("#comodity").change(function() {
            console.log('ada');
            var element = $(this).find('option:selected');
            var myTag = element.attr("data-lama");

            var tanggal = new Date($('#mulai').val());

            console.log(myTag)
            // Menambah 5 hari
            tanggal.setDate(tanggal.getDate() + parseInt(myTag));

            // Mengambil elemen input date kedua
            var inputDate2 = document.getElementById("panen");

            inputDate2.valueAsDate = tanggal;

        });
    </script>
@endsection
