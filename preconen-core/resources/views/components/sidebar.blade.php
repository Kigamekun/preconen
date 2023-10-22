<aside x-bind:class="{ 'w-80 max-w-4xl px-4': open, 'w-0': !open }"
    class="bg-gray-200 h-screen fixed  transition-width duration-300 ease-in-out opacity-100 bg-white z-10 pt-20">
    <!-- Logo atau Nama Aplikasi -->
    <!-- Navigasi Sidebar -->
    @php $active = 'dashboard'; @endphp
    <nav x-show="open" class="">
        <div class="flex items-center">

            <img src="{{ asset('img/preconen-logo.svg') }}" alt="" class="h-20 ml-3 mb-3 mr-3">
            <h1 class="font-extrabold text-4xl mb-3">Preconen</h1>
        </div>
        <ul class="space-y-1">
            <li class="">
                <a href=""
                    class="block py-2 px-3 text-gray-700 flex items-center justify-start pl-4 btn {{ $active == 'dashboard' ? ' bg-[#495E57] text-white' : 'btn-ghost hover:bg-gray-300' }} normal-case text-left">
                    <img class="text-[#495E57] max-h-full"
                        src="{{ asset('img/nav.dashboard' . ($active == 'dashboard' ? '.white' : '') . '.svg') }}"
                        alt="" class=""><span class="ml-3 text-lg ">Beranda</span></a>
            </li>
            <li class="">
                <a href=""
                    class="block py-2 px-3 text-gray-700 flex items-center justify-start pl-4 btn {{ $active == 'schedules' ? ' bg-[#495E57] text-white' : 'btn-ghost hover:bg-gray-300' }} normal-case text-left">
                    <img class="text-[#495E57] max-h-full"
                        src="{{ asset('img/nav.schedule' . ($active == 'schedules' ? '.white' : '') . '.svg') }}"
                        alt="" class=""><span class="ml-3 text-lg ">Jadwal Penanaman</span></a>
            </li>
            <li class="">
                <a href=""
                    class="block py-2 px-3 text-gray-700 flex items-center justify-start pl-4 btn {{ $active == 'supplies' ? ' bg-[#495E57] text-white' : 'btn-ghost hover:bg-gray-300' }} normal-case text-left">
                    <img class="text-[#495E57] max-h-full"
                        src="{{ asset('img/nav.supplies' . ($active == 'supplies' ? '.white' : '') . '.svg') }}"
                        alt="" class=""><span class="ml-3 text-lg ">Suplai Tanaman</span></a>
            </li>
            <li class="">
                <a href=""
                    class="block py-2 px-3 text-gray-700 flex items-center justify-start pl-4 btn {{ $active == 'lands' ? ' bg-[#495E57] text-white' : 'btn-ghost hover:bg-gray-300' }} normal-case text-left">
                    <img class="text-[#495E57] max-h-full"
                        src="{{ asset('img/nav.land' . ($active == 'lands' ? '.white' : '') . '.svg') }}" alt=""
                        class=""><span class="ml-3 text-lg ">Lahan Saya</span></a>
            </li>
            <li class="">
                <a href=""
                    class="block py-2 px-3 text-gray-700 flex items-center justify-start pl-4 btn {{ $active == 'market' ? ' bg-[#495E57] text-white' : 'btn-ghost hover:bg-gray-300' }} normal-case text-left">
                    <img class="text-[#495E57] max-h-full"
                        src="{{ asset('img/nav.market' . ($active == 'market' ? '.white' : '') . '.svg') }}"
                        alt="" class=""><span class="ml-3 text-lg ">Toko</span></a>
            </li>

            <!-- Tambahkan lebih banyak item menu sesuai kebutuhan -->
        </ul>
    </nav>

</aside>
