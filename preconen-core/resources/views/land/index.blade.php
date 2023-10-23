@extends('layouts.base')


@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
@endsection
@section('content')
    <br>
    <br>

    <style>
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
    </style>

    <div class="container">
        <div class="flex w-full gap-5" style="height:65vh">
            <div style="flex: 5;display:flex; flex-direction:column">
                <h1 style="font-size: 48px" class="text-[#495E57] font-bold">Create Land</h1>

                <div class="card mt-10">
                    <div class="p-example__body">
                        <div class="p-example__splide">
                            <div class="splide" id="example-grid">
                                <div class="splide__track">
                                    <ul class="splide__list">

                                        @foreach (DB::table('lands')->get() as $item)
                                            <li class="p-splide__slide splide__slide" style="border-radius: 25px;">
                                                <div style="display: flex;justify-content:center">
                                                    <div class="card card-side flex"
                                                        style="margin-top:10px;height:250px;width:500px; box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25); ">
                                                        <figure style="height: 100%;flex:2; padding:25px"><img
                                                                style="width: 90%;height:100%;border-radius:25px"
                                                                src="{{ asset('img/sawah.jpg') }}" alt="Movie" />
                                                        </figure>
                                                        <div class="card-body" style="flex:1;">

                                                            <center>
                                                                <h2
                                                                    style="color: #495E57;font-size: 24px;font-weight: 800;   ">
                                                                    {{ $item->name }}</h2>

                                                            </center>
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
            </div>
            <div style="flex: 5">
                <br>
                <br>
                <br>
                <br>

                {{-- <div id="main-calendar" class=" flex justify-center justify-items-stretch mt-5"></div> --}}

                <form action="{{ route('land.store') }}" method="post">
                    @csrf
                    <div>
                        <label class="label">
                            <span class="label-text">Nama Lahan</span>
                        </label>
                        <input type="text" name="name" placeholder="Type here" class="input input-bordered w-full " />
                        <label class="label">
                        </label>
                    </div>
                    <div>
                        <label class="label">
                            <span class="label-text">Luas Area</span>
                        </label>
                        <input name="luas"  type="text" placeholder="Type here" class="input input-bordered w-full " />
                        <label class="label">
                        </label>
                    </div>

                    <button class="btn w-100 bg-white ">Submit</button>
                </form>




            </div>

        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    </div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/vendor/splide-4.1.3/dist/js/splide.min.js') }}"></script>

    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            padding: '0rem',
            width: '50rem',
            height: '30rem',
            fixedHeight: '20rem',
            cover: true,
            arrows: false,
            autoplay: true,
            direction: 'ttb',
            repeat: false
        });

        splide.mount();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
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
