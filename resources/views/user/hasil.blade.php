<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light bg-dark text-white ">
            <a class="navbar-brand text-white" href="#">
                Skincare Recomendation
            </a>
            <div class="float-right d-flex">
                <a class="btn btn-primary mr-3" href="{{ route('riwayat') }}">Riwayat</a>
                <form action="{{ route('logout') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </nav>

        <h1 class="text-center">Hasil Rekomendasi</h1>
        <div class="row">
            @for ($i = 0; $i < count($hasil_kategori); $i++)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="text-center">
                            <img src="/img/face-tonic.jpg" class="img-fluid " width="100px">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title"> {{ $hasil_kategori[$i] }}</h5>
                            <p class="card-text">{{ $hasil_keterangan[$i] }}</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
