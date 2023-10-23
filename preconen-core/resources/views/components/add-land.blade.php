<dialog id="add_land" class="modal">
    <div class="modal-box bg-opacity-90 max-w-4xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-2xl font-semibold mb-3">Tambah Lahan</h3>
        <div class="grid grid-cols-2">
            <div>
                <div class="relative  rounded-[25px] overflow-hidden row-span-3">
                    <!-- Gambar dengan rasio 16/9 dan sudut yang dibulatkan -->
                    <img src="{{ asset('img/sawah.jpg') }}" alt="Gambar"
                        class="w-full h-full object-cover rounded-[25px]">

                    <!-- Lapisan abu-abu dengan sudut yang dibulatkan -->
                    <div class="absolute inset-0 bg-slate-950 bg-opacity-50 rounded-[25px]">
                        <div class="flex items-center justify-center  h-full p-3 inset-x-0 bottom-0">
                            <p class="text-3xl font-extrabold text-white">
                                Tambahkan Foto {{--  {{ $item->comodity->name }} --}}
                            </p>
                        </div>

                    </div>
                </div>
                <div class="bg-opacity-100 bg-white p-4 mt-4 rounded-[25px]">
                    <h4 class="text-xl font-semibold ">Information</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem, dicta ut non inventore
                        repellat placeat.</p>
                </div>
            </div>
            <div>
                <form action="" class="mx-3">
                    <label class="label block" for="name">
                        <span class="label-text text-lg w-full mb-3">Nama Lahan</span>
                        <input type="text" name="name" class="input input-bordered w-full " />
                    </label>
                    <label class="label block" for="area">
                        <span class="label-text text-lg w-full mb-3">Luas Lahan</span>
                        <input type="text" name="area" class="input input-bordered w-full " />
                    </label>
                    <label class="label block" for="alamat">
                        <span class="label-text text-lg w-full mb-3">Alamat Lahan</span>
                        <textarea type="text" name="address" class="input input-bordered w-full h-24" rows="20"></textarea>
                    </label>
                    <div class="w-full flex justify-center">

                        <button type="submit"
                            class="text-white normal-case text-2xl btn btn-ghost bg-[#495E57]">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</dialog>
