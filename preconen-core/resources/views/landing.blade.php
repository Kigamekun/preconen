<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preconen : Prediksi Cuaca dan Komoditas Panen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')

</head>

<body data-theme="light">

    <div class="wrapper">

        <div class="navbar bg-base-100 shadow-md z-20 justify-between max-w-7xl mx-auto">
            <div class="flex-none">
                <img src="{{ asset('img/preconen-logo.svg') }}" alt="" class="h-12">
            </div>

            <div class="flex-none">
                <div class="dropdown dropdown-button dropdown-end">
                    <button class="btn btn-ghost mr-3 normal-case">
                        @if (Auth::check())
                            <p class="mr-2 text-xl">{{ Auth::user()->name }}</p>
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-person-circle text-black" viewBox="0 0 16 16">
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

        @yield('content')
        @include('components.footer')

    </div>

</body>

</html>
