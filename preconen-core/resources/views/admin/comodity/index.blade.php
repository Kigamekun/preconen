@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container px-5 m-i">



        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createData">
                Tambah Comodity
            </button>
        </div>


        <div class="table table-responsive mt-5 mb-5" style="padding-bottom: 30px;">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Authors table</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-5">

                                    <table id="datatable-table" class=" table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Aksi</th>
                                                <th>Name</th>
                                                <th>Latin</th>
                                                <th>Temperature</th>
                                                <th>PH</th>
                                                <th>Planting Distance</th>
                                                <th>Fertilizer Dose</th>
                                                <th>Potential Result</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>



    </div>

    <!-- Modal -->
    <div class="modal fade" id="updateData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="updateDataLabel" aria-hidden="true">
        <div class="modal-dialog" id="updateDialog">
            <div id="modal-content" class="modal-content">
                <div class="modal-body">
                    Loading..
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="createData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="createDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div id="modal-content" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Buat Comodity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('comodity.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name">name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="name" name="name"
                                placeholder="Masukan Kalimat" required>
                        </div>
                        <div class="mb-3">
                            <label for="latin">latin <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="latin" name="latin"
                                placeholder="Masukan Kalimat" required>
                        </div>
                        <div class="mb-3">
                            <label for="temp">temp <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="temp" name="temp"
                                placeholder="Masukan Kalimat" required>
                        </div>
                        <div class="mb-3">
                            <label for="ph">ph <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="ph" name="ph"
                                placeholder="Masukan Kalimat" required>
                        </div>
                        <div class="mb-3">
                            <label for="planting_distance">planting_distance <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="planting_distance"
                                name="planting_distance" placeholder="Masukan Kalimat" required>
                        </div>
                        <div class="mb-3">
                            <label for="fertilizer_dose">fertilizer_dose <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="fertilizer_dose"
                                name="fertilizer_dose" placeholder="Masukan Kalimat" required>
                        </div>

                        <div class="mb-3">
                            <label for="potential_results">potential_results <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="potential_results"
                                name="potential_results" placeholder="Masukan Kalimat" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function() {
            var table = $('#datatable-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('comodity.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'latin',
                        name: 'latin'
                    },
                    {
                        data: 'temp',
                        name: 'temp'
                    },
                    {
                        data: 'ph',
                        name: 'ph'
                    },
                    {
                        data: 'planting_distance',
                        name: 'planting_distance'
                    },
                    {
                        data: 'fertilizer_dose',
                        name: 'fertilizer_dose'
                    },
                    {
                        data: 'potential_results',
                        name: 'potential_results'
                    },
                ]
            });
        });

        $('#updateData').on('shown.bs.modal', function(e) {
            var html = `
            <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Comodity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="${$(e.relatedTarget).data('url')}" method="post">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <div class="mb-3">
                            <label for="name">name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="name" value="${$(e.relatedTarget).data('name')}" name="name"
                                placeholder="Masukan Kalimat" required>
                        </div>

                        <div class="mb-3">
                            <label for="latin">latin <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="latin" value="${$(e.relatedTarget).data('latin')}" name="latin"
                                placeholder="Masukan Kalimat" required>
                        </div>
                        <div class="mb-3">
                            <label for="temp">temp <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="temp" value="${$(e.relatedTarget).data('temp')}" name="temp"
                                placeholder="Masukan Kalimat" required>
                        </div>
                        <div class="mb-3">
                            <label for="ph">ph <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="ph" value="${$(e.relatedTarget).data('ph')}" name="ph"
                                placeholder="Masukan Kalimat" required>
                        </div>
                        <div class="mb-3">
                            <label for="planting_distance">planting_distance <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="planting_distance" value="${$(e.relatedTarget).data('planting_distance')}" name="planting_distance"
                                placeholder="Masukan Kalimat" required>
                        </div>
                        <div class="mb-3">
                            <label for="fertilizer_dose">fertilizer_dose <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="fertilizer_dose" value="${$(e.relatedTarget).data('fertilizer_dose')}" name="fertilizer_dose"
                                placeholder="Masukan Kalimat" required>
                        </div>

                        <div class="mb-3">
                            <label for="potential_results">potential_results <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="potential_results" value="${$(e.relatedTarget).data('potential_results')}" name="potential_results"
                                placeholder="Masukan Kalimat" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        `;
            $('#modal-content').html(html);
        });
    </script>
@endsection
