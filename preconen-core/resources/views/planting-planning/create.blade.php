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
                <h1 style="font-size: 48px" class="text-[#495E57] font-bold">Create Planting Schedule</h1>

                <div class="card mt-10">

                    <form action="{{ route('planting-planning.store') }}" method="post">
                        @csrf
                        <div class="card-body" style="position: relative;">
                            {{-- <div>
                                <label class="label">
                                    <span class="label-text">Nama Lahan</span>
                                </label>
                                <input type="text" placeholder="Type here" class="input input-bordered w-full " />
                                <label class="label">
                                </label>
                            </div> --}}
                            <div>
                                <label class="label">
                                    <span class="label-text">Lahan</span>
                                </label>
                                <select name="land" class="select select-bordered w-full">
                                    <option disabled selected>Pilih Lahan</option>
                                    @foreach (DB::table('lands')->get() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div>
                                <label class="label">
                                    <span class="label-text">Komoditas</span>
                                </label>
                                <select id="comodity" name="comodity" class="select select-bordered w-full">
                                    <option disabled selected>Pilih Komoditas</option>
                                    @foreach (DB::table('comodities')->get() as $item)
                                        <option value="{{$item->id}}" data-lama="{{ $item->umur_panen }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div>
                                <label class="label">
                                    <span class="label-text">Mulai</span>
                                </label>
                                <input type="date" name="mulai" id="mulai" placeholder="Type here"
                                    class="input input-bordered w-full " />
                                <label class="label">
                                </label>
                            </div>

                            <div>
                                <label class="label">
                                    <span class="label-text">Panen</span>
                                </label>
                                <input type="date" name="akhir" id="panen" readonly placeholder="Type here"
                                    class="input input-bordered w-full " />
                                <label class="label">
                                </label>
                            </div>
                            <br>
                            <button class="btn w-100 bg-white ">Submit</button>

                        </div>
                    </form>

                </div>
            </div>
            <div style="flex: 5">
                <br>
                <br>
                <br>
                <br>
                <div class="p-example__body">
                    <div class="p-example__splide">
                        <div class="splide" id="example-grid">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($commodities as $key => $item)
                                        <li class="p-splide__slide splide__slide" style="border-radius: 25px;">
                                            <div style="display: flex;justify-content:center">
                                                <div class="card card-side flex"
                                                    style="margin-top:10px;height:250px;width:500px; box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25); ">
                                                    <figure style="height: 100%;flex:2; padding:25px"><img
                                                            style="width: 90%;height:100%;border-radius:25px"
                                                            src="{{ asset('storage/comodities/' .DB::table('comodities')->where('name', 'LIKE', '%' . $item . '%')->first()->thumb) }}"
                                                            alt="Movie" />
                                                    </figure>
                                                    <div class="card-body" style="flex:1;">

                                                        <center>
                                                            <h2 style="color: #495E57;font-size: 24px;font-weight: 800;   ">
                                                                {{ $item }}</h2>
                                                            <p style="color: #495E57;font-size: 15px;" class="mb-2">
                                                                Potensi
                                                                Panen</p>
                                                            <div
                                                                style="color: #495E57;position: absolute;bottom: -50px;
                                                        right: 30px;font-size: 40px;font-weight: 800;margin:auto; display:flex;justify-content:center;align-items:center; filter: drop-shadow(0px 0px 4px rgba(0, 0, 0, 0.25));background: white;border-radius:50%;height:7.5rem;width:7.5rem">
                                                                {{ ceil($data['probabilities'][$key] * 100) }}%
                                                            </div>
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
                <div id="main-calendar" class=" flex justify-center justify-items-stretch mt-5"></div>



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
            padding: '8rem',
            width: '50rem',
            height: '20rem',
            cover: true,
            arrows: false,
            autoplay: true
        });

        splide.mount();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <script>
        const calendarEvents = [
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


        $("#mulai").change(function() {
            var element = $('#comodity').find('option:selected');
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
