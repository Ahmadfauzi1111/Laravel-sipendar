<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistem Informasi Pendadaran</title>
        <link rel="icon" type="/img" href="{{ asset('adminlte/img/logounsoed.png') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" type="text/css" href=" {{ asset('/adminlte/css/adminlte.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- iziToast -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/adminlte/assests/iziToast.css')}}">
    </head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark navbar-lightblue">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('/adminlte/img/profile.png')}}" class="user-image img-circle elevation-2"
                            alt="User Image">
                        <span class="d-none d-md-inline">{{ (Auth::check()) ? Auth::user()->name : ''}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="/adminlte/img/profile.png" class="img-circle elevation-2" alt="User Image">
                            <p>
                                {{ (Auth::check()) ? Auth::user()->name : ''}}
                                <small>Admin</small>
                            </p>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link navbar-lightblue">
                <img src="/adminlte/img/unsoed.png" alt="Fakultas Teknik" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <h5 class="brand-text font-weight-light">SIPENDAR</h5>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <div class="dropdown-divider"></div>
                        <li class="header" style="color:white; margin-left:18px;">MAIN NAVIGATION</li>
                        <div class="dropdown-divider"></div>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p> Data Pengguna
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="margin-left: 10px;">
                                <li class="nav-item">
                                    <a href="{{ url('/halaman_admin/mhs/data_mahasiswa')}}" class="nav-link">
                                        <i class="nav-icon fas fa-id-badge text-cyan"></i>
                                        <p style="font-size: 15px;">
                                            Data Mahasiswa
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/halaman_admin/kms/data_komisi')}}" class="nav-link">
                                        <i class="nav-icon fas fa-id-badge text-cyan"></i>
                                        <p style="font-size: 15px;">
                                            Data Komisi
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/halaman_admin/dsn/data_dosen')}}" class="nav-link">
                                        <i class="nav-icon fas fa-id-badge text-cyan"></i>
                                        <p style="font-size: 15px;">
                                            Data Dosen
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/halaman_admin/adm/data_admin')}}" class="nav-link ">
                                        <i class="nav-icon fas fa-id-badge text-cyan"></i>
                                        <p style="font-size: 15px;">
                                            Data Admin
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/halaman_admin/kfrm/konfirmasi')}}" class="nav-link">
                                <i class="nav-icon fas fa fa-file-contract"></i>
                                <p>
                                    Data Pengajuan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/halaman_admin/nilai/datanilai')}}" class="nav-link">
                                <i class="nav-icon fas fa fa-scroll"></i>
                                <p>
                                    Data Nilai
                                </p>
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li class="header" style="color:white; margin-left:18px;">KEAMANAN</li>
                        <div class="dropdown-divider"></div>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-user-cog text-default"></i>
                                <p>
                                    Ubah Password
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-power-off text-red"></i>
                                <p>
                                    {{ __('Logout') }}
                                </p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Ganti Password</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Ganti Password</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="box-header with-border" style="text-align: center; padding: 0px;">
                                    <div class="box-title">
                                        <h3 class="color-palette" style="font-size: 38px;  margin-bottom: 0px;">Perbarui Password Akun</h3>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" role="form" method="post" action="/halaman_admin/edit">
                                @csrf
                                @method('put')
                                <div class="col-md-12">
                                    <div class="box-body">
                                        <div class="col-xs-12">
                                            <br>
                                            <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                                                <div class="image" style=" margin-top: 7px;">
                                                    <label for="passlama" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;"> Password Lama 
                                                    </label>
                                                </div>
                                                <div class="info" style="margin-left:12px;">
                                                    <input type="password" id="passlama" name="passlama" value="{{ old('passlama') }}"
                                                        class="form-control @error('passlama') is-invalid @enderror" placeholder="Isi password lama anda"
                                                        style="width: 370px;">
                                                    @error('passlama')
                                                    <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                                                <div class="image" style=" margin-top: 7px;">
                                                    <label for="passbaru" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;"> Password Baru 
                                                    </label>
                                                </div>
                                                <div class="info" style="margin-left: 17px;">
                                                    <input type="password" id="passbaru" name="passbaru" value="{{ old('passbaru') }}"
                                                        class="form-control @error('passbaru') is-invalid @enderror" placeholder="Isi password baru anda"
                                                        style="width: 370px;">
                                                    @error('passbaru')
                                                    <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                                                <div class="image" style=" margin-top: 7px;">
                                                    <label for="passlagi" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;"> Ulangi Password 
                                                    </label>
                                                </div>
                                                <div class="info" style="margin-left: 5px;">
                                                    <input type="password" id="passlagi" name="passlagi" value="{{ old('passlagi') }}"
                                                        class="form-control @error('passlagi') is-invalid @enderror" placeholder="Isi password baru anda lagi"
                                                        style="width: 370px;">
                                                    @error('passlagi')
                                                    <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-xs-12 text-center">
                                    <button type="submit" name="btnSelesai" class="btn btn-primary">Selesai</button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2020 <a href="#">Fakultas Teknik</a>.</strong> Universitas Jenderal Soedirman.
        </footer>
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
    <script src="{{ asset('/adminlte/assests/iziToast.js')}}">
    </script>

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
    @yield('tambah')
    @yield('edit')
</body>

</html>