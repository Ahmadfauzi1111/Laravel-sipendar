@extends('halaman_mahasiswa.main')
@section('judul','Nilai Pendadaran')
@section('sidebar')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <div class="dropdown-divider"></div>
        <li class="header" style="color:white; margin-left:18px;">MAIN NAVIGATION</li>
        <div class="dropdown-divider"></div>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-edit"></i>
                <p>
                    Pengajuan Pendadaran
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 10px;">
                <li class="nav-item">
                    <a href="{{ url('/halaman_mahasiswa/registrasi')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-secret text-cyan"></i>
                        <p style="font-size: 15px;">
                            Registrasi Data Diri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/halaman_mahasiswa/pendaftaran')}}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher text-cyan"></i>
                        <p style="font-size: 15px;">
                            Daftar Pendadaran
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ url('/halaman_mahasiswa/jadwal')}}" class="nav-link">
                <i class="nav-icon fas fa fa-calendar-alt"></i>
                <p>
                    Jadwal Pendadaran
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa fa-scroll"></i>
                <p>
                    Nilai Pendadaran
                </p>
            </a>
        </li>
        <div class="dropdown-divider"></div>
              <li class="header" style="color:white; margin-left:18px;">KEAMANAN</li>
            <div class="dropdown-divider"></div>
        <li class="nav-item">
            <a href="{{ url('/halaman_mahasiswa/edit')}}" class="nav-link">
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
    <div class="box-header with-border" style="text-align: center; padding: 0px;">
        <div class="box-title">
            @if ($mahasiswa->tahap == NULL ||$mahasiswa->tahap == 1 || $mahasiswa->tahap == 2 || $mahasiswa->tahap
                    == 3 || $mahasiswa->tahap == 4 || $mahasiswa->tahap == 5 || $mahasiswa->tahap == 6 && $semuaDosen ==false)
                <span class="badge badge-info"
                    style="font-size: 22px;">
                    <i class="fa fa-lock"></i> Hai {{ (Auth::check()) ? Auth::user()->name : ''}}
                </span>
            @elseif ($mahasiswa->tahap == 6 && $semuaDosen ==true)
            <h3 class="color-palette" style="font-size: 38px;  margin-bottom: 0px;">
                Nilai Pendadaran 
            </h3>
            @endif
        </div>
    </div>
@endsection

@section('card-body')
@if ($mahasiswa->tahap == NULL ||$mahasiswa->tahap == 1 || $mahasiswa->tahap == 2 || $mahasiswa->tahap == 3 ||
    $mahasiswa->tahap == 4|| $mahasiswa->tahap == 5 || $mahasiswa->tahap == 6 && $semuaDosen ==false)
    <div class="box-body text-center">
        <h2 style="font-weight: bold"> Nilai Pendadaran anda belum tersedia </h2>
        <p>Silahkan tunggu nilai anda diinputkan oleh dosen penguji.</p>
    </div>
@elseif($mahasiswa->tahap == 6 && $semuaDosen ==true)
<table class="table table-borderless">
    <thead>
        <br>
        <tr>
            <th scope="col">Nama</th>
            <th>:</th>
            <td>{{$mahasiswa->nama}}</td>
        </tr>
        <tr>
            <th scope="col">NIM</th>
            <th>:</th>
            <td>{{$mahasiswa->nim}}</td>
        </tr>
        <tr>
            <th scope="col">Nilai Total</th>
            <th>:</th>
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
                    }
                @endphp
            </td>
        </tr>
    </thead>
</table>

@php
    if ($semuaDosen == true) {
        if ($nilaiTotal < 46) {
            echo '<br><center><button type="button" class="btn btn-success" style="width:120px;" data-toggle="modal" data-target="#register">
                Daftar Ulang
                </button></center><br>' ; } 
        elseif ($nilaiTotal >=46 && $nilaiTotal<55.99) { 
            echo '<br><center><button type="button" class="btn btn-success" style="width:120px;" data-toggle="modal" data-target="#register">
                Daftar Ulang
                </button></center><br>' ; } 
        elseif ($nilaiTotal >=56 && $nilaiTotal<59.99) { 
            echo '<br><center><button type="button" class="btn btn-success" style="width:120px;" data-toggle="modal" data-target="#register">
                Daftar Ulang
                </button></center><br>' ; } 
    }
@endphp
@endif
<!-- Modal -->
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
            Apakah anda yakin untuk daftar ulang pendadaran ???
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-success" onclick="event.preventDefault();
            document.getElementById('daftarulang').submit();">Benar</button>
            <form id="daftarulang" action="/halaman_mahasiswa/nilai/{{$mahasiswa->id_mahasiswa}}" method="Delete" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
</div>
@endsection