@extends('layouts.base')
@section('content')
    <div class="mx-auto mt-10 mb-10 text-[#495E57]">
        <h2 class="text-5xl font-extrabold mt-6">Suplai Komoditas</h2>
        <div class="text breadcrumbs mb-8">
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('land.index') }}">Suplai Komoditas</a></li>

            </ul>

        </div>
        <h3 class="text-2xl font-bold mb-5">Paling Banyak ditanam</h3>
        <div class="grid-cols-4 grid gap-5 mb-10">
            <div class="relative min-w-48 rounded-lg overflow-hidden">
                <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                <img src="{{ asset('storage/comodities/' . 'jagung.jpg') }}" alt="Gambar"
                    class="w-full h-full object-cover rounded-lg">

                <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                    <div class="absolute p-3 inset-x-0 bottom-0">
                        <p class="text-xl font-extrabold text-white inset-x-0 bottom-0 mb">
                            Jagung</p>
                        <p class="text-md font-bold text-white">Lahan ditanami : 48200m<span
                                class="align-super text-sm">2</span>
                        </p>
                        <p class="text-md font-bold text-white">Potensi Hasil : 1500 ton<span
                                class="align-super text-sm">2</span>
                        </p>
                        <p class="text-md font-bold text-white">
                            Harga per kg Rp.{{ number_format(25000, 0, ',', '.') }}
                        </p>
                    </div>

                </div>
            </div>
            <div class="relative min-w-48 rounded-lg overflow-hidden">
                <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                <img src="{{ asset('storage/comodities/' . 'jagung.jpg') }}" alt="Gambar"
                    class="w-full h-full object-cover rounded-lg">

                <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                    <div class="absolute p-3 inset-x-0 bottom-0">
                        <p class="text-xl font-extrabold text-white inset-x-0 bottom-0 mb">
                            Jagung</p>
                        <p class="text-md font-bold text-white">Lahan ditanami : 48200m<span
                                class="align-super text-sm">2</span>
                        </p>
                        <p class="text-md font-bold text-white">Potensi Hasil : 1500 ton<span
                                class="align-super text-sm">2</span>
                        </p>
                        <p class="text-md font-bold text-white">
                            Harga per kg Rp.{{ number_format(25000, 0, ',', '.') }}
                        </p>
                    </div>

                </div>
            </div>
            <div class="relative min-w-48 rounded-lg overflow-hidden">
                <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                <img src="{{ asset('storage/comodities/' . 'jagung.jpg') }}" alt="Gambar"
                    class="w-full h-full object-cover rounded-lg">

                <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                    <div class="absolute p-3 inset-x-0 bottom-0">
                        <p class="text-xl font-extrabold text-white inset-x-0 bottom-0 mb">
                            Jagung</p>
                        <p class="text-md font-bold text-white">Lahan ditanami : 48200m<span
                                class="align-super text-sm">2</span>
                        </p>
                        <p class="text-md font-bold text-white">Potensi Hasil : 1500 ton<span
                                class="align-super text-sm">2</span>
                        </p>
                        <p class="text-md font-bold text-white">
                            Harga per kg Rp.{{ number_format(25000, 0, ',', '.') }}
                        </p>
                    </div>

                </div>
            </div>
            <div class="relative min-w-48 rounded-lg overflow-hidden">
                <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                <img src="{{ asset('storage/comodities/' . 'jagung.jpg') }}" alt="Gambar"
                    class="w-full h-full object-cover rounded-lg">

                <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                    <div class="absolute p-3 inset-x-0 bottom-0">
                        <p class="text-xl font-extrabold text-white inset-x-0 bottom-0 mb">
                            Jagung</p>
                        <p class="text-md font-bold text-white">Lahan ditanami : 48200m<span
                                class="align-super text-sm">2</span>
                        </p>
                        <p class="text-md font-bold text-white">Potensi Hasil : 1500 ton
                        </p>
                        <p class="text-md font-bold text-white">
                            Harga per kg Rp.{{ number_format(25000, 0, ',', '.') }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <h3 class="text-2xl font-bold mb-5">Penanaman di lahan lain</h3>
        <div class="grid-cols-4 grid gap-5 mb-10">
            @for ($i = 0; $i < 70; $i++)
                <div class="relative min-w-48 rounded-lg overflow-hidden">
                    <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                    <img src="{{ asset('storage/comodities/' . 'jagung.jpg') }}" alt="Gambar"
                        class="w-full h-full object-cover rounded-lg">

                    <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                    <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-lg">
                        <div class="absolute p-3 inset-x-0 bottom-0">
                            <p class="text-xl font-extrabold text-white inset-x-0 bottom-0 mb">
                                Jagung</p>
                            <p class="text-md font-bold text-white">Lahan : Lahan Pak Tarno
                            </p>
                            <p class="text-md font-bold text-white">Potensi Hasil : 1500 ton
                            </p>
                            <p class="text-md font-bold text-white">Perkiraaan tanggal panen : 12-12-23
                            </p>

                        </div>

                    </div>
                </div>
            @endfor

        </div>
    @endsection
