<dialog id="contact_us" class="modal">
    <div class="modal-box bg-opacity-90 max-w-4xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 border-0">✕</button>
        </form>
        <h3 class="text-2xl font-bold mb-3 text-center">Kontak tim Preconen</h3>
        </h3>
        <form method="POST" action="" class="mx-3" enctype="multipart/form-data">
            @csrf


            <div>
                <label class="label block" for="name">
                    <span class="label-text text-lg w-full mb-2">Nama</span>
                    <input type="text" name="name" class="input input-bordered w-full " required />
                </label>
                <label class="label block" for="wide">
                    <span class="label-text text-lg w-full mb-2">Email<span
                            class="align-super text-xs font-semibold"></span>
                        <input type="number" name="wide" class="input input-bordered w-full " required />
                </label>

                <label class="label block" for="alamat">
                    <span class="label-text text-lg w-full mb-2">Pesan</span>
                    <textarea type="text" name="information" class="input input-bordered w-full h-24" rows="20"></textarea>
                </label>
                <div class="w-full flex justify-center">

                    <button type="submit"
                        class="text-white normal-case text-2xl btn btn-ghost bg-[#495E57]">Kirim</button>
                </div>

            </div>
        </form>
    </div>
</dialog>
