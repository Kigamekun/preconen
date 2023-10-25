@extends('auth.base')
@section('form')
    <div class=" bg-white mx-4 rounded-[50px] p-5 shadow-xl drop-shadow-lg bg-opacity-75 mb-4 mx-auto py-8">
        <div class=" grid justify-items-center">
            <img src={{ asset('img/preconen-logo.svg') }} alt="Preconen" class="w-2/5 mb-2">

            <h2 class="text-4xl font-bold text-center">Masuk ke Aplikasi</h2>
            <p class="text-lg font-semibold text-center my-2">Silakan masuk untuk menggunakan aplikasi</p>
            <form action="{{ route('login') }}" method="POST" class="grid">
                @csrf
                <div class="relative rounded-lg shadow-md my-2">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                        </svg>
                    </div>

                    <!-- Input teks dengan sudut yang dibulatkan dan placeholder -->
                    <input type="email" placeholder="Email" name="email"
                        class="w-full pl-10 pr-4 py-2 rounded-lg border-0 outline-none focus:ring focus:border-blue-300" />
                </div>

                <div class="relative rounded-lg shadow-md mt-2">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-key" viewBox="0 0 16 16">
                            <path
                                d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                    </div>

                    <!-- Input teks dengan sudut yang dibulatkan dan placeholder -->
                    <input type="password" placeholder="Password" name="password"
                        class="w-full pl-10 pr-4 py-2 rounded-lg border-0 outline-none focus:ring focus:border-blue-300 " />
                </div>
                <p class="text-right  text-gray-800 mb-2 text-sm"><a class="underline" href={{ route('register') }}>Lupa
                        password?</a></p>
                <p class="text-center  text-gray-800">Belum memiliki akun? <a class="underline"
                        href={{ route('register') }}>Daftar
                        disini</a></p>

                <button type="submit" class="rounded-lg bg-white px-5 py-2 my-2 justify-self-center border border-black">Masuk
                </button>
            </form>
        </div>
    </div>
@stop

@section('content')
    {{-- <div class="min-h-full md:flex flex-row"> --}}
    {{-- <div class="md:w-1/3 bg-lime-600 min-h-screen ">
            <img src="{{ asset('img/sawah.jpg') }}" alt="" class="object-cover h-100">
        </div> --}}
    {{-- <div class="md:w-2/3 bg-slate-200 min-h-screen flex grid place-items-center">
            <div class="w-1/2 grid justify-items-center">
                <img src={{ asset('img/preconen-logo.svg') }} alt="Preconen" class="w-1/5 mb-2">

                <h2 class="text-4xl font-bold text-center">Masuk ke Aplikasi</h2>
                <p class="text-lg font-semibold text-center my-2">Silakan masuk untuk menggunakan aplikasi</p>
                <form action="{{ route('login') }}" class="w-3/5 grid">
                    <div class="relative rounded-lg shadow-md my-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                            </svg>
                        </div>

                        <!-- Input teks dengan sudut yang dibulatkan dan placeholder -->
                        <input type="text" placeholder="Username" name="username"
                            class="w-full pl-10 pr-4 py-2 rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
                    </div>

                    <div class="relative rounded-lg shadow-md mt-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-key" viewBox="0 0 16 16">
                                <path
                                    d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg>
                        </div>

                        <!-- Input teks dengan sudut yang dibulatkan dan placeholder -->
                        <input type="text" placeholder="Password" name="password"
                            class="w-full pl-10 pr-4 py-2 rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
                    </div>
                    <p class="text-right  text-gray-500 mb-2 text-sm"><a class="underline" href={{ route('register') }}>Lupa
                            password?</a></p>
                    <p class="text-center  text-gray-500">Belum memiliki akun? <a class="underline"
                            href={{ route('register') }}>Daftar
                            disini</a></p>

                    <button class="rounded-lg bg-white px-5 py-2 my-2 justify-self-center border border-black">Masuk
                    </button>
                </form>
            </div>

        </div> --}}





    {{-- di --}}


    {{-- </div> --}}


    <div class="w-100 flex">
        <div>
            <img src="" alt="">
        </div>
        <div class="card w-96 glass">
            <figure><img src="/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="car!" /></figure>
            <div class="card-body">
                <h2 class="card-title">Life hack</h2>
                <p>How to park your car at your garage?</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Learn now!</button>
                </div>
            </div>
        </div>
    </div>
@stop
