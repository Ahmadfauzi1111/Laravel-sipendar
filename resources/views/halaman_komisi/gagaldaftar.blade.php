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
                    <a href="#"> Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
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
<h3 style="margin-bottom:0px;">Mahasiswa yang Gagal Sudah Daftar Ulang</h3>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="/halaman_komisi/pdfexportgagal?semester={{\Request::get('semester')}}&tahun={{\Request::get('tahun')}}" class="btn btn-danger"><i class="fas fa-print"></i> Export PDF</a>
                <a href="/halaman_komisi/excelexportgagal?semester={{\Request::get('semester')}}&tahun={{\Request::get('tahun')}}" class="btn btn-success"><i class="fas fa-print"></i> Export
                    Excel</a>
            </div>
            <div class="col-sm-6">
                <form action="/halaman_komisi/gagaldaftar" method="GET">
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
                <th>Jadwal</th>
                <th>Nilai Pendadaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $a = 0;
            @endphp
            @foreach($jadwal as $value)
            @php
                $nilai = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai1', 'n.nilai2', 'n.nilai3', 'n.nilai4', 'm.id_mahasiswa','m.nama', 'm.nim', 'm.Angkatan','n.jadwal_id')
            ->join('tb_dsn AS d' , 'd.id_dosen', '=', 'n.id_dsn')
            ->join('tb_mhs AS m' , 'm.id_mahasiswa', '=', 'n.id_mhs')
            ->join('tb_jadwal AS j' , 'n.jadwal_id', '=', 'j.id_jadwal')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at','!=',NULL)
            ->where('n.jadwal_id','=', $value->id_jadwal)
            ->get();

            $hasil1 = $nilai->avg('nilai1');
            $hasil2 = $nilai->avg('nilai2');
            $hasil3 = $nilai->avg('nilai3');
            $hasil4 = $nilai->avg('nilai4');

            $nilai1 = $nilai->sum('nilai1');
            $nilai2 = $nilai->sum('nilai2');
            $nilai3 = $nilai->sum('nilai3');
            $nilai4 = $nilai->sum('nilai4');

            $nilaiTotal = ($nilai1 + $nilai2 + $nilai3 + $nilai4)/16;
            @endphp
            @if ($value->tahap == 7 || $value->tahap == 8)
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
                    
                        if ($nilaiTotal <60) {
                            echo round($nilaiTotal, 2);
                        }
                        if ($nilaiTotal < 46) {
                            echo ' / E' ; } 
                        elseif ($nilaiTotal >=46 && $nilaiTotal<55.99) { 
                            echo ' / D' ; } 
                        elseif ($nilaiTotal >=56 && $nilaiTotal<59.99) { 
                            echo ' / CD' ; } 
                        elseif ($nilaiTotal >=60 && $nilaiTotal<64.99) { 
                        echo ' / C' ; } 
                    
                    @endphp
                </td>
                <td style="text-align: center"><a href="/halaman_komisi/laporangagal/{{$value->id_jadwal}}"
                    class="btn btn-success btn-xs btn-flat" style="margin: 0 5px 0 0;"><i class="fas fa-print"></i>
                </a></td>
            </tr>
            @endif
            @endforeach
            </tfoot>
    </table>
</div>
@endsection