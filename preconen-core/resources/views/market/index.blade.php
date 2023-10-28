@extends('layouts.base')

@section('content')
    <div class="mx-auto mt-10 mb-10 text-[#495E57]">
        <h2 class="text-5xl font-extrabold mt-6 mb-8">Warung Preconen</h2>
        <div class="flex justify-end text-[#495E57] mb-3">
            <button class="btn btn-ghost text-xl normal-case"><img src="{{ asset('img/chat.icon.svg') }}" alt=""
                    class="mr-2 h-6">Pesan</button>
            <button class="btn btn-ghost text-xl normal-case"><img src="{{ asset('img/cart.icon.svg') }}" alt=""
                    class="mr-2 h-6">Keranjang</button>
        </div>
        <div class="grid grid-cols-4 gap-4 text-[#495E57] mb-3">
            <div></div>
            <select name="category" id="category"
                class="input input-bordered border-[#495E57] border-2 rounded-3xl focus:outline-none focus:border-[#495E57] focus:ring focus:ring-[#495E57]">
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option>
            </select>
            <div class="relative flex items-stretch w-full mx-2 col-span-2">
                <input type="text"
                    class="rounded-l-3xl block w-full py-2 pl-10 pr-4 placeholder:text-[#495E57] border-[#495E57] border-2 rounded-l-md focus:outline-none focus:border-[#495E57] focus:ring focus:ring-[#495E57] transition duration-300"
                    placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">

                </div>
                <span
                    class="inline-flex items-center px-5  rounded-r-md text-sm w-16 rounded-r-3xl border-[#495E57] border-2 border-l-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-search " viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </span>
            </div>



        </div>
        <h3 class="text-2xl font-bold mb-5">Terlaris</h3>
        <div class="grid grid-cols-6 gap-5 mb-8">
            @for ($i = 0; $i < 6; $i++)
                <div class="  bg-[#495E57] rounded-lg text-white">
                    <img src="{{ asset('storage/products/' . 'pupuk.jpg') }}" alt="Gambar"
                        style="height: 200px" class="w-full h-full object-cover rounded-lg rounded-b-0 ">
                    <div class="p-5 text-lg">

                        <p class="font-semibold">Pupuk</p>
                        <p>Rp. 50.000</p>
                        <p class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-star-fill mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg> 4.5</p>
                    </div>
                </div>
            @endfor
        </div>
        {{-- <div class="py-20">
            <div class="bg-[#495E57] p-5 text-xl text-white max-w-2xl rounded-lg mx-auto text-center">
                Kami tidak menemukan hasil pencarianmu
            </div>
        </div> --}}
        <h3 class="text-2xl font-bold mb-5">Direkomendasikan untuk anda</h3>
        <div class="grid grid-cols-6 gap-5 mb-8">
            @for ($i = 0; $i < 3; $i++)
                <div class=" h-72 bg-[#495E57] rounded-lg text-white">
                    <img src="{{ asset('storage/comodities/' . 'jagung.jpg') }}" alt="Gambar"
                        class="w-full h-full object-cover rounded-lg rounded-b-0 h-40">
                    <div class="p-5 text-lg">

                        <p class="font-semibold">Benih Jagung Manis</p>
                        <p>Rp. 50.000</p>
                        <p class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-star-fill mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg> 4.5</p>
                    </div>
                </div>
                <div class=" h-72 bg-[#495E57] rounded-lg text-white">
                    <img src="{{ asset('storage/comodities/' . 'tomat.jpg') }}" alt="Gambar"
                        class="w-full h-full object-cover rounded-lg rounded-b-0 h-40">
                    <div class="p-5 text-lg">

                        <p class="font-semibold">Benih Tomat</p>
                        <p>Rp. 50.000</p>
                        <p class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-star-fill mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg> 4.5</p>
                    </div>
                </div>
                <div class=" h-72 bg-[#495E57] rounded-lg text-white">
                    <img src="{{ asset('storage/comodities/' . 'bawangmerah.jpg') }}" alt="Gambar"
                        class="w-full h-full object-cover rounded-lg rounded-b-0 h-40">
                    <div class="p-5 text-lg">

                        <p class="font-semibold">Benih Bawang Merah</p>
                        <p>Rp. 50.000</p>
                        <p class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-star-fill mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg> 4.5</p>
                    </div>
                </div>
                <div class=" h-72 bg-[#495E57] rounded-lg text-white">
                    <img src="{{ asset('storage/comodities/' . 'bawangputih.jpg') }}" alt="Gambar"
                        class="w-full h-full object-cover rounded-lg rounded-b-0 h-40">
                    <div class="p-5 text-lg">

                        <p class="font-semibold">Benih Bawang Putih</p>
                        <p>Rp. 50.000</p>
                        <p class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-star-fill mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg> 4.5</p>
                    </div>
                </div>

                <div class=" h-72 bg-[#495E57] rounded-lg text-white">
                    <img src="{{ asset('storage/comodities/' . 'cabebesar.svg') }}" alt="Gambar"
                        class="w-full h-full object-cover rounded-lg rounded-b-0 h-40">
                    <div class="p-5 text-lg">

                        <p class="font-semibold">Benih Cabe Merah</p>
                        <p>Rp. 50.000</p>
                        <p class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-star-fill mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg> 4.5</p>
                    </div>
                </div>

                <div class=" h-72 bg-[#495E57] rounded-lg text-white">
                    <img src="{{ asset('storage/comodities/' . 'cabekeriting.svg') }}" alt="Gambar"
                        class="w-full h-full object-cover rounded-lg rounded-b-0 h-40">
                    <div class="p-5 text-lg">

                        <p class="font-semibold">Benih Cabe Keriting</p>
                        <p>Rp. 50.000</p>
                        <p class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-star-fill mr-3" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg> 4.5</p>
                    </div>
                </div>


            @endfor
        </div>
    </div>
@endsection
