@extends('halaman_komisi.main')
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
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Data Pendadaran
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 10px;">
                <li class="nav-item">
                    <a href="{{ url('/halaman_komisi/pengajuan') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list text-cyan"></i>
                        <p style="font-size: 15px;">
                            Data Pengajuan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/halaman_komisi/laporan') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list text-cyan"></i>
                        <p style="font-size: 15px;">
                            Laporan Pendadaran
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Jadwal Pendadaran
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 10px;">
                <li class="nav-item">
                    <a href="#" class="nav-link active">
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
                </li>
                <li class="nav-item">
                    <a href="{{ url('/halaman_komisi/jadwalkomisi') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list text-cyan"></i>
                        <p style="font-size: 15px;">
                            Jadwal Pendadaran
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        <div class="dropdown-divider"></div>
        <li class="header" style="color:white; margin-left:18px;">KEAMANAN</li>
        <div class="dropdown-divider"></div>
        <li class="nav-item">
            <a href="{{ url('/halaman_komisi/edit') }}" class="nav-link">
                <i class="nav-icon fas fa-cogs text-blue"></i>
                <p>
                    Ubah Password
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt text-red"></i>
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
<!-- Tambah Data -->
<button type="button" class="btn btn bg-blue margin margin-bottom" data-toggle="modal" data-target="#tambahdata"><i
        class="fa fa-user-plus"> Tambah Jadwal</i></button>
<!-- Modal -->
<div class="modal fade" id="tambahdata" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tambahdataLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-width:700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahdataLabel">Tambah Jadwal
                    Pendadaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xs-12">
                    <form action="/halaman_komisi/list" method="POST">
                        @csrf
                        <div class="form-group"
                            style="margin-bottom: .2rem; color:black; font-weight:normal; text-transform:capitalize;">
                            <label for="id_mhs" class="control-label"
                                style="color: #0081d8; text-transform:uppercase;">Nama
                                Mahasiswa</label>
                            <select class="form-control select2bs4 @error('id_mhs') is-invalid @enderror" name="id_mhs"
                                id="id_mhs">
                                <option value="" disabled selected>Pilih Mahasiswa
                                </option>
                                @foreach ($mahasiswa as $value) @if ($value->tahap
                                == 3) @if(old('id_mhs')=='($value as nama)' )
                                selected @endif <option value="{{ $value->id_mahasiswa}}">
                                    {{ $value->nama }}</option>
                                @endif @endforeach
                            </select>
                            @error('nama')
                            <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" style="margin-bottom: .2rem;">
                            <label for="shift" class="control-label"
                                style="color: #0081d8; text-transform:uppercase;">Shift</label>
                            <select class="form-control @error('shift') is-invalid @enderror" name="shift" id="shift">
                                <option value="" disabled selected>Pilih Shift
                                </option>
                                <option value="SHIFT 1 (Jam 8-10)" @if(old('shift')=='SHIFT 1 (Jam 8-10)' ) selected
                                    @endif>
                                    SHIFT 1 (Jam 8-10)</option>
                                <option value="SHIFT 2 (Jam 10-12)" @if(old('shift')=='SHIFT 2 (Jam 10-12)' ) selected
                                    @endif>
                                    SHIFT 2 (Jam 10-12)</option>
                                <option value="SHIFT 3 (Jam 12-14)" @if(old('shift')=='shift3 (Jam 12-14)' ) selected @endif>
                                    SHIFT 3 (Jam 12-14)</option>
                                <option value="SHIFT 4 (Jam 14-16)" @if(old('shift')=='SHIFT 4 (Jam 14-16)' ) selected
                                    @endif>
                                    SHIFT 4 (Jam 14-16)</option>
                            </select>
                            @error('shift')
                            <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" style="margin-bottom: .2rem">
                            <label for="ruangan" style="color: #0081d8; text-transform:uppercase;"
                                class="control-label">Ruangan</label>
                            <select class="form-control @error('ruangan') is-invalid @enderror" name="ruangan"
                                id="ruangan">
                                <option value="" disabled selected>Pilih Ruangan
                                </option>
                                <option value="Ruangan 1" @if(old('ruangan')=='Ruangan 1' ) selected @endif>
                                    Ruangan 1</option>
                                <option value="Ruangan 2" @if(old('ruangan')=='Ruangan 2' ) selected @endif>
                                    Ruangan 2</option>
                                <option value="Ruangan 3" @if(old('ruangan')=='Ruangan 3' ) selected @endif>
                                    Ruangan 3</option>
                            </select>
                            @error('ruangan')
                            <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" style="margin-bottom: .2rem" ;>
                            <label for="tanggal" class="control-label"
                                style="color: #0081d8; text-transform:uppercase;">Tanggal
                                Seminar</label>
                            <input type="date" value="{{ old('tanggal') }}"
                                class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"
                                placeholder="Enter Tanggal Seminar">
                            @error('tanggal')
                            <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Selesai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    @section('card-body')
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width:20px;">No</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Jadwal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $value)
                @if ($value->mahasiswa->tahap == 4 || $value->mahasiswa->tahap == 5 || $value->mahasiswa->tahap == 6)
                <tr>
                    <th>{{ $loop->iteration}}</th>
                    <td>{{ $value->mahasiswa->nama }}</td>
                    <td>{{ $value->mahasiswa->nim }}</td>
                    <td>{{ $value->ruang }}, {{ $value->tanggal }}, {{ $value->shift }}</td>
                    @if ($value->mahasiswa->tahap == 4)
                    <td width="120px">
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-xs btn-flat" style="font-size: 16px;"
                                data-toggle="modal" data-target="#tambah{{ $value->id_jadwal }}">Tambah Penguji</button>
                            <!-- Modal -->
                            <div class="modal fade" id="tambah{{ $value->id_jadwal }}" data-backdrop="static"
                                tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document"
                                    style="max-width:700px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahLabel">Tambah Penguji</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-xs-12">
                                                <form action="/halaman_komisi/list/{{ $value->id_jadwal }}"
                                                    method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <div class="form-group" style="margin-bottom: .2rem;">
                                                        <label for="id_dsn1" class="control-label"
                                                            style="color: #0081d8; text-transform:uppercase;">Nama Ketua
                                                            Dosen Penguji</label>
                                                        <select
                                                            class="form-control select2bs4 @error('id_dsn1') is-invalid @enderror"
                                                            name="id_dsn1" id="id_dsn1">
                                                            <option value="" disabled selected>Pilih Dosen
                                                                Penguji
                                                            </option>
                                                            @foreach ($dosen as $value)
                                                            @if(old('id_dsn1')=='($value as id_dsn1)' ) selected
                                                            @endif <option value="{{ $value->id_dosen}}">
                                                                {{ $value->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_dsn1')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: .2rem;">
                                                        <label for="id_dsn2" class="control-label"
                                                            style="color: #0081d8; text-transform:uppercase;">Nama
                                                            Dosen Penguji</label>
                                                        <select
                                                            class="form-control select2bs4 @error('id_dsn2') is-invalid @enderror"
                                                            name="id_dsn2" id="id_dsn2">
                                                            <option value="" disabled selected>Pilih Dosen
                                                                Penguji
                                                            </option>
                                                            @foreach ($dosen as $value)
                                                            @if(old('id_dsn2')=='($value as id_dsn2)' ) selected
                                                            @endif <option value="{{ $value->id_dosen}}">
                                                                {{ $value->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_dsn2')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: .2rem;">
                                                        <label for="id_dsn3" class="control-label"
                                                            style="color: #0081d8; text-transform:uppercase;">Nama
                                                            Dosen Penguji</label>
                                                        <select
                                                            class="form-control select2bs4 @error('id_dsn3') is-invalid @enderror"
                                                            name="id_dsn3" id="id_dsn3">
                                                            <option value="" disabled selected>Pilih Dosen
                                                                Penguji
                                                            </option>
                                                            @foreach ($dosen as $value)
                                                            @if(old('id_dsn3')=='($value as id_dsn3)' ) selected
                                                            @endif <option value="{{ $value->id_dosen}}">
                                                                {{ $value->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_dsn3')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: .2rem;">
                                                        <label for="id_dsn4" class="control-label"
                                                            style="color: #0081d8; text-transform:uppercase;">Nama
                                                            Dosen Penguji</label>
                                                        <select
                                                            class="form-control select2bs4 @error('id_dsn4') is-invalid @enderror"
                                                            name="id_dsn4" id="id_dsn4">
                                                            <option value="" disabled selected>Pilih Dosen
                                                                Penguji
                                                            </option>
                                                            @foreach ($dosen as $value)
                                                            @if(old('id_dsn4')=='($value as id_dsn4)' ) selected
                                                            @endif <option value="{{ $value->id_dosen}}">
                                                                {{ $value->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_dsn4')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Keluar</button>
                                                        <button type="submit" class="btn btn-primary">Selesai</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    @elseif ($value->mahasiswa->tahap == 5 || $value->mahasiswa->tahap == 6)
                    <td width="120px">
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info btn-xs btn-flat" style="margin: 0 5px 0 0;" 
                                data-toggle="modal" data-target="#lihatinfo{{ $value->id_jadwal }}">
                                <i class="fa fa-eye"> </i>
                            </button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-default btn-xs btn-flat" style="margin: 0 5px 0 0;"
                                data-toggle="modal" data-target="#ubah{{ $value->id_jadwal }}">
                                <i class="fa fa-pencil-alt"></i></button>
                            <!-- Link Hapus Data -->
                            <a href="/halaman_admin/kms/data_komisi/{{$value->id_jadwal}}"
                                class="btn btn-danger btn-xs btn-flat delete-confirm"><i class="fa fa-trash"></i>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="ubah{{ $value->id_jadwal }}" data-backdrop="static"
                                tabindex="-1" role="dialog" aria-labelledby="ubahLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document"
                                    style="max-width:700px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ubahLabel">Edit Data Penjadwalan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-xs-12">
                                                <form action="/halaman_komisi/list/{{ $value->id_jadwal }}"
                                                    method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <div class="form-group" style="margin-bottom: .2rem" ;>
                                                        <label for="nama" class="control-label">Nama</label>
                                                        <textarea class="form-control" rows="1"
                                                            readonly>{{ $value->mahasiswa->nama }}</textarea>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: .2rem" ;>
                                                        <label for="nip" class="control-label">NIM</label>
                                                        <textarea class="form-control" rows="1"
                                                            readonly>{{ $value->mahasiswa->nim }}</textarea>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: .2rem" ;>
                                                        <label for="tanggal_lahir" class="control-label">Jadwal
                                                            Pendadaran
                                                        </label>
                                                        <textarea class="form-control" rows="1"
                                                            readonly>{{ $value->ruang }}, {{ $value->tanggal }}, {{ $value->shift }}</textarea>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: .2rem;">
                                                        <label for="id_dsn1" class="control-label"
                                                            style="color: #0081d8; text-transform:uppercase;">Nama
                                                            Dosen</label>
                                                        <select
                                                            class="form-control select2bs4 @error('id_dsn1') is-invalid @enderror"
                                                            name="id_dsn1" id="id_dsn1">
                                                            <option value="" disabled selected>Pilih Dosen
                                                                Penguji
                                                            </option>
                                                            @foreach ($dosen as $faker)
                                                            @if(old('id_dsn1')== $faker->id_dosen)
                                                            <option selected value="{{ $faker->id_dosen }}">
                                                                {{ $faker->nama }}</option>
                                                            @else
                                                                <option 
                                                                    @if($faker->id_dosen == $value->id_dsn1) 
                                                                        selected 
                                                                    @endif
                                                                    value="{{ $faker->id_dosen }}">{{ $faker->nama }}
                                                                </option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('id_dsn1')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: .2rem;">
                                                        <label for="id_dsn2" class="control-label"
                                                            style="color: #0081d8; text-transform:uppercase;">Nama
                                                            Dosen</label>
                                                        <select
                                                            class="form-control select2bs4 @error('id_dsn2') is-invalid @enderror"
                                                            name="id_dsn2" id="id_dsn2">
                                                            <option value="" disabled selected>Pilih Dosen
                                                                Penguji
                                                            </option>
                                                            @foreach ($dosen as $faker)
                                                            @if(old('id_dsn2')== $faker->id_dosen)
                                                            <option selected value="{{ $faker->id_dosen }}">
                                                                {{ $faker->nama }}</option>
                                                            @else
                                                                <option 
                                                                    @if($faker->id_dosen == $value->id_dsn2) 
                                                                        selected 
                                                                    @endif
                                                                    value="{{ $faker->id_dosen }}">{{ $faker->nama }}
                                                                </option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('id_dsn2')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: .2rem;">
                                                        <label for="id_dsn3" class="control-label"
                                                            style="color: #0081d8; text-transform:uppercase;">Nama
                                                            Dosen</label>
                                                        <select
                                                            class="form-control select2bs4 @error('id_dsn3') is-invalid @enderror"
                                                            name="id_dsn3" id="id_dsn3">
                                                            <option value="" disabled selected>Pilih Dosen
                                                                Penguji
                                                            </option>
                                                            @foreach ($dosen as $faker)
                                                            @if(old('id_dsn3')== $faker->id_dosen)
                                                            <option selected value="{{ $faker->id_dosen }}">
                                                                {{ $faker->nama }}</option>
                                                            @else
                                                                <option 
                                                                    @if($faker->id_dosen == $value->id_dsn3) 
                                                                        selected 
                                                                    @endif
                                                                    value="{{ $faker->id_dosen }}">{{ $faker->nama }}
                                                                </option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('id_dsn3')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: .2rem;">
                                                        <label for="id_dsn4" class="control-label"
                                                            style="color: #0081d8; text-transform:uppercase;">Nama
                                                            Dosen</label>
                                                        <select
                                                            class="form-control select2bs4 @error('id_dsn4') is-invalid @enderror"
                                                            name="id_dsn4" id="id_dsn4">
                                                            <option value="" disabled selected>Pilih Dosen
                                                                Penguji
                                                            </option>
                                                            @foreach ($dosen as $faker)
                                                            @if(old('id_dsn4')== $faker->id_dosen)
                                                            <option selected value="{{ $faker->id_dosen }}">
                                                                {{ $faker->nama }}</option>
                                                            @else
                                                                <option 
                                                                    @if($faker->id_dosen == $value->id_dsn4) 
                                                                        selected 
                                                                    @endif
                                                                    value="{{ $faker->id_dosen }}">{{ $faker->nama }}
                                                                </option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('id_dsn4')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Keluar</button>
                                                        <button type="submit" class="btn btn-primary">Selesai</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" data-backdrop="static" id="lihatinfo{{ $value->id_jadwal }}"
                                tabindex="-1" role="dialog" aria-labelledby="lihatinfoLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width:700px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="lihatinfoLabel">Informasi Komisi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="color: #007bff">Nama</th>
                                                        <th>:</th>
                                                        <td>{{ $value->mahasiswa->nama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" style="color: #007bff">NIM</th>
                                                        <th>:</th>
                                                        <td>{{ $value->mahasiswa->nim }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" style="color: #007bff">Jadwal Pendadaran</th>
                                                        <th>:</th>
                                                        <td>{{ $value->ruang }}, {{ $value->tanggal }},
                                                            {{ $value->shift }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" style="color: #007bff">Dosen Penguji 1</th>
                                                        <th>:</th>
                                                        @foreach ($dosen as $faker)
                                                        @if($faker->id_dosen == $value->id_dsn1)
                                                        <td> {{ $faker->nama }}</td>
                                                        @endif
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" style="color: #007bff">Dosen Penguji 2</th>
                                                        <th>:</th>
                                                        @foreach ($dosen as $faker)
                                                        @if($faker->id_dosen == $value->id_dsn2)
                                                        <td> {{ $faker->nama }}</td>
                                                        @endif
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" style="color: #007bff">Dosen Penguji 3</th>
                                                        <th>:</th>
                                                        @foreach ($dosen as $faker)
                                                        @if($faker->id_dosen == $value->id_dsn3)
                                                        <td> {{ $faker->nama }}</td>
                                                        @endif
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" style="color: #007bff">Dosen Penguji 4</th>
                                                        <th>:</th>
                                                        @foreach ($dosen as $faker)
                                                        @if($faker->id_dosen == $value->id_dsn4)
                                                        <td> {{ $faker->nama }}</td>
                                                        @endif
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary my-3"
                                                data-dismiss="modal">Kembali</button>
                                            <form action="/halaman_admin/kms/data_komisi/" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Yakin Mau dihapus ?')">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    @endif
                </tr>
                @endif
                @endforeach
                </tfoot>
        </table>
    </div>
    @endsection