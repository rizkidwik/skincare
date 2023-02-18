<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Survei</title>
</head>

<body>
    <div class="container">
        <!-- Image and text -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                Skincare Recomendation
            </a>
        </nav>
        <div class="card">
            <div class="card-header">
                Diagnosa
            </div>
            <div class="card-body">
                <table class="table table-striped">

                    <form action="{{ route('survei.proses') }}" method="POST" enctype="multipart/form-data"
                        id="form_pertanyaan">
                        <input type="hidden" name="id_user" value=1>
                        @csrf
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($pertanyaan as $pertanyaan)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col">

                                            <div for="">{{ $i . '. ' }}{{ $pertanyaan->pertanyaan }}</div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="vector[{{ $i }}]" id="" value=1>
                                                <label class="form-check-label" for="">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="vector[{{ $i }}]" id="" value=-1>
                                                <label class="form-check-label" for="">Tidak</label>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach

                </table>
                <div class="row pt-3">
                    <div class="col">
                        <button type="submit" name="button" class="btn btn-success"> Submit </button>

                    </div>
                </div>
                </form>
            </div>
        </div>







    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    {{-- <script>
        $('#form_pertanyaan').on('submit', function(e) {
            e.preventDefault();

            var ser = $(this).serializeArray();
            var csrf = "{{ csrf_token() }}"

            $.ajax({
                url: '/diagnosa/proses',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                },
                data: {
                    data: ser
                },
                success: function(data) {
                    console.log(data)
                },
                error: function(data) {
                    console.log('error');
                },
            });

        });
    </script> --}}

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
