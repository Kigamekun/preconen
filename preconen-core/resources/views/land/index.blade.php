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
        <h1 class="text-[#495E57] text-5xl font-bold">Lahan Saya</h1>
        <div class="text-sm breadcrumbs mb-8">
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>Lahan Saya</li>

            </ul>
        </div>
        <div class="grid grid-cols-2 gap-5">
            <div class="flex flex-col">
                <div class="card ">
                    <div class="p-example__body">
                        <div class="p-example__splide">
                            <div class="splide" id="example-grid">
                                <div class="splide__track">
                                    <ul class="splide__list">

                                        @foreach (DB::table('lands')->get() as $item)
                                            <li class="p-splide__slide splide__slide">

                                                <div class="relative h-[36rem]  rounded-lg overflow-hidden ">
                                                    <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                                                    <img src="{{ asset('img/sawah.jpg') }}" alt="Gambar"
                                                        class="w-full h-full object-cover rounded-lg">

                                                    <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                                                    <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                                                        <div class="absolute p-3 inset-x-0 bottom-0">
                                                            <p
                                                                class="text-2xl font-extrabold text-white inset-x-0 bottom-0 mb">
                                                                {{ $item->name }}</p>
                                                            <p class="text-md font-bold text-white">
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                Ratione
                                                                commodi est cupiditate dignissimos unde? Autem nemo deleniti
                                                                animi ipsam blanditiis error velit eius omnis delectus
                                                                soluta,
                                                                iusto illum explicabo optio!
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>

                                            </li>
                                        @endforeach



                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-ghost text-3xl mt-2 h-16" onclick="add_land.showModal()">+ Tambahkan Lahan</button>
            </div>

            @if (
                !is_null(DB::table('lands')->where('user_id', Auth::id())->first()))
                <div class="grid grid-cols-2 grid-rows-7 gap-4 text-[#495E57]">

                    <div class="col-span-2">
                        <select class="select w-full text-lg drop-shadow-lg rounded font-semibold">
                            @foreach (DB::table('lands')->where('user_id', Auth::id())->get() as $item)
                                <option class="h-8">{{ ucwords($item->name) }}</option>
                            @endforeach
                        </select>
                    </div>

                    @if (!is_null($data) &&
                        !is_null(
                            $comodity = DB::table('comodities')->where('id', $data->comodity_id)->first()))

                    <div class="relative  rounded-[25px] overflow-hidden row-span-3">
                        <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                        <img src="{{ asset('img/sawah.jpg') }}" alt="Gambar"
                            class="w-full h-full object-cover rounded-[25px]">

                        <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                        <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-[25px]">
                            <div class="absolute p-3 inset-x-0 bottom-0 text-white">
                                <h2 class="text-2xl font-extrabold  inset-x-0 bottom-0 mb">
                                    {{ $comodity->name }}</h2>
                                <p>Rp{{ number_format($price[$comodity->code]['total'], 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class=" bg-slate-100  rounded-[25px] flex flex-col items-center justify-center row-span-2">
                        <h2 class="text-2xl font-bold">Luas Lahan</h2>
                        <div class="bg-white text-3xl font-bold mt-2 px-4 py-2 rounded-[25px]">{{ $data->wide }} m^2</div>
                    </div>
                    <div class=" bg-slate-100  rounded-[25px] flex flex-col items-center justify-center row-span-2">
                        <h2 class="text-2xl font-bold">Keuntungan saat ini</h2>
                        <div class="bg-white  text-3xl font-bold mt-2 px-4 py-2 rounded-[25px]">Rp.
                            {{ number_format(($price[$comodity->code]['total'] * $data->wide * ($comodity->potential_results_max + $comodity->potential_results_min)) / 2, 0, ',', '.') }}
                        </div>
                    </div>
                    @else
<center>
    Anda tidak punya Rencana tanam

</center>
                    @endif
                    <button class="btn btn-ghost h-full text-2xl normal-case shadow-md" onclick="edit_land.showModal()">Ubah
                        Lahan</button>
                    <a class="btn btn-ghost h-full text-2xl normal-case shadow-md"
                        href="{{ route('planting-planning.index') }}">Jadwalkan Penanaman</a>
                    <button class="btn btn-ghost h-full text-2xl normal-case shadow-md">Keuntungan</button>
                    <div class="shadow-md  rounded-lg flex items-center col-span-2 px-4 py-2">
                        <img src="{{ asset('img/pinpoint.svg') }}" alt="" class="w-4 mr-3">
                        <p class="flex-1">Jl. Pemuda No.39, Embong Kaliasin, Kec. Genteng, Surabaya, Jawa Timur 60271</p>
                    </div>

                </div>

                @else

                Anda tidak punya lahan :(
            @endif


        </div>


    </div>
    @include('components/add-land')
    @include('components/edit-land')
    <br>
    <br>
    <br>
    <br>
    <br>
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
