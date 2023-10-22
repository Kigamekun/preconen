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

    <div class="wrapper max-w-7xl mx-auto">

        <div class="navbar bg-base-100 z-20 justify-between max-w-7xl mx-auto">
            <div class="flex-none">
                <img src="{{ asset('img/preconen-logo.svg') }}" alt="" class="h-12">
            </div>

            <div class="flex-none">
                <button class="btn btn-ghost shadow-lg mr-3 normal-case text-xl py-1">
                    Login
                </button>
            </div>
        </div>

        <div class="jumbotron relative mb-4">
            <img src="{{ asset('img/jumbotron.bg.png') }}" alt="" class="w-full">
            <div class="absolute inset-0 text-white p-12">
                <div class="flex justify-center items-start h-full flex-wrap flex-col">
                    <h2 class="text-5xl font-semibold mb-4 drop-shadow-md">Prediksi Cuaca <br>dan Komoditas Panen</h2>
                    <a href="{{ route('register') }} "
                        class="btn px-7 py-4 text-4xl h-min bg-[#495E57] bg-opacity-75 text-white normal-case font-bold border-0 hover:text-slate-500">Join
                        Now</a>
                </div>
            </div>
        </div>

        <section class="flex items-center max-h-96 mb-5">
            <img src="{{ 'img/landing.petani1.png' }}" class="w-2/5 m-4 scale-75" alt="">
            <div
                class="w-3/5 bg-[#495E57] h-72 mx-4 rounded-[20px] p-5 shadow-xl drop-shadow-lg bg-opacity-75 text-white mb-4">
                <h2 class="text-3xl mb-3">Apa itu Preconen?</h2>
                <p class="text-lg">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius dolorum esse et cumque
                    magnam rerum, debitis, perferendis quibusdam id quasi voluptatum nemo asperiores modi pariatur,
                    officia libero adipisci consequuntur corporis voluptates eaque. Recusandae obcaecati consequuntur
                    possimus, debitis quo eaque iste nesciunt necessitatibus quam et iure cum doloremque fugit nemo
                    distinctio, perspiciatis quae odit impedit ea incidunt quos dignissimos laborum.</p>

            </div>
        </section>
        <section class="flex items-center max-h-96 mb-5">
            <div
                class="w-3/5 bg-white h-72 mx-4 rounded-[20px] p-5 shadow-2xl drop-shadow-lg bg-opacity-75 text-[#495E57] mb-4">
                <h2 class="text-3xl mb-3">Kenapa Harus Preconen?</h2>
                <p class="text-lg">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius dolorum esse et cumque
                    magnam rerum, debitis, perferendis quibusdam id quasi voluptatum nemo asperiores modi pariatur,
                    officia libero adipisci consequuntur corporis voluptates eaque. Recusandae obcaecati consequuntur
                    possimus, debitis quo eaque iste nesciunt necessitatibus quam et iure cum doloremque fugit nemo
                    distinctio, perspiciatis quae odit impedit ea incidunt quos dignissimos laborum.</p>

            </div>

            <img src="{{ 'img/landing.petani2.png' }}" class="w-2/5  scale-75 m-4" alt="">
        </section>
        <section class="flex items-center max-h-96 mb-5">
            <img src="{{ 'img/landing.petani3.png' }}" class="w-2/5 m-4 scale-75" alt="">
            <div
                class="w-3/5 bg-[#495E57] h-72 mx-4 rounded-[20px] p-5 shadow-xl drop-shadow-lg bg-opacity-75 text-white mb-4">
                <h2 class="text-3xl mb-3">Manfaat Preconen itu apa sih?</h2>
                <p class="text-lg">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius dolorum esse et cumque
                    magnam rerum, debitis, perferendis quibusdam id quasi voluptatum nemo asperiores modi pariatur,
                    officia libero adipisci consequuntur corporis voluptates eaque. Recusandae obcaecati consequuntur
                    possimus, debitis quo eaque iste nesciunt necessitatibus quam et iure cum doloremque fugit nemo
                    distinctio, perspiciatis quae odit impedit ea incidunt quos dignissimos laborum.</p>

            </div>
        </section>
        <div class="carousel carousel-center w-full mx-auto p-4 space-x-4 rounded-box h-80">
            <div class="carousel-item w-96 ">
                <div class="shrink-0 w-4 sm:w-96"></div>
            </div>
            <div class="relative carousel-item">
                <img src="{{ asset('img/sawah.jpg') }}" class="rounded-box aspect-video object-cover" />
                <div class="absolute inset-0 bg-white bg-opacity-50">
                    <div class="flex flex-col text-white items-start justify-end h-full p-4">
                        <h3 class="text-3xl text-white font-bold mb-3">
                            Sawah
                        </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio aut ipsa autem, aperiam
                            beatae dolore minus, dignissimos quia fugiat placeat, minima tempora nesciunt! Earum nobis
                            cum
                            voluptates. Recusandae, enim eligendi.</p>
                    </div>
                </div>
            </div>
            <div class="relative carousel-item">
                <img src="{{ asset('img/sawah.jpg') }}" class="rounded-box aspect-video object-cover" />
                <div class="absolute inset-0 bg-white bg-opacity-50">
                    <div class="flex flex-col text-white items-start justify-end h-full p-4">
                        <h3 class="text-3xl text-white font-bold mb-3">
                            Kebun
                        </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio aut ipsa autem, aperiam
                            beatae dolore minus, dignissimos quia fugiat placeat, minima tempora nesciunt! Earum nobis
                            cum
                            voluptates. Recusandae, enim eligendi.</p>
                    </div>
                </div>
            </div>
            <div class="relative carousel-item">
                <img src="{{ asset('img/sawah.jpg') }}" class="rounded-box aspect-video object-cover" />
                <div class="absolute inset-0 bg-white bg-opacity-50">
                    <div class="flex flex-col text-white items-start justify-end h-full p-4">
                        <h3 class="text-3xl text-white font-bold mb-3">
                            Tanah Kosong
                        </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio aut ipsa autem, aperiam
                            beatae dolore minus, dignissimos quia fugiat placeat, minima tempora nesciunt! Earum nobis
                            cum
                            voluptates. Recusandae, enim eligendi.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item w-96 snap-center">
                <div class="shrink-0 w-4 sm:w-96"></div>
            </div>
        </div>

    </div>
    <div class="bg-[#71817C] h-72 ">
        <div class="max-w-7xl grid grid-cols-4 gap-8 p-8 mx-auto">

            <div class="bg-white rounded-full overflow-hidden h-60 w-60 p-12 mx-auto">
                <img src="{{ asset('img/nav.supplies.svg') }}" alt="">
            </div>
            <div class="bg-white rounded-full overflow-hidden h-60 w-60 p-12 mx-auto">
                <img src="{{ asset('img/nav.land.svg') }}" alt="">
            </div>
            <div class="bg-white rounded-full overflow-hidden h-60 w-60 p-12 mx-auto">
                <img src="{{ asset('img/nav.schedule.svg') }}" alt="">
            </div>
            <div class="bg-white rounded-full overflow-hidden h-60 w-60 p-12 mx-auto">
                <img src="{{ asset('img/nav.market.svg') }}" alt="">
            </div>
        </div>
    </div>
    @include('components.footer')

</body>

</html>
