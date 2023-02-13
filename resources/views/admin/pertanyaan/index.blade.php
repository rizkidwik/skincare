<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pertanyaan') }}
        </h2>
    </x-slot>


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="py-12">
                    <div class="card">
                        <div class="card-header">Data Pertanyaan
                            <button class="btn btn-sm btn-success right" data-toggle="modal"
                                data-target="#exampleModal">Tambah Data</button>
                        </div>
                        <div class="card-body">

                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Pertanyaan</th>
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
                    <form action="{{ route('pertanyaan.store') }}" class="form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan</label>
                            <input type="text" name="pertanyaan" id="pertanyaan" class="form-control">
                        </div>
                        @foreach ($kategori as $kategori)
                            {{-- <div class="form-row"> --}}
                            <div class="form-group row ">
                                <label for="inputState"
                                    class="col-sm-8 col-form-label">{{ $kategori->kategori }}</label>
                                <select id="inputState" class="col-sm-3 form-control" name="vector[]">
                                    <option value=1>Ya</option>
                                    <option value=-1>Tidak</option>
                                </select>
                            </div>
                            {{-- </div> --}}
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

    @push('after-script')
        {{-- <script>
            $(document).ready(function() {
                $('.btnSave').click(function(e) {
                    e.preventDefault();
                    var serialize = $('.form').serializeArray()
                    var csrf = "{{ csrf_token() }}"

                    // console.log(token)
                    $.ajax({
                        url: '{{ route('pertanyaan.store') }}',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': csrf,
                        },
                        data: {
                            data: serialize
                        },
                        success: function(data) {
                            console.log(data)
                        },
                        error: function(data) {
                            console.log(data);
                        },
                    });
                })
            })
        </script> --}}
    @endpush

</x-app-layout>
