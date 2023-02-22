@extends('admin.layouts')
@section('title', 'Category')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Category</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Category
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Icon</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $kategori)
                                    <tr>
                                        <td>{{ $kategori->id }}</td>
                                        <td>{{ $kategori->kategori }}</td>
                                        <td><img src="{{ Storage::url($kategori->icon) }}" class="img-fluid" width="50px">
                                        </td>
                                        <td>{{ $kategori->keterangan }}</td>
                                        <td><button type="button" data-toggle="modal"
                                                data-target="#modalUbah{{ $kategori->id }}"
                                                class="btn btn-success btn-edit">Edit</button></td>
                                    </tr>
                                    <div class="modal fade" id="modalUbah{{ $kategori->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('category.update', $kategori->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="kategori" class="kategori"
                                                        value="{{ $kategori->kategori }}">
                                                    <input type="hidden" name="id" value="{{ $kategori->id }}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="keterangan">Description</label>
                                                            <textarea class="form-control is-valid keterangan" name="keterangan" id="keterangan">{{ $kategori->keterangan }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="icon">Icon</label>
                                                            <input type="file" name="icon" id="icon"
                                                                class="form-control" accept="image/*">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>



@endsection

{{-- @push('after-script')
    <script>
        $(document).ready(function() {

            // get Edit Product
            $('.btn-edit').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const keterangan = $(this).data('keterangan');
                const kategori = $(this).data('kategori');
                // Set data to Form Edit
                $('.id').val(id);
                $('.kategori').val(kategori);
                $('.keterangan').val(keterangan);


            });
        });
    </script>
@endpush --}}
