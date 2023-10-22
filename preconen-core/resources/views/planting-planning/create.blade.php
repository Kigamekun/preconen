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
            <div style="flex: 5;display:flex; flex-direction:column">
                <h1 style="font-size: 48px" class="text-[#495E57] font-bold">Create Planting Schedule</h1>

                <div class="card mt-10">

                    <div class="card-body" style="position: relative;">
                        <div>
                            <label class="label">
                                <span class="label-text">Nama Lahan</span>
                            </label>
                            <input type="text" placeholder="Type here" class="input input-bordered w-full " />
                            <label class="label">
                            </label>
                        </div>
                        <div>
                            <label class="label">
                                <span class="label-text">Luas Area</span>
                            </label>
                            <input type="text" placeholder="Type here" class="input input-bordered w-full " />
                            <label class="label">
                            </label>
                        </div>
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
                        <div>
                            <label class="label">
                                <span class="label-text">Mulai</span>
                            </label>
                            <input type="date" placeholder="Type here" class="input input-bordered w-full " />
                            <label class="label">
                            </label>
                        </div>

                        <div>
                            <label class="label">
                                <span class="label-text">Panen</span>
                            </label>
                            <input type="date" placeholder="Type here" class="input input-bordered w-full " />
                            <label class="label">
                            </label>
                        </div>
<br>
                        <button class="btn w-100 bg-white ">Submit</button>

                    </div>
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
                                    <li class="p-splide__slide splide__slide" style="border-radius: 25px;">
                                        <div style="display: flex;justify-content:center">
                                            <div class="card card-side flex" style="margin-top:10px;height:250px;width:500px; box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25); ">
                                                <figure style="height: 100%;flex:2; padding:25px"><img style="width: 90%;height:100%;border-radius:25px" src="{{ asset('storage/comodities/wortel.jpg') }}"
                                                    alt="Movie" /></figure>
                                                <div class="card-body" style="flex:1;">

                                                    <center> <h2 style="color: #495E57;font-size: 24px;font-weight: 800;   ">Wortel</h2>
                                                        <p style="color: #495E57;font-size: 15px;" class="mb-2">Potensi Panen</p>
                                                        <div  style="color: #495E57;position: absolute;bottom: -50px;
                                                        right: 30px;font-size: 40px;font-weight: 800;margin:auto; display:flex;justify-content:center;align-items:center; filter: drop-shadow(0px 0px 4px rgba(0, 0, 0, 0.25));background: white;border-radius:50%;height:7.5rem;width:7.5rem">
                                                                83%
                                                        </div></center>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="p-splide__slide splide__slide" style="border-radius: 25px;">
                                        <div style="display: flex;justify-content:center">
                                            <div class="card card-side flex" style="margin-top:10px;height:250px;width:500px; box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25); ">
                                                <figure style="height: 100%;flex:2; padding:25px"><img style="width: 90%;height:100%;border-radius:25px" src="{{ asset('storage/comodities/cabebesar.svg') }}"
                                                    alt="Movie" /></figure>
                                                <div class="card-body" style="flex:1;">

                                                    <center> <h2 style="color: #495E57;font-size: 24px;font-weight: 800;   ">Cabe Merah Besar</h2>
                                                        <p style="color: #495E57;font-size: 15px;" class="mb-2">Potensi Panen</p>
                                                        <div  style="color: #495E57;position: absolute;bottom: -50px;
                                                        right: 30px; font-size: 40px;font-weight: 800;margin:auto; display:flex;justify-content:center;align-items:center; filter: drop-shadow(0px 0px 4px rgba(0, 0, 0, 0.25));background: white;border-radius:50%;height:7.5rem;width:7.5rem">
                                                                83%
                                                        </div></center>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="p-splide__slide splide__slide" style="border-radius: 25px;">
                                        <div style="display: flex;justify-content:center">
                                            <div class="card card-side flex" style="margin-top:10px;height:250px;width:500px; box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25); ">
                                                <figure style="height: 100%;flex:2; padding:25px"><img style="width: 90%;height:100%;border-radius:25px" src="{{ asset('storage/comodities/jagung.svg') }}"
                                                    alt="Movie" /></figure>
                                                <div class="card-body" style="flex:1;">

                                                    <center> <h2 style="color: #495E57;font-size: 24px;font-weight: 800;   ">Jagung</h2>
                                                        <p style="color: #495E57;font-size: 15px;" class="mb-2">Potensi Panen</p>
                                                        <div  style="color: #495E57;position: absolute;bottom: -50px;
                                                        right: 30px;font-size: 40px;font-weight: 800;margin:auto; display:flex;justify-content:center;align-items:center; filter: drop-shadow(0px 0px 4px rgba(0, 0, 0, 0.25));background: white;border-radius:50%;height:7.5rem;width:7.5rem">
                                                                83%
                                                        </div></center>
                                                </div>
                                            </div>
                                        </div>

                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-calendar"  class=" flex justify-center justify-items-stretch mt-5"></div>



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
            height:'20rem',
            cover: true,
            arrows:false,
            autoplay:true
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
