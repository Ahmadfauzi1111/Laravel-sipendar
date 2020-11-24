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
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('/adminlte/css/adminlte.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/adminlte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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
                <!-- Messages Dropdown Menu -->
                <!-- Notifications Dropdown Menu -->
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
                                <small>Komisi</small>
                            </p>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link navbar-lightblue">
                <img src="/adminlte/img/unsoed.png" alt="Fakultas Teknik" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <h5 class="brand-text font-weight-light">SIPENDAR</h5>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                        <div class="dropdown-divider"></div>
                        <li class="header" style="color:white; margin-left:18px;">MAIN NAVIGATION</li>
                        <div class="dropdown-divider"></div>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p>
                                    Data Pendadaran
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="margin-left: 10px;">
                                <li class="nav-item">
                                    <a href="{{ url('/halaman_komisi/pengajuan') }}" class="nav-link">
                                        <i class="nav-icon fas fa-file-contract text-cyan"></i>
                                        <p style="font-size: 15px;">
                                            Pengajuan Pendadaran
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="nav-icon fas fa-id-card-alt text-cyan"></i>
                                        <p style="font-size: 15px;">
                                            Laporan Pendadaran
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ url('/halaman_komisi/list') }}" class="nav-link ">
                                <i class="nav-icon fas fa-clipboard-list text-cyan"></i>
                                <p style="font-size: 15px;">
                                    List Jadwal
                                </p>
                                </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/halaman_komisi/penjadwalan') }}" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list text-cyan"></i>
                                <p style="font-size: 15px;">
                                    Data Jadwal
                                </p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ url('/halaman_komisi/jadwalkomisi') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p style="font-size: 15px;">
                                    Jadwal Pendadaran
                                </p>
                            </a>
                        </li>
                    <div class="dropdown-divider"></div>
                    <li class="header" style="color:white; margin-left:18px;">KEAMANAN</li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="{{ url('/halaman_komisi/edit') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-cog text-blue"></i>
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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Laporan Pendadaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info elevation-2"><i
                                                class="fas fa-child"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"> Jumlah Mahasiswa</span>
                                            <span class="info-box-text"> Sudah Pendadaran</span>
                                            <span class="info-box-number">{{$count}}
                                            </span>
                                            <br>
                                            <span class="badge" style="font-size: 1em;">
                                                <a href="#"> Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success elevation-2"><i
                                                class="fas fa-user-graduate"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"> Jumlah Mahasiswa</span>
                                            <span class="info-box-text"> Lulus Pendadaran</span>
                                            <span class="info-box-number">{{$lulus}}
                                            </span>
                                            <br>
                                            <span class="badge" style="font-size: 1em;">
                                                <a href="/halaman_komisi/lulus"> Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-danger elevation-2"><i class="fas fa-user-graduate"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"> Jumlah Mahasiswa</span>
                                            <span class="info-box-text"> (Harus Daftar Ulang)</span>
                                            <span class="info-box-number">{{$gagal}}
                                            </span>
                                            <br>
                                            <span class="badge" style="font-size: 1em;">
                                                <a href="/halaman_komisi/gagal"> Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-orange elevation-2"><i class="fas fa-user-graduate"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"> Jumlah Mahasiswa</span>
                                            <span class="info-box-text"> Gagal Pendadaran</span>
                                            <span class="info-box-number">{{$gagaldaftar}}
                                            </span>
                                            <br>
                                            <span class="badge" style="font-size: 1em;">
                                                <a href="/halaman_komisi/gagaldaftar"> Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-warning elevation-2"><i class="fas fa-users"></i></span>
                            
                                        <div class="info-box-content">
                                            <span class="info-box-text">Jumlah Dosen </span>
                                            <span class="info-box-text">Penguji Pendadaran </span>
                                            <span class="info-box-number">{{$dosdar}}</span>
                                            <br>
                                            <span class="badge" style="font-size: 1em;">
                                                <a href="/halaman_komisi/tabledosen"> Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix hidden-md-up"></div>
                            </div>
                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <h3>Mahasiswa yang sudah pendadaran</h3>
                                <!-- eXPORT Data -->
                                    <a href="/halaman_komisi/exportpdf" class="btn btn-danger"><i class="fas fa-print"></i> Export PDF</a>
                                    <a href="/halaman_komisi/exportexcel" class="btn btn-success"><i class="fas fa-print"></i> Export Excel</a>
                                <br>
                                <br>
                                <div class="table-responsive-md">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width:10px;">No</th>
                                                <th>Nama</th>
                                                <th>Nim</th>
                                                <th>Jadwal Pendadaran</th>
                                                <th>Penguji 1</th>
                                                <th>Penguji 2</th>
                                                <th>Penguji 3</th>
                                                <th>Penguji 4</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $a = 0;
                                            @endphp
                                            @foreach($jadwal as $value)
                                            @if($value->tahap == 6 || $value->tahap == 7|| $value->tahap == 8)
                                            <tr>
                                                <th>@php
                                                    echo $a = $a+1;
                                                @endphp</th>
                                                <td>{{ $value->nama }}</td>
                                                <td>{{ $value->nim }}</td>
                                                <td width="170px"> {{ $value->ruang }}, {{ date('d M Y', strtotime($value->tanggal)) }}, {{ $value->shiftmulai }} - {{ $value->shiftselesai }}</td>
                                                <td>
                                                    @foreach($dosen as $faker)
                                                        @if($faker->id_dosen == $value->id_dsn1)
                                                        {{$faker->nama}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($dosen as $faker)
                                                        @if($faker->id_dosen == $value->id_dsn2)
                                                        {{$faker->nama}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($dosen as $faker)
                                                        @if($faker->id_dosen == $value->id_dsn3)
                                                        {{$faker->nama}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($dosen as $faker)
                                                        @if($faker->id_dosen == $value->id_dsn4)
                                                        {{$faker->nama}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td width="50px">
                                                    @if($value->tahap == 6 && $value->deleted_at == NULL)
                                                    <a href="/halaman_komisi/informasi/{{ $value->id_mhs }}"
                                                        type="button" class="btn btn-info btn-xs btn-flat"
                                                        style="margin: 0 5px 0 0;">Lihat Nilai
                                                    </a>
                                                    @elseif($value->tahap == 7)
                                                    <span class="badge badge-success" style="font-size: 1em;">Sudah</span>
                                                    @elseif($value->tahap == 8 && $value->deleted_at == NULL)
                                                    <span class="badge badge-success" style="font-size: 1em;">Sudah</span>
                                                    @elseif($value->tahap == 8 && $value->deleted_at != NULL)
                                                    <span class="badge badge-success" style="font-size: 1em;">Sudah</span>
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <!-- Select2 -->
    <script src="{{ asset('/adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
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
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

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
</body>

</html>