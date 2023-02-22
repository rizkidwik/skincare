@extends('admin.layouts')

@section('title', 'Question')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Question</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Question
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
                    <div class="card-header">
                        Question
                        <button class="btn btn-sm btn-success float-right" data-toggle="modal"
                            data-target="#exampleModal">Add
                            Data</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Question</th>
                                    <th>Vector</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pertanyaan as $pertanyaan)
                                    <tr>
                                        <td>{{ $pertanyaan->id }}</td>
                                        <td>{{ $pertanyaan->pertanyaan }}</td>
                                        <td>
                                            @foreach (json_decode($pertanyaan->vector) as $area)
                                                {{ $area . ',' }}
                                            @endforeach
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalTambahPertanyaan" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('question.store') }}" class="form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan</label>
                            <input type="text" name="pertanyaan" id="pertanyaan" class="form-control is-valid">
                        </div>
                        @foreach ($kategori as $kategori)
                            <div class="form-group row ">
                                <label for="inputState" class="col-sm-8 col-form-label">{{ $kategori->kategori }}</label>
                                <select id="inputState" class="col-sm-3 form-control is-valid" name="vector[]">
                                    <option value=1>Ya</option>
                                    <option value=-1>Tidak</option>
                                </select>
                            </div>
                        @endforeach
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary " data-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-primary btnSave" type="submit">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>

@endsection
