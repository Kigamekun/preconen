<aside class="flex  flex-col text-white bg-[#495E57] transition-all duration-300 ease-in-out min-h-screen"
    :class="isSidebarExpanded ? 'w-64 min-w-[15%]' : 'w-20'">
    <div class="sticky top-0">

        @php $active = 'dashboard'; @endphp
        <a href="#"
            class="h-20 flex items-center px-4 hover:text-gray-100 hover:bg-opacity-50 focus:outline-none focus:text-gray-100 focus:bg-opacity-50 overflow-hidden p-2">
            <img src="{{ asset('img/preconen-logo.svg') }}" alt="" class="max-h-full">
            <span class="ml-2  duration-300 ease-in-out font-semibold text-3xl"
                :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Preconen</span>
        </a>
        <nav class="p-4 space-y-2 font-medium">
            <a href="{{ route('dashboard') }}"
                class="flex items-center h-10 px-3  rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline  {{ $active == 'dashboard' ? 'text-[#495E57] bg-white' : 'text-white bg-[#495E57] hover:bg-white hover:bg-opacity-75' }}">
                <img class=" max-h-full aspect-square" :class="isSidebarExpanded ? 'p-1' : ''"
                    src="{{ asset('img/nav.dashboard' . ($active == 'dashboard' ? '' : '.white') . '.svg') }}"
                    alt="" class="">
                <span class="ml-2 duration-300 ease-in-out text-lg text-inherit"
                    :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Beranda</span>
            </a>
            <a href="{{ route('planting-planning.index') }}"
                class="flex items-center h-10 px-3  rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline  {{ $active == 'schedules' ? 'text-[#495E57] bg-white' : 'text-white bg-[#495E57] hover:bg-white hover:bg-opacity-75' }}">
                <img class=" max-h-full aspect-square" :class="isSidebarExpanded ? 'p-1' : ''"
                    src="{{ asset('img/nav.schedules' . ($active == 'schedules' ? '' : '.white') . '.svg') }}"
                    alt="" class="">
                <span class="ml-2 duration-300 ease-in-out text-lg"
                    :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Jadwal</span>
            </a>
            <a href="{{ route('supplies.index') }}"
                class="flex items-center h-10 px-3  rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline  {{ $active == 'supplies' ? 'text-[#495E57] bg-white' : 'text-white bg-[#495E57] hover:bg-white hover:bg-opacity-75' }}">
                <img class=" max-h-full aspect-square" :class="isSidebarExpanded ? 'p-1' : ''"
                    src="{{ asset('img/nav.supplies' . ($active == 'supplies' ? '' : '.white') . '.svg') }}"
                    alt="" class="">
                <span class="ml-2 duration-300 ease-in-out text-lg"
                    :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Suplai</span>
            </a>
            <a href="{{ route('land.index') }}"
                class="flex items-center h-10 px-3  rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline  {{ $active == 'lands' ? 'text-[#495E57] bg-white' : 'text-white bg-[#495E57] hover:bg-white hover:bg-opacity-75' }}">
                <img class=" max-h-full aspect-square" :class="isSidebarExpanded ? 'p-1' : ''"
                    src="{{ asset('img/nav.lands' . ($active == 'lands' ? '' : '.white') . '.svg') }}" alt=""
                    class="">
                <span class="ml-2 duration-300 ease-in-out text-lg"
                    :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Lahan</span>
            </a>
            <a href="#"
                class="flex items-center h-10 px-3  rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline  {{ $active == 'market' ? 'text-[#495E57] bg-white' : 'text-white bg-[#495E57] hover:bg-white hover:bg-opacity-75' }}">
                <img class=" max-h-full aspect-square" :class="isSidebarExpanded ? 'p-1' : ''"
                    src="{{ asset('img/nav.market' . ($active == 'market' ? '' : '.white') . '.svg') }}" alt=""
                    class="">
                <span class="ml-2 duration-300 ease-in-out text-lg"
                    :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Toko</span>
            </a>
        </nav>
    </div>

</aside>
