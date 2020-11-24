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
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark navbar-lightblue">
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
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link navbar-lightblue">
                <img src="/adminlte/img/unsoed.png" alt="Fakultas Teknik" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <h5 class="brand-text font-weight-light">SIPENDAR</h5>
            </a>
            <div class="sidebar">

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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Nilai Pendadaran Mahasiswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ url('/halaman_komisi/laporan') }}" style="float: right" class="btn btn-primary"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="/adminlte/img/profile.png" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{$yeay->nama}}</h3>

                                    <p class="text-muted text-center">Teknik Informatika</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>NIM</b> {{$yeay->nim}}<a class="float-right"></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Angkatan</b> {{$yeay->Angkatan}}<a class="float-right"></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Semester</b>{{ $yeay->semester }}/{{ $yeay->tahun }}<a class="float-right"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr style="color: #007bff">
                                                    <th rowspan="2" style="text-align: center; vertical-align:middle;">
                                                        Nama</th>
                                                    <th colspan="4" style="text-align: center;">Nilai</th>
                                                    <th rowspan="2" style="text-align: center; vertical-align:middle;">
                                                        Rata -
                                                        Rata</th>
                                                </tr>
                                                <tr>
                                                    <th>Aspek 1</th>
                                                    <th>Aspek 2</th>
                                                    <th>Aspek 3</th>
                                                    <th>Aspek 4</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($nilai as $value)
                                                <tr>
                                                    @foreach ($dosen as $faker)
                                                    @if($faker->id_dosen == $value->id_dsn)
                                                    <td> {{ $faker->nama }}</td>
                                                    @endif
                                                    @endforeach
                                                    <td>{{$value->nilai1}}</td>
                                                    <td>{{$value->nilai2}}</td>
                                                    <td>{{$value->nilai3}}</td>
                                                    <td>{{$value->nilai4}}</td>
                                                    <td>
                                                        @php
                                                        $hasil = ($value->nilai1 + $value->nilai2 + $value->nilai3 +
                                                        $value->nilai4) / 4;
                                                        echo $hasil;
                                                        @endphp
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <th colspan="5" style="color: #007bff ">Nilai Total</th>
                                                    <td>
                                                        @php
                                                        if ($semuaDosen == true) {
                                                        echo round($nilaiTotal, 2);
                                                        if ($nilaiTotal < 46) {
                                                            echo ' / E' ; } 
                                                        elseif ($nilaiTotal >=46 && $nilaiTotal<55.99) { 
                                                            echo ' / D' ; } 
                                                        elseif ($nilaiTotal >=56 && $nilaiTotal<59.99) { 
                                                            echo ' / CD' ; } 
                                                        elseif ($nilaiTotal >=60 && $nilaiTotal<64.99) { 
                                                            echo ' / C' ; }
                                                        elseif ($nilaiTotal >=65 && $nilaiTotal<69.99) {
                                                            echo ' / BC' ; }
                                                        elseif ($nilaiTotal >=70 && $nilaiTotal<74.99) { 
                                                            echo ' / B' ; } 
                                                        elseif ($nilaiTotal >=75 && $nilaiTotal<79.99) { 
                                                            echo ' / AB' ;
                                                        } 
                                                        elseif ($nilaiTotal> 80) {
                                                            echo ' / A';
                                                        } 
                                                        else {
                                                            echo '-';
                                                        }
                                                    }
                                                        @endphp
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        @foreach($jadwal as $value)
                                        @php
                                        if ($value) {
                                            if ($semuaDosen == true) {
                                                if ($nilaiTotal < 46 || $nilaiTotal >=46 && $nilaiTotal<55.99 || $nilaiTotal >=56 && $nilaiTotal<59.99 || $nilaiTotal >=60 && $nilaiTotal<64.99|| 
                                                    $nilaiTotal >=65 && $nilaiTotal<69.99||$nilaiTotal >=70 && $nilaiTotal<74.99 || $nilaiTotal >=75 && $nilaiTotal<79.99 ||$nilaiTotal> 80 ) {
                                                    echo '<br><center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">
                                                        Konfirmasi Nilai
                                                        </button></center><br>' ; } 
                                            }
                                        }
                                        @endphp
                                        @endforeach
                                        
                                        <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registerLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100" id="registerLabel">!!! INFO !!!</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Nilai akan dibagikan kepada mahasiswa dan juga bapendik
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                    <button type="submit" class="btn btn-success" onclick="event.preventDefault();
                                                    document.getElementById('daftarulang').submit();">Benar</button>
                                                    <form id="daftarulang" action="/halaman_komisi/laporan/{{$yeay->id_mahasiswa}}" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
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
</body>

</html>