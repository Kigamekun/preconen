<dialog id="add_land" class="modal">
    <div class="modal-box bg-opacity-90 max-w-4xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-2xl font-semibold mb-3">Tambah Lahan</h3>
        <style>
            .dropify-render>img {
                min-width: 100%;
                object-fit: cover;
            }

            .dropify-wrapper .dropify-message p {
                font-size: 1rem;
            }
        </style>
        <form method="POST" action="{{ route('land.store') }}" class="mx-3" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-3">

                <div>
                    <input type="file" class="dropify " data-height="16rem" name="image"
                        data-default-file="{{ asset('img/sawah.jpg') }}" />
                </div>
                <div>
                    <label class="label block" for="name">
                        <span class="label-text text-lg w-full mb-2">Nama Lahan</span>
                        <input type="text" name="name" class="input input-bordered w-full " required />
                    </label>
                    <label class="label block" for="wide">
                        <span class="label-text text-lg w-full mb-2">Luas Lahan (m<span
                                class="align-super text-xs font-semibold">2</span>)</span>
                        <input type="number" name="wide" class="input input-bordered w-full " required />
                    </label>
                    <label class="label block" for="alamat">
                        <span class="label-text text-lg w-full mb-2">Alamat Lahan</span>
                        <textarea type="text" name="address" class="input input-bordered w-full h-24" rows="20"></textarea>
                    </label>
                    <label class="label block" for="alamat">
                        <span class="label-text text-lg w-full mb-2">Informasi Lahan</span>
                        <textarea type="text" name="address" class="input input-bordered w-full h-24" rows="20"></textarea>
                    </label>
                    <div class="w-full flex justify-center">

                        <button type="submit"
                            class="text-white normal-case text-2xl btn btn-ghost bg-[#495E57]">Simpan</button>
                    </div>

                </div>
            </div>
        </form>
    </div>

</dialog>

<script type="module">
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happended.'
        }
    });
</script>
