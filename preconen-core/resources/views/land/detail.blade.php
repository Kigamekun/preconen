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

    <div class="w-4/5 mx-auto mt-20 mb-40 ">
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
                <div class="img-container overflow-hidden rounded-[25px]">
                    <img src="{{ asset('img/sawah.jpg') }}" alt="">
                </div>
                <button class="btn btn-ghost  text-2xl normal-case shadow-md my-3" onclick="edit_land.showModal()">Ubah
                    Detail Lahan</button>
                <form action="{{ route('land.delete', ['id' => $data->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-ghost  text-2xl normal-case shadow-md my-3 w-full" type="submit"
                        value="Delete">Hapus Lahan Ini</button>

                </form>

            </div>

            <div class="">
                <h2 class="text-3xl font-bold text-[#495E57] mb-5">Informasi terkait lahan</h2>
                <div class="grid  gap-5 mb-10">
                    <div class=" bg-slate-100 h-36 rounded-[25px] flex flex-col items-center justify-center row-span-2">
                        <h2 class="text-2xl font-bold">Luas Lahan</h2>
                        <div class="bg-white text-3xl font-bold mt-2 px-8 py-4 rounded-[25px]">{{ $data->wide }}m<span
                                class="align-super text-sm font-semibold">2</span>
                        </div>
                    </div>
                    <div class=" bg-slate-100 h-36 rounded-[25px] flex flex-col items-center justify-center row-span-2">
                        <h2 class="text-2xl font-bold">Alamat Lahan</h2>
                        <div class="bg-white text-3xl font-bold mt-2 px-8 py-4 rounded-[25px]">{{ $data->wide }}m<span
                                class="align-super text-sm font-semibold">2</span>
                        </div>
                    </div>

                </div>
                <h2 class="text-3xl font-bold text-[#495E57]">Penanaman di Lahan ini</h2>

                <div class="flex flex-col items-center">

                    <div class="my-40">

                        <p class="text-center"> Belum ada penanaman di lahan ini</p>
                    </div>
                    <a class="btn btn-ghost  text-2xl normal-case shadow-md my-3"
                        href="{{ route('planting-planning.create') }}">Jadwalkan Penanaman</a>
                </div>
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
