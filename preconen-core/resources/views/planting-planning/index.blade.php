@extends('layouts.base')


@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
@endsection
@section('content')
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
                {{-- <div>
                    <label class="label">
                        <span class="label-text">Schedule</span>
                    </label>
                    <select class="select select-bordered w-full">
                        <option disabled selected>Pick one</option>
                        <option>Star Wars</option>
                        <option>Harry Potter</option>
                        <option>Lord of the Rings</option>
                        <option>Planet of the Apes</option>
                        <option>Star Trek</option>
                    </select>

                </div> --}}
                <br>
                <br>
                <br>
                <br>
                <div class="card p-5" style="filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25)); ">
                    @if (
                        !is_null(
                            $data))
                        @php
                            $comodity = DB::table('comodities')
                                ->where('id', $data->comodity_id)
                                ->first();
                            $land = DB::table('lands')
                                ->where('id', $data->land_id)
                                ->first();
                        @endphp
                        <h1 style="color: #495E57;text-align: center;font-size: 32px; ">
                            {{ $comodity->name }}</h1>

                        <div class="d-flex gap-3 justify-center mt-5 flex-wrap">
                            <img src="{{ asset('storage/comodities/' . $comodity->thumb) }}"
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
                                    {{ $land->wide }}
                                </div>
                            </div>
                            <div class="card"
                                style="width: 18rem;min-height:170px;padding:20px;filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25));">
                                <h3
                                    style="color: #495E57;
                        text-align: center;
                        font-size: 24px; ">
                                    Date</h3>
                                <div class="card"
                                    style="width: 90%;color: #495E57;
                        text-align: center;min-height:50px;
                        font-size: 24px;margin:auto;line-height: 50px;">
                                    -
                                </div>
                            </div>
                            <div class="flex" style="flex-direction:column;gap:20px; width: 18rem;min-height:170px;">
                                <button class="btn w-100"
                                    style="flex:1; background:white;color: #495E57;
                        text-align: center;min-height:50px;
                        font-size: 24px;margin:auto;line-height: 50px;filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25));">
                                    Pasar
                                </button>
                                <form action="{{ route('planting-planning.delete', ['id'=>$data->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn w-100"
                                    style="flex:1;background:white;color: #495E57;
                        text-align: center;min-height:50px;
                        font-size: 24px;margin:auto;line-height: 50px;filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25));">
                                    Hapus
                                </button>
                                </form>

                            </div>
                        </div>
                    @else
                        Anda tidak memiliki rencana tanam :(
                    @endif
                </div>
                <div class="flex mt-7" style="gap:20px; width: 100%;">
                    <a href="{{ route('land.index') }}" class="btn"
                        style="flex:1; background:white;color: #495E57;
                text-align: center;
                font-size: 24px;margin:auto;filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25));">
                        Lihat Lahanmu
                    </a>
                    <a href="{{ route('planting-planning.create') }}" class="btn"
                        style="flex:1;background:white;color: #495E57;
                text-align: center;
                font-size: 24px;margin:auto;filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25));">
                        Tambah Jadwal
                    </a>
                </div>
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
        <br>
        <br>
        <br>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <script>
        const calendarData = @json($calendar);

        new Calendar({
            id: '#main-calendar',
            layoutModifiers: ['month-align-left'],
            eventsData: calendarData,
            calendarSize: "large",
        })
    </script>
@endsection
