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
                <a href="#" class="nav-link active">
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
                        <a href="#" class="nav-link active">
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
            @if ($mahasiswa->semester == NULL)
                <span class="badge badge-info"
                    style="font-size: 22px;">
                    <i class="fa fa-lock"></i> Hai {{ (Auth::check()) ? Auth::user()->name : ''}}
                </span>
            @else
            <h3 class="color-palette" style="font-size: 38px;  margin-bottom: 0px;">
                Data Persyaratan Pendadaran 
            </h3>
            @endif
        </div>
    </div>
@endsection

@section('card-body')
    @if ($mahasiswa->semester == NULL)
        <div class="box-body text-center">
            <h2 style="font-weight: bold">Pendaftaran Pendadaran belum tersedia</h2>
            <p>Silahkan isi Registrasi data diri anda terlebih dulu.</p>
        </div>
    @else
        @if ($mahasiswa->tahap == Null)
        @elseif ($mahasiswa->tahap == 1)
            <div class="alert alert-warning">
                <h5 style="text-align: center;">Status Pendadaran : Belum di Konfirmasi</h5>
                <h6 style="text-align: center;">Data Pendadaran Anda sedang di Verifikasi oleh Bapendik, mohon ditunggu</h6>
            </div>
        @elseif ($mahasiswa->tahap == 2)
            <div class="alert alert-danger">
                <h5 style="text-align: center;">Status Pendadaran : Belum Memenuhi</h5>
                <h6 style="text-align: center;">"{{ $mahasiswa->alasan}}"</h6>
            </div>
        @elseif ($mahasiswa->tahap == 3 || $mahasiswa->tahap == 4)
            <div class="alert alert-primary" style="background: #28a745;">
                <h5 style="text-align: center;">Status Pendadaran : Diterima</h5>
                <h6 style="text-align: center;">Data Pendadaran Anda sudah memenuhi Persyaratan, mohon ditunggu Komisi akan membuat
                    jadwal pendadaran</h6>
            </div>
        @elseif ($mahasiswa->tahap == 5 || $mahasiswa->tahap == 6)
            <div class="alert alert-primary" style="background: #28a745;">
                <h5 style="text-align: center;">Status Pendadaran : Diterima</h5>
                <h6 style="text-align: center;">Data Pendadaran Anda sudah bisa dilihat dihalaman jadwal pendadaran</h6>
            </div>
        @endif
            <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                <div class="image" style="margin-left: 30px; margin-top: 7px;">
                    <img style="width:75px" src="/adminlte/img/Capture7.PNG" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info" style="margin-left: 5px;">
                    <label style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;"> Transkip Nilai </label>
                    @if ($mahasiswa->tahap == NULL)
                    <P style="color:black; font-size: 0.9em; margin-bottom: 1px;">Sudah Lulus Semua Mata Kuliah
                        (Tanpa Nilai 'E')</P>
                    @elseif ($mahasiswa->tahap == 1)
                    <P><span class="badge badge-warning" style="font-size: 1em;">Belum di Konfirmasi</span></P>
                    @elseif ($mahasiswa->tahap == 2)
                    <P style="color:black; font-size: 0.9em; margin-bottom: 1px;">Sudah Lulus Semua Mata Kuliah
                        (Tanpa Nilai 'E')</P>
                    @elseif ($mahasiswa->tahap == 3 || $mahasiswa->tahap == 4 || $mahasiswa->tahap == 5 || $mahasiswa->tahap == 6)
                    <P><span class="badge badge-success" style="font-size: 1em;">Memenuhi Syarat</span></P>
                    @endif
                </div>
            </div>
            <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                <div class="image" style="margin-left: 30px; margin-top: 7px;">
                    <img style="width:75px" src="/adminlte/img/Capture7.PNG" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info" style="margin-left: 5px;">
                    <label style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;"> Nilai Tugas Akhir</label>
                    @if ($mahasiswa->tahap == NULL)
                    <P style="color:black; font-size: 0.9em; margin-bottom: 1px;">Nilai Tugas Akhir (TA) Sudah di
                        Upload di Sistem SIA</P>
                    @elseif ($mahasiswa->tahap == 1)
                    <P><span class="badge badge-warning" style="font-size: 1em;">Belum di Konfirmasi</span></P>
                    @elseif ($mahasiswa->tahap == 2)
                    <P style="color:black; font-size: 0.9em; margin-bottom: 1px;">Nilai Tugas Akhir (TA) Sudah di
                        Upload di Sistem SIA</P>
                    @elseif ($mahasiswa->tahap == 3 || $mahasiswa->tahap == 4 || $mahasiswa->tahap == 5 || $mahasiswa->tahap == 6)
                    <P><span class="badge badge-success" style="font-size: 1em;">Memenuhi Syarat</span></P>
                    @endif
                </div>
            </div>
            <Form action="/halaman_mahasiswa/pendaftaran/{{$mahasiswa->id_mahasiswa}}" id="formregistrasi" method="POST"
                enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="user-panel mt-2 pb-1 mb-1 d-flex">
                    <div class="image" style="margin-left: 30px; margin-top: 7px;">
                        <img style="width:75px" src="/adminlte/img/Capture.PNG" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info" style=" margin-left: 5px;">
                        <label for="file1" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;">
                            Sertifikat UEPT </label>
                        @if ($mahasiswa->tahap == NULL)
                        <P style="color:black; font-size: 0.8em; margin-bottom: 1px;">Scan Sertifikat Toefl bahasa
                            inggris/Sertifikat UEPT dalam bentuk.PDF</P>
                        <input name="file1" accept=".pdf" type="file" id="file1" style="color: black; font-size: 0.6em;" required>
                        @elseif ($mahasiswa->tahap == 2)
                        <P style="color:black; font-size: 0.8em; margin-bottom: 1px;">Scan Sertifikat Toefl bahasa
                            inggris/Sertifikat UEPT dalam bentuk.PDF</P>
                        <input name="file1" accept=".pdf" type="file" id="file1" style="color: black; font-size: 0.6em;" required>
                        @elseif ($mahasiswa->tahap == 1)
                        <P><span class="badge badge-warning" style="font-size: 1em;">Belum di Konfirmasi</span></P>
                        @elseif ($mahasiswa->tahap == 3 || $mahasiswa->tahap == 4 || $mahasiswa->tahap == 5 || $mahasiswa->tahap == 6)
                        <P><span class="badge badge-success" style="font-size: 1em;">Memenuhi Syarat</span></P>
                        @endif
                    </div>
                </div>
                <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                    <div class="image" style="margin-left: 30px; margin-top: 7px;">
                        <img style="width:75px" src="/adminlte/img/Capture.PNG" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info" style="margin-left: 5px;">
                        <label for="file2" style=" color:#0081d8; font-size: 1.0em; margin-bottom: 0px;"> Validasi
                            Nilai Transkip </label>
                        @if ($mahasiswa->tahap == NULL)
                        <P style="color:black; font-size: 0.8em; margin-bottom: 1px;">Scan Lembar Validasi nilai
                            Akademik oleh Ketua Prodi dalam bentuk.PDF</P>
                        <input name="file2" accept=".pdf" type="file" id="file2" style="color: black; font-size: 0.6em;" required>
                        @elseif ($mahasiswa->tahap == 2)
                        <P style="color:black; font-size: 0.8em; margin-bottom: 1px;">Scan Lembar Validasi nilai
                            Akademik oleh Ketua Prodi dalam bentuk.PDF</P>
                        <input name="file2" accept=".pdf" type="file" id="file2" style="color: black; font-size: 0.6em;" required>
                        @elseif ($mahasiswa->tahap == 1)
                        <P><span class="badge badge-warning" style="font-size: 1em;">Belum di Konfirmasi</span></P>
                        @elseif ($mahasiswa->tahap == 3 || $mahasiswa->tahap == 4 || $mahasiswa->tahap == 5 || $mahasiswa->tahap == 6)
                        <P><span class="badge badge-success" style="font-size: 1em;">Memenuhi Syarat</span></P>
                        @endif
                    </div>
                </div>
                <br>
                @if ($mahasiswa->tahap == NULL)
                <div class="box-footer" style="text-align: center;">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#register">
                        Upload
                    </button>
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
                                    Apakah Data Persyaratan tersebut sudah di isi dengan Benar ???
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-success" onclick="event.preventDefault();
                                document.getElementById('formregistrasi').submit();">Benar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif ($mahasiswa->tahap == 2)
                <div class="box-footer" style="text-align: center;">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#register">
                        Ajukan Ulang
                    </button>
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
                                    Apakah Data Persyaratan tersebut sudah di isi dengan Benar ???
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-success" onclick="event.preventDefault();
                                document.getElementById('formregistrasi').submit();">Benar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endif
                <br>
            </Form>
    @endif
@endsection