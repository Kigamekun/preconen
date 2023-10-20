<aside x-bind:class="{ 'w-1/5': open, 'w-0': !open }"
    class="bg-gray-200 h-screen fixed  transition-width duration-300 ease-in-out">
    <!-- Logo atau Nama Aplikasi -->
    <!-- Navigasi Sidebar -->
    {{ $active = 'home' }}
    <nav x-show="open" class="mt-16">
        <ul class="space-y-1">
            <li
                class="flex items-center justify-start pl-4  btn {{ $active == 'home' ? 'btn-neutral btn-disabled' : 'btn-ghost hover:bg-gray-300' }} normal-case text-left">
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

<!-- Tombol untuk meng-collapse/expand sidebar -->
{{-- <div class="fixed right-0 top-0 m-4 cursor-pointer">
        <button class="text-gray-600 focus:outline-none">
            <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
            <svg x-show="open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div> --}}
