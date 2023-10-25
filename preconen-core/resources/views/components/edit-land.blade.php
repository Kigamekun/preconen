<dialog id="edit_land" class="modal">
    <div class="modal-box bg-opacity-90 max-w-4xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-2xl font-semibold mb-3">Ubah Data Lahan</h3>
        <style>
            .dropify-render>img {
                min-width: 100%;
                object-fit: cover;
            }

            .dropify-wrapper .dropify-message p {
                font-size: 1rem;
            }
        </style>
        <form method="POST" action="{{ route('land.update', ['id' => $data->id_land]) }}" class="mx-3"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <input type="file" class="dropify " data-height="16rem" name="image"
                        name="file" data-default-file="{{ asset('storage/landImage/'.$data->thumb) }}" />
                </div>
                <div>
                    <label class="label block" for="name">
                        <span class="label-text text-lg w-full mb-2">Nama Lahan</span>
                        <input type="text" name="name" class="input input-bordered w-full " value="{{$data->name}}" required />
                    </label>
                    <label class="label block" for="wide">
                        <span class="label-text text-lg w-full mb-2">Luas Lahan</span>
                        <input type="number" name="wide" class="input input-bordered w-full " value="{{$data->wide}}" required />
                    </label>
                    <label class="label block" for="alamat">
                        <span class="label-text text-lg w-full mb-2">Alamat Lahan</span>
                        <textarea type="text" name="address" class="input input-bordered w-full h-24" rows="20">{{$data->address}}</textarea>
                    </label>
                    <label class="label block" for="alamat">
                        <span class="label-text text-lg w-full mb-2">Informasi Lahan</span>
                        <textarea type="text" name="information" class="input input-bordered w-full h-24" rows="20">{{ $data->information}}</textarea>
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
