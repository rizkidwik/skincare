<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('back_assets/assets/images/favicon.png') }}" />
    <title>
        @yield('title') | {{ env('APP_NAME') }}
    </title>
    <!-- Custom CSS -->
    <link href="{{ asset('back_assets/dist/css/style.min.css') }}" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js')}} IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js')}} doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js')}}/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('admin.includes.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.includes.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('content')

            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

            <footer class="footer text-center">
                &copy; {{ date('Y') }}
            </footer>

            <!-- ============================================================== -->
            <!-- All Jquery -->
            <!-- ============================================================== -->
            <script src="{{ asset('back_assets/assets/libs/jquery/dist/jquery.min.js') }}"></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="{{ asset('back_assets/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
            <script src="{{ asset('back_assets/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
            <!-- apps -->
            <script src="{{ asset('back_assets/dist/js/app.min.js') }}"></script>
            <script src="{{ asset('back_assets/dist/js/app.init.dark.js') }}"></script>
            <script src="{{ asset('back_assets/dist/js/app-style-switcher.js') }}"></script>
            <!-- slimscrollbar scrollbar JavaScript -->
            <script src="{{ asset('back_assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
            <script src="{{ asset('back_assets/assets/extra-libs/sparkline/sparkline.js') }}"></script>
            <!--Wave Effects -->
            <script src="{{ asset('back_assets/dist/js/waves.js') }}"></script>
            <!--Menu sidebar -->
            <script src="{{ asset('back_assets/dist/js/sidebarmenu.js') }}"></script>
            <!--Custom JavaScript -->
            <script src="{{ asset('back_assets/dist/js/custom.min.js') }}"></script>

            @stack('after-script')
</body>

</html>
