@extends('halaman_mahasiswa.main')
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
                <a href="#" class="nav-link active">
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
                    == 3 || $mahasiswa->tahap == 4)
                <span class="badge badge-info"
                    style="font-size: 22px;">
                    <i class="fa fa-lock"></i> Hai {{ (Auth::check()) ? Auth::user()->name : ''}}
                </span>
            @elseif ($mahasiswa->tahap == 5 || $mahasiswa->tahap == 6)
            <h3 class="color-palette" style="font-size: 38px;  margin-bottom: 0px;">
                Jadwal Pendadaran 
            </h3>
            @endif
        </div>
    </div>
@endsection

@section('card-body')
    @if ($mahasiswa->tahap == NULL ||$mahasiswa->tahap == 1 || $mahasiswa->tahap == 2 || $mahasiswa->tahap == 3 ||
    $mahasiswa->tahap == 4)
    <div class="box-body text-center">
        <h2 style="font-weight: bold">Jadwal Pendadaran anda belum tersedia</h2>
        <p>Silahkan tunggu jadwal anda selagi Bapendik memverifikasi persyaratan pendadaran anda.</p>
    </div>
    @elseif ($mahasiswa->tahap == 5 || $mahasiswa->tahap == 6)
    <table class="table table-borderless">
        <thead>
            <br>
            <tr>
                <th scope="col">Nama</th>
                <th>:</th>
                <td> {{ $mahasiswa->nama}}</td>
            </tr>
            <tr>
                <th scope="col">NIM</th>
                <th>:</th>
                <td> {{ $mahasiswa->nim}}</td>
            </tr>
            <tr>
                <th scope="col">Tanggal</th>
                <th>:</th>
                <td>{{ date('d M Y', strtotime($mahasiswa->jadwal->tanggal))}}</td>
            </tr>
            <tr>
                <th scope="col">Jam</th>
                <th>:</th>
                <td>{{ $mahasiswa->jadwal->shiftmulai}} - {{$mahasiswa->jadwal->shiftselesai}}</td>
            </tr>
            <tr>
                <th scope="col">Ruang</th>
                <th>:</th>
                <td> {{ $mahasiswa->jadwal->ruang}}</td>
            </tr>
            <tr>
                <th scope="col">Ketua Dosen Penguji 1</th>
                <th>:</th>
                @foreach ($dosen as $value)
                    @if($value->id_dosen == $mahasiswa->jadwal->id_dsn1)
                    <td>{{ $value->nama }}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <th scope="col">Dosen Penguji 2</th>
                <th>:</th>
                @foreach ($dosen as $value)
                    @if($value->id_dosen == $mahasiswa->jadwal->id_dsn2)
                    <td>{{ $value->nama }}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <th scope="col">Dosen Penguji 3</th>
                <th>:</th>
                @foreach ($dosen as $value)
                    @if($value->id_dosen == $mahasiswa->jadwal->id_dsn3)
                    <td>{{ $value->nama }}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <th scope="col">Dosen Penguji 4</th>
                <th>:</th>
                @foreach ($dosen as $value)
                    @if($value->id_dosen == $mahasiswa->jadwal->id_dsn4)
                    <td>{{ $value->nama }}</td>
                    @endif
                @endforeach
            </tr>
        </thead>
    </table>
    @endif
@endsection