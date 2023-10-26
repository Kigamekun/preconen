@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container px-5 m-i">



        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createData">
                Tambah Product
            </button>
        </div>


        <div class="table table-responsive mt-5 mb-5" style="padding-bottom: 30px;">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Product table</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-5">

                                    <table id="datatable-table" class=" table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Aksi</th>
                                                <th>Thumb</th>
                                                <th>Name</th>
                                                <th>Stock</th>
                                                <th>Price</th>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Buat Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="name" name="name"
                                placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock">Stock <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="stock" name="stock"
                                placeholder="Enter Stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="price">Price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="price" name="price"
                                placeholder="Enter Latin" required>
                        </div>
                        <div class="mb-3">
                            <label for="price">Thumb <span class="text-danger">*</span></label>
                            <input type="file" class="form-control form-require" id="thumb" name="thumb"
                                placeholder="Enter Latin" required>
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
                ajax: "{{ route('admin.product.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false
                    },
                    {
                        data: 'thumb',
                        name: 'thumb'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },


                ]
            });
        });

        $('#updateData').on('shown.bs.modal', function(e) {
            var html = `
            <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="${$(e.relatedTarget).data('url')}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <div class="mb-3">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="name" name="name"
                                placeholder="Enter Name" value="${$(e.relatedTarget).data('name')}" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock">Stock <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" id="stock" name="stock"
                                placeholder="Enter Stock" value="${$(e.relatedTarget).data('stock')}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price">Price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-require" value="${$(e.relatedTarget).data('price')}" id="price" name="price"
                                placeholder="Enter Latin" required>
                        </div>
                        <div class="mb-3">
                            <label for="price">Thumb <span class="text-danger">*</span></label>
                            <input type="file" class="form-control form-require" id="thumb" name="thumb"
                                placeholder="Enter Latin" required>
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
