<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Skincare Diagnose</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('front_assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('front_assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('front_assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('front_assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Bootslander - v4.10.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="{{ url('') }}"><span>Skincare Diagnose</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="{{ asset('front_assets/img/logo.png') }}" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    {{-- <li><a class="nav-link scrollto active " href="#hero">Home</a></li> --}}
                    <li><a class=" btn btn-warning p-2 mx-4" href="{{ route('history-user') }}">History</a>
                    </li>

                    {{-- <li><a class="nav-link scrollto btn btn-primary p-2 mx-4" href="{{ route('login') }}">Login</a>
                    </li> --}}

                    <li>
                        <form action="{{ route('logout') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class=" btn btn-danger p-2 mx-2">Logout</button>
                        </form>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="kuesioner">

        <div class="container">
            <div class="row justify-content-between">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped-columns">
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Answer</th>
                                <th>Result</th>
                                <th>Date</th>
                            </tr>
                            @foreach ($answer as $answer)
                                <tr>
                                    <td>{{ $answer->id }}</td>
                                    <td>{{ $answer->user->name }}</td>
                                    <td>{{ $answer->answer }}</td>
                                    <td>{{ $answer->result }}</td>
                                    <td>{{ $answer->created_at }}</td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>

    </section><!-- End Hero -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('front_assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('front_assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('front_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front_assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('front_assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front_assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('front_assets/js/main.js') }}"></script>

</body>

</html>
