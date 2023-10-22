@extends('layouts.base')


@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
@endsection
@section('content')
    <br>


    <br>
    <br>
    <br>
    <div class="container">
        <div class="flex w-full gap-5" style="height:65vh">
            <div style="flex: 5;display:flex; flex-direction:column;">
                <div>
                    <br>
                    <br>
                <h1 style="font-size: 48px" class="text-[#495E57] font-bold">Planting Schedule</h1>

                    <br>
                    <br>
                    <div style="border-radius: 25px"
                        class=" opacity-80 border-2 border-neutral-400/50  py-3 col-span-2 row-span-3"
                        style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
                backdrop-filter: blur(2px);">
                        <div class="cuaca h-42 p-4 pb-0 flex flex-row justify-center items-center">
                            <div class="h-36 w-36 mx-3">@include('icons/cerah-berawan')</div>
                            <div class="kanan flex flex-col pb-3 text-[#495E57]">
                                <span class="text-3xl font-bold">23&#xb0;C</span>
                                <span class="text-lg">Cerah</span>
                                <span class="text-lg">Bogor, Indonesia</span>

                            </div>
                        </div>
                        <div id="main-calendar" class="flex justify-center justify-items-stretch"></div>
                    </div>
                </div>
            </div>
            <div style="flex: 5">
                <br>
                <div>
                    <label class="label">
                        <span class="label-text">Komoditas</span>
                    </label>
                    <select class="select select-bordered w-full">
                        <option disabled selected>Pick one</option>
                        <option>Star Wars</option>
                        <option>Harry Potter</option>
                        <option>Lord of the Rings</option>
                        <option>Planet of the Apes</option>
                        <option>Star Trek</option>
                    </select>

                </div>
                <br>
                <br>
                <div class="card p-5" style="filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25)); ">
                    <h3>Wortel</h3>

                    <div class="d-flex gap-3 justify-center mt-5 flex-wrap">
                        <img src="{{ asset('storage/comodities/cabebesar.svg') }}"
                            style="width: 18rem;min-height:170px;border-radius: 25px" alt="">
                        <div class="card"
                            style="width: 18rem;min-height:170px;padding:20px;filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25));">
                            <h3
                                style="color: #495E57;
                            text-align: center;
                            font-size: 24px; ">
                                Land Area</h3>
                            <div class="card"
                                style="width: 90%;color: #495E57;
                            text-align: center;min-height:50px;
                            font-size: 24px;margin:auto;line-height: 50px;">
                                20M
                            </div>
                        </div>
                        <div class="card"
                            style="width: 18rem;min-height:170px;padding:20px;filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25));">
                            <h3
                                style="color: #495E57;
                        text-align: center;
                        font-size: 24px; ">
                                Supplies</h3>
                            <div class="card"
                                style="width: 90%;color: #495E57;
                        text-align: center;min-height:50px;
                        font-size: 24px;margin:auto;line-height: 50px;">
                                20.550
                            </div>
                        </div>
                        <div class="flex" style="flex-direction:column;gap:20px; width: 18rem;min-height:170px;">
                            <button class="btn w-100"
                                style="flex:1; background:white;color: #495E57;
                        text-align: center;min-height:50px;
                        font-size: 24px;margin:auto;line-height: 50px;filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25));">
                                Marketplace
                            </button>
                            <button class="btn w-100"
                                style="flex:1;background:white;color: #495E57;
                        text-align: center;min-height:50px;
                        font-size: 24px;margin:auto;line-height: 50px;filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25));">
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex mt-7" style="gap:20px; width: 100%;">
                    <button class="btn"
                        style="flex:1; background:white;color: #495E57;
                text-align: center;
                font-size: 24px;margin:auto;filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25));">
                        Marketplace
                    </button>
                    <button class="btn"
                        style="flex:1;background:white;color: #495E57;
                text-align: center;
                font-size: 24px;margin:auto;filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25));">
                        Remove
                    </button>
                </div>
            </div>

        </div>
        <br>
        <br>

    </div>



    <script src="assets/vendor/splide-4.1.3/dist/js/splide.min.js"></script>

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
    </script>
@endsection
