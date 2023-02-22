<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light bg-dark text-white ">
            <a class="navbar-brand text-white" href="#">
                Skincare Diagnose
            </a>
            <div class="float-right d-flex">
                <a class="btn btn-primary mr-3" href="{{ route('history') }}">History</a>
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
                            <img src="{{ Storage::url($hasil_icon[$i]) }}" class="img-fluid " height="50px">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title"> {{ $hasil_kategori[$i] }}</h5>
                            <p class="card-text">{{ $hasil_keterangan[$i] }}</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        <button class="btn btn-secondary mt-5" data-toggle="modal" data-target="#modalResult">Show All Result</button>


        <div class="col-md-6 mt-5">
            <h3>Send Message</h3>

            <form action="{{ route('send-message') }}" method="post" role="form" class="php-email-form"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                        required>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="text-center"><button type="submit" class="btn btn-warning text-white">Send</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalResult" tabindex="-1" aria-labelledby="modalTambahPertanyaan" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">All Result</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @php
                    @endphp
                    @for ($i = 0; $i < count($all_result); $i++)
                        <p>{{ $i + 1 . '. ' . $all_result[$i] }}</p>
                    @endfor
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-secondary " data-dismiss="modal">Close</button>
                    </div>
                    </form>

                </div>
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
