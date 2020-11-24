@extends('halaman_dosen.main')
@section('judul','Data Nilai')
@section('sidebar')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <div class="dropdown-divider"></div>
        <li class="header" style="color:white; margin-left:18px;">MAIN NAVIGATION</li>
        <div class="dropdown-divider"></div>
        <li class="nav-item">
            <a href="{{ Url('/halaman_dosen/Datajadwal') }}" class="nav-link ">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                    Jadwal Pendadaran
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-scroll"></i>
                <p>
                    Data Nilai
                </p>
            </a>
        </li>
        <div class="dropdown-divider"></div>
        <li class="header" style="color:white; margin-left:18px;">KEAMANAN</li>
        <div class="dropdown-divider"></div>
        <li class="nav-item">
            <a href="#" class="nav-link">
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="/adminlte/img/profile.png"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $mahasiswa->nama }}</h3>

                        <p class="text-muted text-center">Teknik Informatika</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>NIM</b> <a class="float-right">{{ $mahasiswa->nim }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Angkatan</b> <a class="float-right">{{ $mahasiswa->Angkatan }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Semester</b> <a class="float-right">{{ $mahasiswa->semester }}/{{ $mahasiswa->tahun }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @if (!$nilai)
                <button type="button" class="btn btn bg-blue margin margin-bottom" style="margin-left: 18px;"
                    data-toggle="modal" data-target="#tambahdata">
                    <i class="fa fa-user-plus"> Tambah Nilai</i>
                </button>
                @elseif ($nilai)
                <button type="button" class="btn btn bg-blue margin margin-bottom" style="margin-left: 18px;"
                     data-toggle="modal" data-target="#edit">
                    <i class="fa fa-pencil-alt"> Edit Nilai</i>
                </button>
                @endif
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:20px;">No</th>
                                <th>Komponen Penilaian</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;">1</td>
                                <td>Penguasaan Materi Dasar
                                </td>
                                <td style="text-align: center;">
                                    @if ($nilai)
                                    {{ $nilai->nilai1 }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">2</td>
                                <td>Kemampuan Rekayasa Bidang keahlian (Analisis, Perancangan, Penyelesaian masalah)
                                </td>
                                <td style="text-align: center;">
                                    @if ($nilai)
                                    {{ $nilai->nilai2 }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">3</td>
                                <td>Kemampuan Berkomunikasi secara ilmiah
                                </td>
                                <td style="text-align: center;"> @if ($nilai)
                                    {{ $nilai->nilai3 }}
                                    @endif</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">4</td>
                                <td>Kemampuan belajar mandiri untuk mengembangkan pengetahuan yang dimiliki
                                </td>
                                <td style="text-align: center;"> @if ($nilai)
                                    {{ $nilai->nilai4 }}
                                    @endif</td>
                            </tr>
                            </tfoot>
                    </table>
                </div>
                <!-- Modal Edit-->
                <div class="modal fade" id="edit" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="editLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:700px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editLabel">Edit Nilai Mahasiswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-xs-12">
                                    @if (!$nilai)
                                    @else
                                    <form action="/halaman_dosen/Datanilai/{{$nilai->id_nilai}}" method="POST">
                                        @csrf
                                        @method('Patch')
                                        <div class="form-group" style="margin-bottom: .2rem;">
                                            <label for="nilai1" class="control-label">Penguasaan Materi Dasar</label>
                                            <input type="number" id="nilai1" name="nilai1"
                                                class="form-control @error('nilai1') is-invalid @enderror"
                                                value="{{$nilai->nilai1}}" placeholder="Enter Nilai"
                                                style="width: 150px;">
                                            @error('nilai1')
                                            <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group" style="margin-bottom: .2rem;">
                                            <label for="nilai2" class="control-label">Kemampuan Rekayasa Bidang keahlian
                                                (Analisis, Perancangan, Penyelesaian masalah)</label>
                                            <input type="number" id="nilai2" name="nilai2"
                                                class="form-control @error('nilai2') is-invalid @enderror"
                                                value="{{$nilai->nilai2}}" placeholder="Enter Nilai"
                                                style="width: 150px;">
                                            @error('nilai2')
                                            <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group" style="margin-bottom: .2rem;">
                                            <label for="nilai3" class="control-label">Kemampuan Berkomunikasi secara
                                                ilmiah</label>
                                            <input type="number" id="nilai3" name="nilai3"
                                                class="form-control  @error('nilai3') is-invalid @enderror"
                                                value="{{$nilai->nilai3}}" placeholder="Enter Nilai"
                                                style="width: 150px;">
                                            @error('nilai3')
                                            <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group" style="margin-bottom: .2rem;">
                                            <label for="nilai4" class="control-label">Kemampuan belajar mandiri untuk
                                                mengembangkan pengetahuan yang dimiliki</label>
                                            <input type="number" id="nilai4" name="nilai4"
                                                class="form-control  @error('nilai4') is-invalid @enderror"
                                                value="{{$nilai->nilai4}}" placeholder="Enter Nilai"
                                                style="width: 150px;">
                                            @error('nilai4')
                                            <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-success">Selesai</button>
                                        </div>
                                    </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Tambah -->
                <div class="modal fade" id="tambahdata" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="tambahdataLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-width:700px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahdataLabel">Tambah Nilai</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-xs-12">
                                    <form action="/halaman_dosen/Datanilai/{{$mahasiswa->id_mahasiswa}}" method="POST">
                                        @csrf
                                        <div class="form-group" style="margin-bottom: .2rem;">
                                            <label for="nilai1" class="control-label">Penguasaan Materi Dasar</label>
                                            <input type="number" id="nilai1" name="nilai1" value="{{ old('nilai1') }}"
                                                class="form-control @error('nilai1') is-invalid @enderror"
                                                placeholder="Enter Nilai" style="width: 150px;">
                                            @error('nilai1')
                                            <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group" style="margin-bottom: .2rem;">
                                            <label for="nilai2" class="control-label">Kemampuan Rekayasa Bidang keahlian
                                                (Analisis, Perancangan, Penyelesaian masalah)</label>
                                            <input type="number" id="nilai2" name="nilai2" value="{{ old('nilai2') }}"
                                                class="form-control @error('nilai2') is-invalid @enderror"
                                                placeholder="Enter Nilai" style="width: 150px;">
                                            @error('nilai2')
                                            <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group" style="margin-bottom: .2rem;">
                                            <label for="nilai3" class="control-label">Kemampuan Berkomunikasi secara
                                                ilmiah</label>
                                            <input type="number" id="nilai3" name="nilai3" value="{{ old('nilai3') }}"
                                                class="form-control  @error('nilai3') is-invalid @enderror"
                                                placeholder="Enter Nilai" style="width: 150px;">
                                            @error('nilai3')
                                            <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group" style="margin-bottom: .2rem;">
                                            <label for="nilai4" class="control-label">Kemampuan belajar mandiri untuk
                                                mengembangkan pengetahuan yang dimiliki</label>
                                            <input type="number" id="nilai4" name="nilai4" value="{{ old('nilai4') }}"
                                                class="form-control  @error('nilai4') is-invalid @enderror"
                                                placeholder="Enter Nilai" style="width: 150px;">
                                            @error('nilai4')
                                            <div class="invalid-feedback"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-success">Selesai</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('tambah')
    @if(session('tambah'))
        <script>
                $('#tambahdata').modal('show')
        </script>
        @php
        session()->forget('tambah');
        @endphp
    @endif
@endsection
@section('edit')
    @if(session('edit'))
        <script>
                $('#edit').modal('show')
        </script>
        @php
        session()->forget('edit');
        @endphp
    @endif
@endsection