@extends('layouts.base')


@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
@endsection
@section('content')
    <div class=" m-auto mt-10 ">
        <h1 style="font-size: 48px" class="text-[#495E57] font-bold">Rencana Tanam</h1>
        <div class="text-sm breadcrumbs mb-8">
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>Rencana Tanam</li>
            </ul>
        </div>
        <div class="flex w-100 mt-5">
            <div style="flex:4;">
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

            <div style="flex:5;" class="px-5">
                @if (!is_null($data))
                    @php
                        $comodity = DB::table('comodities')
                            ->where('id', $data->comodity_id)
                            ->first();
                        $land = DB::table('lands')
                            ->where('id', $data->land_id)
                            ->first();
                    @endphp
                    {{--
                    <select id="comodity" name="comodity" class="select select-bordered w-full">
                        <option disabled selected>Pilih Komoditas</option>
                        @foreach (DB::table('planting_plannings')->where('user_id', Auth::id())->get() as $item)
                            <option value="{{ $item->comodity_id }}">
                                {{ DB::table('comodities')->where('id', $item->comodity_id)->pluck('name')->first() }}
                            </option>
                        @endforeach
                    </select>
                    --}}
                    <div class=" card w-100  bg-base-100 shadow-xl"
                        style="filter: drop-shadow(0px 0px 12px rgba(0, 0, 0, 0.25));">
                        <div class="card-body">
                            <center>
                                <h2
                                    style="color: #495E57;text-align: center;font-size: 42px;font-style: normal;font-weight: 600;line-height: normal;letter-spacing: 3.2px;
                        ">
                                    {{ $comodity->name }}</h2>
                            </center>
                            <div class="flex gap-5 justify-center flex-wrap mt-5">
                                <div class="card w-80 ">
                                    <img src="{{ asset('storage/comodities/' . $comodity->thumb) }}"
                                        style="border-radius: 25px" alt="">
                                </div>
                                <div class="card w-80 bg-base-100 shadow-xl"
                                    style="filter: drop-shadow(0px 0px 6px rgba(0, 0, 0, 0.15));">
                                    <div class="card-body">
                                        <h2
                                            style="color: #495E57;text-align: center;font-size: 24px;font-style: normal;font-weight: 600;line-height: normal;letter-spacing: 2.4px;">
                                            Tanggal Tanam</h2>
                                        <br>
                                        <p
                                            style="color: #495E57;text-align: center;font-size: 18px;font-style: normal;font-weight: 500;line-height: normal;letter-spacing: 2.4px;">
                                            {{ $data->start_from }}</p>
                                        <p
                                            style="color: #495E57;text-align: center;font-size: 18px;font-style: normal;font-weight: 500;line-height: normal;letter-spacing: 2.4px;">
                                            s.d</p>
                                        <p
                                            style="color: #495E57;text-align: center;font-size: 18px;font-style: normal;font-weight: 500;line-height: normal;letter-spacing: 2.4px;">
                                            {{ $data->end_at }}</p>

                                    </div>
                                </div>
                                <div class="card w-80 bg-base-100 shadow-xl"
                                    style="filter: drop-shadow(0px 0px 6px rgba(0, 0, 0, 0.15));">
                                    <div class="card-body">
                                        <h2
                                            style="color: #495E57;text-align: center;font-size: 24px;font-style: normal;font-weight: 600;line-height: normal;letter-spacing: 2.4px;">
                                            Land Area</h2>
                                        <p
                                            style="color: #495E57;text-align: center;font-size: 24px;font-style: normal;font-weight: 500;line-height: normal;letter-spacing: 2.4px;">
                                            {{   number_format($land->wide, 0, ',', '.') }} m<span
                                            class="align-super">2</span></p>
                                    </div>
                                </div>
                                <div class="w-80">
                                    <button class="btn w-full"
                                        style=" background:white;color: #495E57;
                    text-align: center;min-height:50px;
                    font-size: 24px;margin:auto;line-height: 50px;filter: drop-shadow(0px 0px 6px rgba(0, 0, 0, 0.15));">
                                        Pasar
                                    </button>
                                    <form class="mt-4"
                                        action="{{ route('planting-planning.delete', ['id' => $data->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn w-full"
                                            style=" background:white;color: #495E57;
                    text-align: center;min-height:50px;
                    font-size: 24px;margin:auto;line-height: 50px;filter: drop-shadow(0px 0px 6px rgba(0, 0, 0, 0.15));">
                                            Hapus
                                        </button>
                                </div>

                            </div>

                        </div>

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
        @else
            <center>
                Anda tidak memiliki rencana tanam :(
            </center>
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
            @endif

        </div>
    </div>



    <script>
        const calendarData = @json($calendar);

        console.log(calendarData);
        new Calendar({
            id: '#main-calendar',
            layoutModifiers: ['month-align-left'],
            eventsData: calendarData,
            calendarSize: "large",
        })
    </script>
@endsection
