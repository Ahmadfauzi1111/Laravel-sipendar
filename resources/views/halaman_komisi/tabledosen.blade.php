@extends('halaman_komisi.main')
@section('judul','Laporan Pendadaran')
@section('sidebar')
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
@endsection

@section('header')
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-2"><i class="fas fa-child"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"> Jumlah Mahasiswa</span>
                <span class="info-box-text"> Sudah Pendadaran</span>
                <span class="info-box-number">{{$count}}
                </span>
                <br>
                <span class="badge" style="font-size: 1em;">
                    <a href="/halaman_komisi/laporan"> Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
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
                <span class="info-box-text">Gagal Pendadaran</span>
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
                    <a href="#"> Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
                </span>
            </div>
        </div>
    </div>
    <div class="clearfix hidden-md-up"></div>
</div>
<h3>Dosen Penguji Pendadaran</h3>
<div class="table-responsive-md">
<table id="example1" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width:20px;">No</th>
            <th>Nama</th>
            <th style="width:350px;">Sudah berapa kali menguji</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dosen as $value)
        <tr>
            <th>{{ $loop->iteration}}</th>
            <td>{{ $value->nama }}</td>
            <td>
                @php
                $jumlah = 0;
                    foreach ($jadwal as $fucek) {
                     if ($value->id_dosen == $fucek->id_dsn1) {
                        $jumlah = $jumlah+1;
                     }
                     if ($value->id_dosen == $fucek->id_dsn2) {
                        $jumlah = $jumlah+1;
                     }
                     if ($value->id_dosen == $fucek->id_dsn3) {
                        $jumlah = $jumlah+1;
                     }
                     if ($value->id_dosen == $fucek->id_dsn4) {
                        $jumlah = $jumlah+1;
                     }
                    }
                    echo $jumlah;
                @endphp
            </td>
        </tr>
        @endforeach
     </tfoot>
</table>
</div>
@endsection