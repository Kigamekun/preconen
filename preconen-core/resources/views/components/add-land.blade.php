<dialog id="add_land" class="modal">
    <div class="modal-box bg-opacity-90 max-w-4xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-2xl font-semibold mb-3">Tambah Lahan</h3>
        {{-- <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form> --}}
        <form action="{{ route('land.store') }}" method="POST" class="mx-3">
            <div class="grid grid-cols-2">
                <div>
                    <input type="file" class="dropify max-w-0" data-default-file="{{ asset('img/sawah.jpg') }}" />
                    <div class="bg-opacity-100 bg-white p-4 mt-4 rounded-[25px]">
                        <h4 class="text-xl font-semibold ">Information</h4>
                        <p>-</p>
                    </div>
                </div>
                <div>

                    @csrf
                    <label class="label block" for="name">
                        <span class="label-text text-lg w-full mb-3">Nama Lahan</span>
                        <input type="text" name="name" class="input input-bordered w-full " />
                    </label>
                    <label class="label block" for="area">
                        <span class="label-text text-lg w-full mb-3">Luas Lahan</span>
                        <input type="text" name="luas" class="input input-bordered w-full " />
                    </label>
                    <div class="w-full flex justify-center mt-5">

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
