@extends('halaman_mahasiswa.main')
@section('header')

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
            <a href="{{ url('/halaman_mahasiswa/jadwal')}}" class="nav-link ">
                <i class="nav-icon fas fa fa-calendar-alt"></i>
                <p>
                    Jadwal Pendadaran
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/halaman_mahasiswa/nilai')}}" class="nav-link">
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
@endsection

@section('header')
<div class="box-header with-border" style="text-align: center; padding: 0px;">
    <div class="box-title">
        <h3 class="color-palette" style="font-size: 38px;  margin-bottom: 0px;">Perbarui Password Akun</h3>
    </div>
</div>
@endsection

@section('card-body')
<form class="form-horizontal" role="form" method="post" action="/halaman_mahasiswa/edit">
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
@endsection