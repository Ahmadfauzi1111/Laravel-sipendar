<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistem Informasi Pendadaran</title>
        <link rel="icon" type="/img" href="{{ asset('adminlte/img/logounsoed.png') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" type="text/css" href=" {{ asset('/adminlte/css/adminlte.min.css')}}">
        <!-- DataTables -->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <!-- iziToast -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/adminlte/assests/iziToast.css')}}">
    </head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-lightblue">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <li class="nav-item d-none d-sm-inline-block">
                <h2></h2>
            </li>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="/adminlte/img/profile.png" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">{{ (Auth::check()) ? Auth::user()->name : ''}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="/adminlte/img/profile.png" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ (Auth::check()) ? Auth::user()->name : ''}}
                                <small>Dosen</small>
                            </p>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link navbar-lightblue">
                <img src="/adminlte/img/unsoed.png" alt="Fakultas Teknik" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <h5 class="brand-text font-weight-light">SIPENDAR</h5>
            </a>
            <div class="sidebar">
                @yield('sidebar')
            </div>
        </aside>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('judul')</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                @yield('header')
                            </div>

                            @yield('card-body')
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2020 <a href="#">Fakultas Teknik</a>.</strong> Universitas Jenderal Soedirman.
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/adminlte/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/adminlte/js/demo.js')}}"></script>
    <!-- DataTables -->
    <script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- SweetAlert -->
    <script src="{{ asset('/adminlte/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'INFO !!!',
                text: 'Apakah Data ini akan dihapus secara Permanen???',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function (value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
    <!-- SweetAlert IziToast-->
    <script src="{{ asset('/adminlte/assests/iziToast.js')}}"></script>
    @if (session('success'))
    <script>
        iziToast.success({
            title: 'INFO!!!',
            message: "{{ session('success') }}"
        });
    </script>
    @endif
    @if (session('delete'))
    <script>
        iziToast.warning({
            title: 'INFO!!!',
            message: "{{ session('delete') }}"
        });
    </script>
    @endif
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
    @yield('tambah')
    @yield('edit')
</body>

</html>