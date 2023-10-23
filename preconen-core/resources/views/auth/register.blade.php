@extends('auth.base')
@section('form')
    <div class=" bg-white mx-4 rounded-[50px] p-5 shadow-xl drop-shadow-lg bg-opacity-75 mb-4 mx-auto py-8">
        <div class=" grid justify-items-center">
            <img src={{ asset('img/preconen-logo.svg') }} alt="Preconen" class="w-2/5 mb-2">
            <h2 class="text-4xl font-bold text-center">Selamat Datang</h2>
            <p class="text-lg font-semibold text-center my-2">Daftar terlebih dahulu untuk menggunakan
                aplikasi
            </p>
            <form action="{{ route('register') }}" method="POST" class="w-4/5 grid">
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
                    <input type="text" placeholder="Username" name="name"
                        class="w-full pl-10 pr-4 py-2 rounded-lg border-0 outline-none focus:ring focus:border-blue-300" />
                </div>
                <div class="relative rounded-lg shadow-md my-2">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg>
                    </div>

                    <!-- Input teks dengan sudut yang dibulatkan dan placeholder -->
                    <input type="text" placeholder="Email" name="email"
                        class="w-full pl-10 pr-4 py-2 rounded-lg border-0 outline-none focus:ring focus:border-blue-300" />
                </div>
                <div class="relative rounded-lg shadow-md my-2">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-phone" viewBox="0 0 16 16">
                            <path
                                d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>
                    </div>

                    <!-- Input teks dengan sudut yang dibulatkan dan placeholder -->
                    <input type="text" placeholder="No Telepon" name="phone"
                        class="w-full pl-10 pr-4 py-2 rounded-lg border-0 outline-none focus:ring focus:border-blue-300" />
                </div>
                <div class="relative rounded-lg shadow-md my-2">
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
                        class="w-full pl-10 pr-4 py-2 rounded-lg border-0 outline-none focus:ring focus:border-blue-300" />
                </div>

                <div class="relative rounded-lg shadow-md my-2">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-people" viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                        </svg>
                    </div>

                    <!-- Input teks dengan sudut yang dibulatkan dan placeholder -->
                    <select class="w-full pl-10 pr-4 py-2 rounded-lg border-0 outline-none focus:ring focus:border-blue-300"
                        placeholder="jdnjs" name="role">
                        <option value="" disabled selected>Kamu adalah?</option>
                        <option value="consumer">Konsumen</option>
                        <option value="farmer">Petani</option>
                    </select>
                </div>
                <p class="text-center text-gray-800">Sudah memiliki akun? <a class="underline"
                        href={{ route('login') }}>Masuk
                        disini?</a></p>
                <button type="submit"
                    class="rounded-full bg-white px-5 py-2 my-2 justify-self-center border border-black">Daftar
                </button>
            </form>
        </div>
    </div>
@stop
