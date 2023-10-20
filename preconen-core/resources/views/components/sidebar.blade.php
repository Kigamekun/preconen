<aside x-bind:class="{ 'w-1/5': open, 'w-0': !open }"
    class="bg-gray-200 h-screen fixed  transition-width duration-300 ease-in-out opacity-100 bg-white z-10">
    <!-- Logo atau Nama Aplikasi -->
    <!-- Navigasi Sidebar -->
    @php $active = 'home'; @endphp
    <nav x-show="open" class="mt-16">
        <ul class="space-y-1">
            <li
                class="flex items-center justify-start pl-4 btn {{ $active == 'home' ? 'btn-neutral btn-disabled' : 'btn-ghost hover:bg-gray-300' }} normal-case text-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-house-door-fill text-black" viewBox="0 0 16 16">
                    <path
                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                </svg>
                <a href="#" class="block py-2 px-3 text-gray-700 ">Beranda</a>
            </li>
            <li class="flex items-center justify-start pl-4 hover:bg-gray-300 btn btn-ghost normal-case text-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-house-door-fill text-black" viewBox="0 0 16 16">
                    <path
                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                </svg>
                <a href="#" class="block py-2 px-3 text-gray-700 ">Produk</a>
            </li>
            <li class="flex items-center justify-start pl-4 hover:bg-gray-300 btn btn-ghost normal-case text-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-house-door-fill text-black" viewBox="0 0 16 16">
                    <path
                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                </svg>
                <a href="#" class="block py-2 px-3 text-gray-700 ">Kontak</a>
            </li>
            <!-- Tambahkan lebih banyak item menu sesuai kebutuhan -->
        </ul>
    </nav>

</aside>
