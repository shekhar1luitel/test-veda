<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- AdminLTE CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3/dist/css/adminlte.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Preloader -->
        {{-- <div class="preloader">
            <img src="https://veda-app.s3.ap-south-1.amazonaws.com/assets/2/about/2023-04-17/pjpXLl9Lek1EOY77-1681731117.png"
                alt="Vedalogo" >
        </div> --}}

        <!-- Navbar -->
        @include('layouts.partials.top-navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.partials.navbar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <aside class="control-sidebar control-sidebar-dark">

            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Footer content goes here -->
            <div class="float-right d-none d-sm-inline">
                At the End
            </div>

            <strong>Copyright &copy;  <a href="https://veda-app.com">VEDA</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->



    <script src="https://kit.fontawesome.com/a08c0691c4.js" crossorigin="anonymous"></script>



    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>
