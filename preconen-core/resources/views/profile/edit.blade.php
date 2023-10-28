@extends('layouts.base')
@section('content')
    <div class="text-[#495E57]">

        <h2 class="text-5xl font-extrabold mt-6 mb-8 ">Akun Saya</h2>
        <div class="grid grid-rows-2 grid-cols-3 grid-flow-col gap-4 mb-5">
            <div class="col-span-1  flex justify-center items-center flex-col rounded-[25px]"
                style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
                backdrop-filter: blur(2px);">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" alt=""
                    class="h-24 rounded-full mb-2">
                <p class="text-2xl font-bold mb-3">{{ Auth::user()->name }}</p>
                <div class="grid grid-cols-3 h-24">
                    <div class="border-r-2 p-2 flex flex-col justify-center">
                        <p class="font-semibold text-center">Jumlah Lahan</p>

                        <p class="text-2xl text-center font-bold">
                            {{ DB::table('lands')->where('user_id', Auth::user()->id)->count() }}
                        </p>
                    </div>
                    <div class="border-r-2 p-2">
                        <p class="font-semibold text-center">Jenis Komoditas</p>
                        <p class="text-2xl text-center font-bold">
                            {{ DB::table('planting_plannings')->where('planting_plannings.user_id', Auth::user()->id)->join('lands', 'lands.id', '=', 'planting_plannings.land_id')->distinct('comodity_id')->count() }}
                        </p>
                    </div>
                    <div class="p-2 flex flex-col justify-center">
                        <p class="font-semibold text-center">

                            Luas Lahan (m<span class="align-super text-xs">2</span>)
                        </p>
                        <p class="text-2xl text-center font-bold">
                            {{ number_format(DB::table('lands')->where('user_id', Auth::user()->id)->sum('wide'),0,',','.') }}

                        </p>
                    </div>
                </div>
            </div>
            <div class="row-span-2 col-span-1  p-5 rounded-[25px]"
                style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
                backdrop-filter: blur(2px);">
                <h3 class="text-xl mb-3 font-bold">Pengaturan dan Privasi</h3>
                <nav>
                    <ul class="list-none text-lg font-semibold">
                        <li class="border-b mb-1 hover:underline hover:cursor-pointer" onclick="tos.showModal()">Ketentuan
                            Penggunaan</li>
                        <li class="border-b mb-1 hover:underline hover:cursor-pointer" onclick="edit_info.showModal()">Ubah
                            Informasi
                            Akun</li>
                        <li class="border-b mb-1 hover:underline hover:cursor-pointer
                        "
                            onclick="contact_us.showModal()">
                            Kontak Kami</li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf

                            <button type="submit"
                                class="border-b mb-1 hover:underline hover:cursor-pointer w-full text-left ">Logout</button>
                            {{-- <li class="">Log Out</li> --}}
                        </form>
                    </ul>
                </nav>
            </div>
            <div class="row-span-3 col-span-2 p-5 rounded-25px"
                style="box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.25);
                backdrop-filter: blur(2px);">
                <h3 class="text-xl mb-3 font-bold">Profil</h3>
                <nav>
                    <ul class="list-none text-lg font-semibold">
                        <li class="border-b mb-3 ">
                            <p class="text-sm">Nama</p>
                            <p>{{ Auth::user()->name }}</p>
                        </li>
                        <li class="border-b mb-3 ">
                            <p class="text-sm">Alamat Email</p>
                            <p>{{ Auth::user()->email }}</p>
                        </li>
                        <li class="border-b mb-3 ">
                            <p class="text-sm">No. Telepon</p>
                            <p>{{ Auth::user()->phone }}</p>
                        </li>
                        <li class="border-b mb-3 ">
                            <p class="text-sm">Alamat</p>
                            <p class="mb-4">{{ Auth::user()->alamat }}</p>
                            <iframe class="w-4/5 mx-auto aspect-video rounded-lg mb-2" frameborder="0" scrolling="no"
                                marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?q={{ Auth::user()->lat }},{{ Auth::user()->long }}&hl=es;z=14&amp;output=embed">
                            </iframe>
                            <div class="w-4/5 mx-auto">

                                <button onclick="getP()" class="btn bg-[#495E57] text-white w-full mx-auto">Set Lokasi</button>
                            </div>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        @include('profile.tos_modal')
        @include('profile.edit-info')
        @include('profile.contact-us')

    </div>
@endsection


@section('scripts')
    <script>
        function getP() {
            Swal.fire({
                title: 'Set data longitude latitude',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    getLocation();
                    Swal.fire(
                        'Success!',
                        'Longitude latitude anda telah ditetapkan.',
                        'success'
                    )
                }
            })


        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {

            let currentURL = window.location.href;

            let newParameter = `lat=${position.coords.latitude}&long=${position.coords.longitude}`;

            if (currentURL.includes('?')) {
                currentURL = currentURL + '&' + newParameter;
            } else {
                currentURL = currentURL + '?' + newParameter;
            }

            window.location.href = currentURL;
        }
    </script>
@endsection
