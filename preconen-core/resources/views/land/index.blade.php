@extends('layouts.base')


@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
@endsection
@section('content')
    <div class="mt-10 mb-40 min-w-full">
        <h1 class="text-[#495E57] text-5xl font-extrabold">Lahan Saya</h1>
        <div class="text-sm breadcrumbs mb-8">
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>Lahan Saya</li>
            </ul>
        </div>
        <div class="grid grid-cols-2 gap-5">
            @if (!is_null(DB::table('lands')->where('user_id', Auth::id())->first()))
                @foreach ($data as $item)
                    <div class="card card-side bg-base-100 shadow-xl">
                        <figure class="w-72"><img src="{{ asset('img/sawah.jpg') }}" alt="Movie" class="h-full" />
                        </figure>
                        <div class="card-body">

                            <h2 class="card-title">{{ $item->name }}</h2>

                            <div class="flex items-center">
                                <div>
                                    <span class="font-semibold mr-1">Luas Lahan :</span> {{ $item->wide }}m<span
                                        class="align-super">2</span>
                                </div>
                            </div>
                            <div class="card-actions self-end justify-end">
                                <a class="btn bg-[#495E57] text-sm text-white "
                                    href="{{ route('land.index') . '/' . $item->id }}">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class=" col-span-2 mx-auto">

                    <button class="btn btn-outline text-2xl mt-2 h-16 max-w-xl hover:bg-[#495E57] normal-case px-20"
                        onclick="add_land.showModal()">+ Tambahkan
                        Lahan</button>
                </div>
            @else
                <div class="h-[100] col-span-2">

                    <div class=" flex items-center flex-col min-h-full justify-center">
                        <img src="{{ asset('img/no-land.svg') }}" alt="" class="mb-5">
                        <button class="btn btn-outline text-2xl mt-2 h-16 max-w-lg hover:bg-[#495E57] normal-case"
                            onclick="add_land.showModal()">+ Tambahkan
                            Lahan</button>
                    </div>
                </div>
            @endif
        </div>
        @include('components/add-land')
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
