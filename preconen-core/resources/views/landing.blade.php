@extends('layouts.base')
@section('styles')
    <script src="https://cdn.jsdelivr.net/npm/simple-jscalendar@1.4.4/source/jsCalendar.min.js"
        integrity="sha384-0LaRLH/U5g8eCAwewLGQRyC/O+g0kXh8P+5pWpzijxwYczD3nKETIqUyhuA8B/UB" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-jscalendar@1.4.4/source/jsCalendar.min.css"
        integrity="sha384-44GnAqZy9yUojzFPjdcUpP822DGm1ebORKY8pe6TkHuqJ038FANyfBYBpRvw8O9w" crossorigin="anonymous">
@stop
@section('content')

    <nav>
        <div class="navbar bg-[#353933] ">
            <div class="navbar-start">
                <div class="flex-none px-3 items-center">
                    <a class="btn btn-ghost normal-case text-xl drop-shadow-glow h-20"><img
                            src={{ asset('img/preconen-logo.svg') }} alt="" class="max-h-full"></a>
                    <div class="dropdown dropdown-bottom">
                        <button class="btn bg-white px-2 h-14 w-24">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16">
                                </path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        </button>
                        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a class="font-semibold">Dashboard</a></li>
                            <li><a class="font-semibold">Temperature</a></li>
                            <li><a class="font-semibold">Analysis</a></li>
                            <li><a class="font-semibold">Marketplace</a></li>
                            <li><a class="font-semibold">Settings</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex-1">
            </div>
            @php($authenticated = true)
            <div class="flex-none">
                <div class="dropdown dropdown-button">
                    <button class="btn btn-ghost mr-3 normal-case">
                        @if ($authenticated)
                            <p class="mr-2 text-white text-xl">Lorem Ipsum</p>
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-person-circle text-white" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </button>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a class="font-semibold">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="grid grid-cols-2 gap-4 m-3 ">
        <div class="bg-[#353933] h-96 rounded-lg opacity-80 border-4">
            <div class="auto-jsCalendar"></div>
        </div>
        <div class="bg-[#353933] h-72 rounded-lg opacity-80 border-4"></div>

    </div>
@stop
