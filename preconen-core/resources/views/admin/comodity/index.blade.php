@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class=" px-5 m-i">



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
                                <h6>Comodity table</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-5">

                                    <table id="datatable-table" class=" table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Aksi</th>
                                                <th>Thumbnail</th>

                                                <th>Name</th>
                                                <th>Latin</th>
                                                <th>Code</th>
                                                <th>pH Max</th>
                                                <th>pH Min</th>
                                                <th>pH Optimal</th>
                                                <th>Temperature Max</th>
                                                <th>Temperature Min</th>
                                                <th>Humidity Max</th>
                                                <th>Humidity Min</th>
                                                <th>Planting Distance</th>
                                                <th>Umur Panen</th>
                                                <th>Potential Results Max</th>
                                                <th>Potential Results Min</th>
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
                <form action="{{ route('admin.comodity.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="code">Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="code" name="code" placeholder="Enter Code" required>
                        </div>
                        <div class="mb-3">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="latin">Latin <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="latin" name="latin" placeholder="Enter Latin" required>
                        </div>
                        <div class="mb-3">
                            <label for="ph_max">pH Max <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="ph_max" name="ph_max" placeholder="Enter pH Max" required>
                        </div>
                        <div class="mb-3">
                            <label for="ph_min">pH Min <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="ph_min" name="ph_min" placeholder="Enter pH Min" required>
                        </div>
                        <div class="mb-3">
                            <label for="ph_optimal">pH Optimal <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="ph_optimal" name="ph_optimal" placeholder="Enter pH Optimal" required>
                        </div>
                        <div class="mb-3">
                            <label for="temp_max">Temperature Max <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="temp_max" name="temp_max" placeholder="Enter Temperature Max" required>
                        </div>
                        <div class="mb-3">
                            <label for="temp_min">Temperature Min <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="temp_min" name="temp_min" placeholder="Enter Temperature Min" required>
                        </div>
                        <div class="mb-3">
                            <label for="humidity_max">Humidity Max <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="humidity_max" name="humidity_max" placeholder="Enter Humidity Max" required>
                        </div>
                        <div class="mb-3">
                            <label for="humidity_min">Humidity Min <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="humidity_min" name="humidity_min" placeholder="Enter Humidity Min" required>
                        </div>
                        <div class="mb-3">
                            <label for="planting_distance">Planting Distance <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="planting_distance" name="planting_distance" placeholder="Enter Planting Distance" required>
                        </div>
                        <div class="mb-3">
                            <label for="umur_panen">Umur Panen <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="umur_panen" name="umur_panen" placeholder="Enter Umur Panen" required>
                        </div>
                        <div class="mb-3">
                            <label for="potential_results_max">Potential Results Max <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="potential_results_max" name="potential_results_max" placeholder="Enter Potential Results Max" required>
                        </div>
                        <div class="mb-3">
                            <label for="potential_results_min">Potential Results Min <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="potential_results_min" name="potential_results_min" placeholder="Enter Potential Results Min" required>
                        </div>
                        <div class="mb-3">
                            <label for="thumb">Thumbnail</label>
                            <input type="file" class="form-control" id="thumb" name="thumb" placeholder="Enter Thumbnail">
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
                ajax: "{{ route('admin.comodity.index') }}",
                columns: [
                    {
    data: 'DT_RowIndex',
    name: 'DT_RowIndex',
    searchable: false
},
{
    data: 'action',
    name: 'action',
    searchable: false,
    orderable:false
},
{
    data: 'thumb',
    name: 'thumb',
    searchable: false,
    orderable:false

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
    data: 'code',
    name: 'code'
},
{
    data: 'ph_max',
    name: 'ph_max'
},
{
    data: 'ph_min',
    name: 'ph_min'
},
{
    data: 'ph_optimal',
    name: 'ph_optimal'
},
{
    data: 'temp_max',
    name: 'temp_max'
},
{
    data: 'temp_min',
    name: 'temp_min'
},
{
    data: 'humidity_max',
    name: 'humidity_max'
},
{
    data: 'humidity_min',
    name: 'humidity_min'
},
{
    data: 'planting_distance',
    name: 'planting_distance'
},
{
    data: 'umur_panen',
    name: 'umur_panen'
},
{
    data: 'potential_results_max',
    name: 'potential_results_max'
},
{
    data: 'potential_results_min',
    name: 'potential_results_min'
}


                ]
            });
        });

        $('#updateData').on('shown.bs.modal', function(e) {
            var html = `
            <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Comodity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="${$(e.relatedTarget).data('url')}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">

                        <div class="mb-3">
                            <label for="code">Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="code" name="code" value="${$(e.relatedTarget).data('code')}" placeholder="Enter Code" required>
                        </div>
                        <div class="mb-3">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="name" name="name" value="${$(e.relatedTarget).data('name')}" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="latin">Latin <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="latin" name="latin" value="${$(e.relatedTarget).data('latin')}" placeholder="Enter Latin" required>
                        </div>
                        <div class="mb-3">
                            <label for="ph_max">pH Max <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="ph_max" name="ph_max" value="${$(e.relatedTarget).data('ph_max')}" placeholder="Enter pH Max" required>
                        </div>
                        <div class="mb-3">
                            <label for="ph_min">pH Min <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="ph_min" name="ph_min" value="${$(e.relatedTarget).data('ph_min')}" placeholder="Enter pH Min" required>
                        </div>
                        <div class="mb-3">
                            <label for="ph_optimal">pH Optimal <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="ph_optimal" name="ph_optimal" value="${$(e.relatedTarget).data('ph_optimal')}" placeholder="Enter pH Optimal" required>
                        </div>
                        <div class="mb-3">
                            <label for="temp_max">Temperature Max <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="temp_max" name="temp_max" value="${$(e.relatedTarget).data('temp_max')}" placeholder="Enter Temperature Max" required>
                        </div>
                        <div class="mb-3">
                            <label for="temp_min">Temperature Min <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="temp_min" name="temp_min" value="${$(e.relatedTarget).data('temp_min')}" placeholder="Enter Temperature Min" required>
                        </div>
                        <div class="mb-3">
                            <label for="humidity_max">Humidity Max <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="humidity_max" name="humidity_max" value="${$(e.relatedTarget).data('humidity_max')}" placeholder="Enter Humidity Max" required>
                        </div>
                        <div class="mb-3">
                            <label for="humidity_min">Humidity Min <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="humidity_min" name="humidity_min" value="${$(e.relatedTarget).data('humidity_min')}" placeholder="Enter Humidity Min" required>
                        </div>
                        <div class="mb-3">
                            <label for="planting_distance">Planting Distance <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="planting_distance" name="planting_distance" value="${$(e.relatedTarget).data('planting_distance')}" placeholder="Enter Planting Distance" required>
                        </div>
                        <div class="mb-3">
                            <label for="umur_panen">Umur Panen <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="umur_panen" name="umur_panen" value="${$(e.relatedTarget).data('umur_panen')}" placeholder="Enter Umur Panen" required>
                        </div>
                        <div class="mb-3">
                            <label for="potential_results_max">Potential Results Max <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="potential_results_max" name="potential_results_max" value="${$(e.relatedTarget).data('potential_results_max')}" placeholder="Enter Potential Results Max" required>
                        </div>
                        <div class="mb-3">
                            <label for="potential_results_min">Potential Results Min <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="potential_results_min" name="potential_results_min" value="${$(e.relatedTarget).data('potential_results_min')}" placeholder="Enter Potential Results Min" required>
                        </div>
                        <div class="mb-3">
                            <label for="thumb">Thumbnail</label>
                            <input type="file" class="form-control" id="thumb" name="thumb" placeholder="Enter Thumbnail">
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
