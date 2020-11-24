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
            <span class="info-box-icon bg-success elevation-2"><i class="fas fa-user-graduate"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"> Jumlah Mahasiswa</span>
                <span class="info-box-text"> Lulus Pendadaran</span>
                <span class="info-box-number">{{$lulus}}
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
<h3 style="margin-bottom:0px;">Mahasiswa yang lulus pendadaran</h3>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="/halaman_komisi/pdfexport?semester={{\Request::get('semester')}}&tahun={{\Request::get('tahun')}}" class="btn btn-danger"><i class="fas fa-print"></i> Export PDF</a>
                <a href="/halaman_komisi/excelexport?semester={{\Request::get('semester')}}&tahun={{\Request::get('tahun')}}" class="btn btn-success"><i class="fas fa-print"></i> Export
                    Excel</a>
            </div>
            <div class="col-sm-6">
                <form action="/halaman_komisi/lulus" method="GET">
                    <ol class="breadcrumb float-sm-right">
                        <li>
                            <div class="form-group">
                                <select name="semester" class="custom-select">
                                    <option value="" disabled selected>Pilih Semester</option>
                                    <option value="7" @if(old('semester')=='7' ) selected @endif>7</option>
                                    <option value="8" @if(old('semester')=='8' ) selected @endif>8</option>
                                    <option value="9" @if(old('semester')=='9' ) selected @endif>9</option>
                                    <option value="10" @if(old('semester')=='10' ) selected @endif>10</option>
                                    <option value="11" @if(old('semester')=='11' ) selected @endif>11</option>
                                    <option value="12" @if(old('semester')=='12' ) selected @endif>12</option>
                                    <option value="13" @if(old('semester')=='13' ) selected @endif>13</option>
                                    <option value="14" @if(old('semester')=='14' ) selected @endif>14</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <select name="tahun" class="custom-select">
                                    <option value="">Pilih Tahun</option>
                                    <?php
                            $thn_skr = date('Y');
                            for ($x = $thn_skr; $x >= 2010; $x--) {
                                ?>
                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                    <?php
                            }
                            ?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <button type="submit">Cari</button>
                        </li>
                    </ol>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="table-responsive-md">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="width:20px;">No</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Angkatan</th>
                <th>Nilai Pendadaran</th>
                <th>Jadwal Pendadaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $a = 0;
            @endphp
            @foreach($jadwal as $value)
            @php
            $nilaiA = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai1')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai1');
            $nilaiB = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai2')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai2');
            $nilaiC = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai3')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai3');
            $nilaiD = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai4')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai4');
            $nilaiTotal = ($nilaiA + $nilaiB + $nilaiC + $nilaiD)/16;
            // dd($gagal, $lulus);
            $nilaiDadar = null;
            $dosenDadar = null;
            $dosenPenilai = array();
            $semuaDosen = false;

            //Siapa saja dosen yang mendadar contoh: Wahyu?

            $dosenDadarMentah = \DB::table('tb_jadwal AS n')
            ->select('n.id_jadwal','n.id_dsn1','n.id_dsn2','n.id_dsn3','n.id_dsn4')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at', '=' , NULL)
            ->get();
            foreach ($dosenDadarMentah as $dosenDadarku) {
            $dosenDadar = array($dosenDadarku->id_dsn1, $dosenDadarku->id_dsn2, $dosenDadarku->id_dsn3,
            $dosenDadarku->id_dsn4);
            sort($dosenDadar);
            }
            $dosenKasihNilai = \DB::table('tb_nilai AS n')
            ->select('n.id_dsn')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at', '=' , NULL)
            ->orderBy('n.id_dsn','asc')
            ->get();
            foreach ($dosenKasihNilai as $dosenKasihNilaiku) {
            array_push($dosenPenilai, $dosenKasihNilaiku->id_dsn);
            }
            if ($dosenPenilai == $dosenDadar) {
            $semuaDosen = true;
            }else {
            $semuaDosen = false;
            }
            @endphp
            @if ($value->tahap == 8 && $semuaDosen && $nilaiTotal >= 60)
            <tr>
                <th>@php
                    echo $a = $a+1;
                    @endphp</th>
                <td>{{$value->nama}}</td>
                <td>{{$value->nim}}</td>
                <td width="20px">{{$value->Angkatan}}</td>
                <td>{{$value->shiftmulai}} - {{$value->shiftselesai}}, {{ date('d M Y', strtotime($value->tanggal)) }}</td>
                <td>
                    @php
                    if ($semuaDosen == true) {
                        if ($nilaiTotal >= 60) {
                            echo round($nilaiTotal, 2);
                        }
                        if ($nilaiTotal >=60 && $nilaiTotal<64.99) { 
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
                    }
                    @endphp
                </td>
               <td style="text-align: center"><a href="/halaman_komisi/laporanlulus/{{$value->id_mahasiswa}}"
                    class="btn btn-success btn-xs btn-flat" style="margin: 0 5px 0 0;"><i class="fas fa-print"></i>
                </a></td>
            </tr>
            @endif
            @endforeach
        </tfoot>
    </table>
</div>
@endsection