@extends('halaman_komisi.main')
@section('judul','Jadwal Pendadaran')
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
                        <a href="{{ url('/halaman_komisi/laporan') }}" class="nav-link">
                            <i class="nav-icon fas fa-id-card-alt text-cyan"></i>
                            <p style="font-size: 15px;">
                                Laporan Pendadaran
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
                    {{-- <li class="nav-item">
                        <a href="#" class="nav-link ">
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
                <a href="#" class="nav-link active">
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
<div class="card-body">
    <div class="table-responsive-md">
        <table id="example1" class="table">
            <thead>
                <tr>
                    <th style="width:20px;">No</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Ruangan</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $a = 0;
                @endphp
                @foreach($mahasiswa as $value)
                    @php
                    $hasiljadwal = \DB::table('tb_jadwal AS j')->select('j.id_mhs','j.id_jadwal','m.id_mahasiswa','m.nama','m.nim','j.deleted_at','j.id_dsn1','j.id_dsn2','j.id_dsn3','j.id_dsn4')
                        ->join('tb_mhs AS m', 'j.id_mhs', '=', 'm.id_mahasiswa')
                        ->where('j.id_mhs','=',$value->id_mahasiswa)
                        ->where('j.deleted_at','!=',NULL)
                        ->orderBy('j.id_jadwal','desc')->limit(1) 
                        ->first();
                    @endphp
                    @if ($value->tahap == 3 || $value->tahap == 4 || $value->tahap == 5)
                    <tr>
                        <th class="d-flex justify-content-center">@php
                            echo $a = $a+1;
                        @endphp</th>
                        <td>{{ $value->nama }}</td>
                        <td>{{ $value->nim }}</td>
                        @if($value->tahap == 3)
                        <td>----------</td>
                            @elseif($value->tahap == 4 || $value->tahap == 5)
                            <td>{{ \Carbon\Carbon::parse( $value->jadwal->tanggal )->isoFormat('dddd, D MMMM Y') }}</td>
                        @endif
                        @if($value->tahap == 3)
                        <td>--------</td>
                            @elseif($value->tahap == 4 || $value->tahap == 5)
                            <td>{{ $value->jadwal->shiftmulai }} - {{ $value->jadwal->shiftselesai }}</td>
                        @endif
                        @if($value->tahap == 3)
                        <td>------------</td>
                            @elseif($value->tahap == 4 || $value->tahap == 5)
                            <td>{{ $value->jadwal->ruang }}</td>
                        @endif
                        @if ($value->tahap == 3)
                        <!-- Tambah Jadwal  -->
                        <td class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary btn-xs btn-flat" style="font-size: 16px;"
                            data-toggle="modal" data-target="#tambahdata{{$value->id_mahasiswa}}">Tambah Jadwal</button>
                            <!-- Modal Tambah Data -->
                            <div class="modal fade" id="tambahdata{{$value->id_mahasiswa}}" data-backdrop="static" tabindex="-1" role="dialog"
                                aria-labelledby="tambahdataLabel" aria-hidden="true">
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
                                                <form action="/halaman_komisi/jadwalkomisi" method="POST">
                                                    @csrf
                                                    <div class="form-group" style="margin-bottom: .2rem; 
                                                            color:black; font-weight:normal; text-transform:capitalize;">
                                                            <label for="id_mhs" class="control-label"
                                                                style="color: #0081d8; text-transform:uppercase;">Nama Mahasiswa
                                                            </label>
                                                            <textarea class="form-control" rows="1"
                                                                readonly>{{ $value->nama }}</textarea>
                                                            @error('id_mhs')
                                                            <div class="invalid-feedback"> {{ $message }}</div>
                                                            @enderror
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: .2rem; 
                                                            color:black; font-weight:normal; text-transform:capitalize;">
                                                            <textarea class="form-control" rows="1" name="id_mhs" id="id_mhs"
                                                                hidden>{{ $value->id_mahasiswa }}</textarea>
                                                            @error('id_mhs')
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
                                                            <option value="Ruangan Sidang 1" @if(old('ruangan')=='Ruangan Sidang 1' ) selected @endif>
                                                                Ruangan Sidang 1</option>
                                                            <option value="Ruangan Sidang 2" @if(old('ruangan')=='Ruangan Sidang 2' ) selected @endif>
                                                                Ruangan Sidang 2</option>
                                                            <option value="Ruangan Sidang 3" @if(old('ruangan')=='Ruangan Sidang 3' ) selected @endif>
                                                                Ruangan Sidang 3</option>
                                                        </select>
                                                        @error('ruangan')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: .2rem;">
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
                                                    <div class="form-group" style="margin-bottom: .2rem;">
                                                        <label for="timepicker" class="control-label"
                                                            style="color: #0081d8; text-transform:uppercase;">Mulai Jam:</label>
                                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                            <input type="text" value="{{ old('timepicker') }}" name="timepicker"
                                                                class="form-control datetimepicker-input @error('timepicker') is-invalid @enderror"
                                                                placeholder="Isi jam mulai" data-target="#timepicker"/>
                                                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                            </div>
                                                            @error('timepicker')
                                                            <div class="invalid-feedback"> {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: .2rem;">
                                                        <label for="timepicker1" class="control-label"
                                                            style="color: #0081d8; text-transform:uppercase;">Sampai Jam:</label>
                                                        <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                                            <input type="text" value="{{ old('timepicker1') }}" name="timepicker1"
                                                                class="form-control @error('timepicker1') is-invalid @enderror datetimepicker-input"
                                                                placeholder="Isi jam selesai" data-target="#timepicker1" />
                                                            <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                            </div>
                                                            @error('timepicker1')
                                                            <div class="invalid-feedback"> {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
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
                        </td>
                        @elseif ($value->tahap == 4)
                            <td class="d-flex justify-content-center">
                                <!-- Tambah Penguji  -->
                                <button type="button" class="btn btn-success btn-xs btn-flat" style="font-size: 16px;"
                                    data-toggle="modal" data-target="#edit{{ $value->jadwal->id_jadwal }}">Tambah Penguji</button>
                                <!-- Modal Tambah Penguji -->
                                <div class="modal fade" id="edit{{ $value->jadwal->id_jadwal }}" data-backdrop="static" role="dialog" aria-labelledby="editLabel" aria-hidden="true" style="overflow:hidden;">
                                    <div class="modal-dialog" role="document" style="max-width:700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editLabel">Tambah Penguji</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                <div class="col-xs-12">
                                                    <form action="/halaman_komisi/jadwalkomisi/{{ $value->jadwal->id_jadwal }}"
                                                        method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        <div class="form-group" style="margin-bottom: .2rem;">
                                                            <label for="id_dsn1" class="control-label"
                                                                style="color: #0081d8; text-transform:uppercase;">Nama Ketua
                                                                Dosen Penguji</label>
                                                            <select class="form-control @error('id_dsn1') is-invalid @enderror" 
                                                                name="id_dsn1" id="id_dsn1">
                                                                <option value="" disabled selected>Pilih Dosen
                                                                    Penguji
                                                                </option>
                                                                @foreach ($dosen as $dsn1)
                                                                    @if($hasiljadwal != NULL)
                                                                        @if(old('id_dsn1')== $dsn1->id_dosen)
                                                                            <option selected value="{{ $dsn1->id_dosen }}">
                                                                            {{ $dsn1->nama }}</option>
                                                                        @else
                                                                            <option @if($dsn1->id_dosen == $hasiljadwal->id_dsn1)
                                                                                selected @endif
                                                                                value="{{ $dsn1->id_dosen }}">
                                                                                {{ $dsn1->nama }}
                                                                                @if (in_array($dsn1->id_dosen, [$value->pembimbing1, $value->pembimbing2]))
                                                                                (TA)
                                                                                @endif
                                                                            </option>
                                                                        @endif
                                                                    @else
                                                                        <option value="{{ $dsn1->id_dosen}}"
                                                                            @if(old('id_dsn1')== $dsn1->id_dosen )
                                                                            selected
                                                                            @endif>
                                                                            {{ $dsn1->nama }} 
                                                                            @if (in_array($dsn1->id_dosen, [$value->pembimbing1, $value->pembimbing2]))
                                                                            (TA)
                                                                            @endif
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
                                                                Dosen Penguji</label>
                                                            <select class="form-control @error('id_dsn2') is-invalid @enderror"
                                                                name="id_dsn2" id="id_dsn2">
                                                                <option value="" disabled selected>Pilih Dosen
                                                                    Penguji
                                                                </option>
                                                                @foreach ($dosen as $dsn2)
                                                                @if($hasiljadwal != NULL)
                                                                    @if(old('id_dsn2')== $dsn2->id_dosen)
                                                                    <option selected value="{{ $dsn2->id_dosen }}">
                                                                        {{ $dsn2->nama }}</option>
                                                                    @else
                                                                    <option @if($dsn2->id_dosen == $hasiljadwal->id_dsn2)
                                                                        selected
                                                                        @endif
                                                                        value="{{ $dsn2->id_dosen }}">
                                                                        {{ $dsn2->nama }}
                                                                        @if (in_array($dsn2->id_dosen, [$value->pembimbing1, $value->pembimbing2]))
                                                                        (TA)
                                                                        @endif
                                                                    </option>
                                                                    @endif
                                                                @else
                                                                    <option value="{{ $dsn2->id_dosen}}"
                                                                        @if(old('id_dsn2')== $dsn2->id_dosen )
                                                                        selected
                                                                        @endif 
                                                                        >
                                                                        {{ $dsn2->nama }} 
                                                                        @if (in_array($dsn2->id_dosen, [$value->pembimbing1, $value->pembimbing2]))
                                                                        (TA)
                                                                        @endif
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
                                                                Dosen Penguji</label>
                                                            <select
                                                                class="form-control @error('id_dsn3') is-invalid @enderror"
                                                                name="id_dsn3" id="id_dsn3">
                                                                <option value="" disabled selected>Pilih Dosen
                                                                    Penguji
                                                                </option>
                                                                @foreach ($dosen as $dsn3)
                                                                @if($hasiljadwal != NULL)
                                                                    @if(old('id_dsn3')== $dsn3->id_dosen)
                                                                    <option selected value="{{ $dsn3->id_dosen }}">
                                                                        {{ $dsn3->nama }}</option>
                                                                    @else
                                                                    <option @if($dsn3->id_dosen == $hasiljadwal->id_dsn3)
                                                                        selected
                                                                        @endif
                                                                        value="{{ $dsn3->id_dosen }}">
                                                                        {{ $dsn3->nama }}
                                                                        @if (in_array($dsn3->id_dosen, [$value->pembimbing1, $value->pembimbing2]))
                                                                        (TA)
                                                                        @endif
                                                                    </option>
                                                                    @endif
                                                                @else
                                                                    <option value="{{ $dsn3->id_dosen}}"
                                                                        @if(old('id_dsn3')== $dsn3->id_dosen )
                                                                        selected
                                                                        @endif 
                                                                        >
                                                                        {{ $dsn3->nama }} 
                                                                        @if (in_array($dsn3->id_dosen, [$value->pembimbing1, $value->pembimbing2]))
                                                                        (TA)
                                                                        @endif
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
                                                                style="color: #0081d8; text-transform:uppercase;">Nama Dosen Penguji</label>
                                                            <select
                                                                class="form-control @error('id_dsn4') is-invalid @enderror"
                                                                name="id_dsn4" id="id_dsn4">
                                                                <option value="" disabled selected>Pilih Dosen Penguji
                                                                </option>
                                                                @foreach ($dosen as $dsn4)
                                                                @if($hasiljadwal != NULL)
                                                                    @if(old('id_dsn4')== $dsn4->id_dosen)
                                                                    <option selected value="{{ $dsn4->id_dosen }}">
                                                                        {{ $dsn4->nama }}</option>
                                                                    @else
                                                                    <option @if($dsn4->id_dosen == $hasiljadwal->id_dsn4)
                                                                        selected
                                                                        @endif
                                                                        value="{{ $dsn4->id_dosen }}">
                                                                        {{ $dsn4->nama }}
                                                                        @if (in_array($dsn4->id_dosen, [$value->pembimbing1, $value->pembimbing2]))
                                                                        (TA)
                                                                        @endif
                                                                    </option>
                                                                    @endif
                                                                @else
                                                                    <option value="{{ $dsn4->id_dosen}}"
                                                                        @if(old('id_dsn4')== $dsn4->id_dosen )
                                                                        selected
                                                                        @endif 
                                                                        >
                                                                        {{ $dsn4->nama }} 
                                                                        @if (in_array($dsn4->id_dosen, [$value->pembimbing1, $value->pembimbing2]))
                                                                        (TA)
                                                                        @endif
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
                            </td>
                        @elseif ($value->tahap == 5)
                            <td class="d-flex justify-content-center">
                                <!-- Button Lihat Data -->
                                <button type="button" class="btn btn-info btn-xs btn-flat" style="margin: 0 5px 0 0;"
                                    data-toggle="modal" data-target="#lihatinfo{{ $value->jadwal->id_jadwal }}">
                                    <i class="fa fa-eye"> </i>
                                </button>
                                <!-- Modal Lihat Data -->
                                <div class="modal fade" data-backdrop="static" id="lihatinfo{{ $value->jadwal->id_jadwal }}"
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
                                                            <td>{{ $value->nama }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" style="color: #007bff">NIM</th>
                                                            <th>:</th>
                                                            <td>{{ $value->nim }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" style="color: #007bff">Jadwal Pendadaran</th>
                                                            <th>:</th>
                                                            <td>{{ \Carbon\Carbon::parse( $value->jadwal->tanggal )->isoFormat('dddd, D MMMM Y') }},
                                                                {{ $value->jadwal->shiftmulai }} - {{ $value->jadwal->shiftselesai }},
                                                                {{ $value->jadwal->ruang }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" style="color: #007bff">Dosen Penguji 1</th>
                                                            <th>:</th>
                                                            @foreach ($dosen as $faker)
                                                            @if($faker->id_dosen == $value->jadwal->id_dsn1)
                                                            <td> {{ $faker->nama }}</td>
                                                            @endif
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" style="color: #007bff">Dosen Penguji 2</th>
                                                            <th>:</th>
                                                            @foreach ($dosen as $faker)
                                                            @if($faker->id_dosen == $value->jadwal->id_dsn2)
                                                            <td> {{ $faker->nama }}</td>
                                                            @endif
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" style="color: #007bff">Dosen Penguji 3</th>
                                                            <th>:</th>
                                                            @foreach ($dosen as $faker)
                                                            @if($faker->id_dosen == $value->jadwal->id_dsn3)
                                                            <td> {{ $faker->nama }}</td>
                                                            @endif
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" style="color: #007bff">Dosen Penguji 4</th>
                                                            <th>:</th>
                                                            @foreach ($dosen as $faker)
                                                            @if($faker->id_dosen == $value->jadwal->id_dsn4)
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
                                                <form action="/halaman_admin/kms/data_komisi/" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Yakin Mau dihapus ?')">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button Ubah Data -->
                                <button type="button" class="btn btn-default btn-xs btn-flat" style="margin: 0 5px 0 0;"
                                    data-toggle="modal" data-target="#ubah{{ $value->jadwal->id_jadwal }}">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <!-- Modal Ubah Data -->
                                <div class="modal fade " id="ubah{{ $value->jadwal->id_jadwal }}" data-backdrop="static" tabindex="-1" --}}
                                    role="dialog" aria-labelledby="ubahLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-width:700px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ubahLabel">Edit Data Penjadwalan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-xs-12">
                                                    <form action="/halaman_komisi/jadwalkomisi/{{ $value->jadwal->id_jadwal }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf
                                                        <div class="form-group" style="margin-bottom: .2rem;" >
                                                            <label for="nama" class="control-label">Nama</label>
                                                            <textarea class="form-control" rows="1"
                                                                readonly>{{ $value->nama }}</textarea>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: .2rem;" >
                                                            <label for="nip" class="control-label">NIM</label>
                                                            <textarea class="form-control" rows="1"
                                                                readonly>{{ $value->nim }}</textarea>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: .2rem;">
                                                            <label for="tanggal" class="control-label"
                                                                style="color: #0081d8; text-transform:uppercase;">Tanggal
                                                                Seminar</label>
                                                            <input type="date" value="{{ $value->jadwal->tanggal }}"
                                                                class="form-control @error('tanggal') is-invalid @enderror"
                                                                id="tanggal" name="tanggal" placeholder="Enter Tanggal Seminar">
                                                            @error('tanggal')
                                                            <div class="invalid-feedback"> {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: .2rem;">
                                                            <label for="timepicker2{{ $value->jadwal->id_jadwal }}" class="control-label"
                                                                style="color: #0081d8; text-transform:uppercase;">Mulai
                                                                Jam:</label>
                                                            <div class="input-group date" id="timepicker2{{ $value->jadwal->id_jadwal }}"
                                                                data-target-input="nearest">
                                                                <input type="text" value="{{ $value->jadwal->shiftmulai }}" name="timepicker2"
                                                                    class="form-control datetimepicker-input @error('timepicker2') is-invalid @enderror"
                                                                    data-target="#timepicker2{{ $value->jadwal->id_jadwal }}"/>
                                                                <div class="input-group-append" data-target="#timepicker2{{ $value->jadwal->id_jadwal }}"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="far fa-clock"></i>
                                                                    </div>
                                                                </div>
                                                                @error('timepicker2')
                                                                <div class="invalid-feedback"> {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: .2rem;">
                                                            <label for="timepicker3{{ $value->jadwal->id_jadwal }}" class="control-label"
                                                                style="color: #0081d8; text-transform:uppercase;">Sampai
                                                                Jam:</label>
                                                            <div class="input-group date" id="timepicker3{{ $value->jadwal->id_jadwal }}"
                                                                data-target-input="nearest">
                                                                <input type="text" value="{{ $value->jadwal->shiftselesai }}" name="timepicker3"
                                                                    class="form-control @error('timepicker3') is-invalid @enderror datetimepicker-input"
                                                                    data-target="#timepicker3{{ $value->id_jadwal }}"/>
                                                                <div class="input-group-append" data-target="#timepicker3{{ $value->jadwal->id_jadwal }}"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="far fa-clock"></i>
                                                                    </div>
                                                                </div>
                                                                @error('timepicker3')
                                                            <div class="invalid-feedback"> {{ $message }}</div>
                                                            @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: .2rem">
                                                            <label for="ruangan"
                                                                style="color: #0081d8; text-transform:uppercase;"
                                                                class="control-label">Ruangan</label>
                                                            <select class="form-control @error('ruangan') is-invalid @enderror"
                                                                name="ruangan" id="ruangan">
                                                                <option value="" disabled selected>Pilih Ruangan
                                                                </option>
                                                                <option value="Ruangan Sidang 1" @if($value->jadwal->ruang ==
                                                                    'Ruangan Sidang 1') selected @endif>
                                                                    Ruangan Sidang 1</option>
                                                                <option value="Ruangan Sidang 2" @if($value->jadwal->ruang ==
                                                                    'Ruangan Sidang 2') selected @endif>
                                                                    Ruangan Sidang 2</option>
                                                                <option value="Ruangan Sidang 3" @if($value->jadwal->ruang ==
                                                                    'Ruangan Sidang 3') selected @endif>
                                                                    Ruangan Sidang 3</option>
                                                            </select>
                                                            @error('ruangan')
                                                            <div class="invalid-feedback"> {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: .2rem;">
                                                            <label for="id_dsn1" class="control-label"
                                                                style="color: #0081d8; text-transform:uppercase;">Nama
                                                                Dosen</label>
                                                            <select
                                                                class="form-control @error('id_dsn1') is-invalid @enderror"
                                                                name="id_dsn1" id="id_dsn1">
                                                                <option value="" disabled selected>Pilih Dosen
                                                                    Penguji
                                                                </option>
                                                                @foreach ($dosen as $faker)
                                                                @if(old('id_dsn1')== $faker->id_dosen)
                                                                <option selected value="{{ $faker->id_dosen }}">
                                                                    {{ $faker->nama }}</option>
                                                                @else
                                                                <option @if($faker->id_dosen == $value->jadwal->id_dsn1)
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
                                                                class="form-control @error('id_dsn2') is-invalid @enderror"
                                                                name="id_dsn2" id="id_dsn2">
                                                                <option value="" disabled selected>Pilih Dosen
                                                                    Penguji
                                                                </option>
                                                                @foreach ($dosen as $faker)
                                                                @if(old('id_dsn2')== $faker->id_dosen)
                                                                <option selected value="{{ $faker->id_dosen }}">
                                                                    {{ $faker->nama }}</option>
                                                                @else
                                                                <option @if($faker->id_dosen == $value->jadwal->id_dsn2)
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
                                                                class="form-control @error('id_dsn3') is-invalid @enderror"
                                                                name="id_dsn3" id="id_dsn3">
                                                                <option value="" disabled selected>Pilih Dosen
                                                                    Penguji
                                                                </option>
                                                                @foreach ($dosen as $faker)
                                                                @if(old('id_dsn3')== $faker->id_dosen)
                                                                <option selected value="{{ $faker->id_dosen }}">
                                                                    {{ $faker->nama }}</option>
                                                                @else
                                                                <option @if($faker->id_dosen == $value->jadwal->id_dsn3)
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
                                                                class="form-control @error('id_dsn4') is-invalid @enderror"
                                                                name="id_dsn4" id="id_dsn4">
                                                                <option value="" disabled selected>Pilih Dosen
                                                                    Penguji
                                                                </option>
                                                                @foreach ($dosen as $faker)
                                                                @if(old('id_dsn4')== $faker->id_dosen)
                                                                <option selected value="{{ $faker->id_dosen }}">
                                                                    {{ $faker->nama }}</option>
                                                                @else
                                                                <option @if($faker->id_dosen == $value->jadwal->id_dsn4)
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
                                <!-- Link Hapus Data -->
                                <a href="/halaman_komisi/jadwalkomisi/{{$value->jadwal->id_jadwal}}"
                                    class="btn btn-danger btn-xs btn-flat delete-confirm" style="margin: 0 5px 0 0;"><i class="fa fa-trash"></i>
                                </a>
                                <!-- Button Print Surat -->
                                <button type="button" class="btn btn-success btn-xs btn-flat" style="margin: 0 5px 0 0;"
                                    data-toggle="modal" data-target="#pdf{{$value->id_mahasiswa}}">
                                    <i class="fas fa-print"> </i>
                                </button>
                                <!-- Modal Print -->
                                <div class="modal fade" data-backdrop="static" id="pdf{{$value->id_mahasiswa}}"
                                    tabindex="-1" role="dialog" aria-labelledby="lihatinfoLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="max-width:550px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="lihatinfoLabel">Surat Surat Pendadaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/halaman_komisi/print/{{$value->id_mahasiswa}}" method="POST">
                                                    @csrf
                                                    <div class="form-group" style="margin-bottom: .2rem; 
                                                        font-weight:normal; text-transform:capitalize;">
                                                        <label for="nosurat" class="control-label"
                                                            style="color: #0081d8; text-transform:uppercase;">Nomor Surat
                                                        </label>
                                                        @if($value->jadwal->nosurat == NULL)
                                                        <input type="text" id="nosurat" name="nosurat" value="{{ old('nosurat') }}" 
                                                        class="form-control @error('nosurat') is-invalid @enderror" placeholder="436/UN23.08.6.04/PP.05.02/2020">
                                                        @else
                                                        <input type="text" id="nosurat" name="nosurat" value="{{ $value->jadwal->nosurat }}" 
                                                        class="form-control @error('nosurat') is-invalid @enderror">
                                                        @endif
                                                        @error('nosurat')
                                                        <div class="invalid-feedback"> {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                        @if($value->jadwal->nosurat == NULL)
                                                        <button type="submit" class="btn btn-primary">Selesai</button>
                                                        @else
                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                        @endif
                                                    </div>
                                                </form>
                                                
                                                <form>
                                                    @if($value->jadwal->nosurat == NULL)
                                                    @else
                                                    <table>
                                                        <tr>
                                                            <td><a href="/halaman_komisi/daftarpenilaian/{{$value->id_mahasiswa}}" class="btn btn-danger" style="margin-right: 15px;"><i class="fas fa-print"></i></a>Surat LAMPIRAN PENILAIAN UJIAN KOMPREHENSIF</td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td><a href="/halaman_komisi/daftarhadir/{{$value->id_mahasiswa}}" class="btn btn-danger" style="margin-right: 15px;"><i class="fas fa-print"></i></a>Surat LAMPIRAN DAFTAR HADIR UJIAN KOMPREHENSIF</td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td><a href="/halaman_komisi/daftarundanganpendadaran/{{$value->id_mahasiswa}}" class="btn btn-danger" style="margin-right: 15px;"><i class="fas fa-print"></i></a>Surat UNDANGAN PENGUJI PENDADARAN</td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td><a href="/halaman_komisi/daftarberitaacara/{{$value->id_mahasiswa}}" class="btn btn-danger" style="margin-right: 15px;"><i class="fas fa-print"></i></a>Surat LAMPIRAN BERITA ACARA UJIAN KOMPREHENSIF</td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td><a href="/halaman_komisi/daftarnilaidosen/{{$value->id_mahasiswa}}" class="btn btn-danger" style="margin-right: 15px;"><i class="fas fa-print"></i></a>Surat LAMPIRAN PENILAIAN UJIAN KOMPREHENSIF DOSEN</td>
                                                        </tr>
                                                    </table>
                                                    @endif
                                                    
                                                </form>
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
</div>
@endsection
@section('tambah')
    @if(session('tambah'))
        <script>
                $('#tambahdata{{$value->id_mahasiswa}}').modal('show')
        </script>
        @php
        session()->forget('tambah');
        @endphp
    @endif
@endsection
@section('edit')
    @if(session('edit'))
        <script>
                $('#edit{{session('edit')}}').modal('show')
        </script>
        @php
        session()->forget('edit');
        @endphp
    @endif
@endsection
@section('ubah')
    @if(session('ubah'))
        <script>
                $('#ubah{{session('ubah')}}').modal('show')
        </script>
        @php
        session()->forget('ubah');
        @endphp
    @endif
@endsection
@section('pdf')
    @if(session('pdf'))
        <script>
                $('#pdf{{session('pdf')}}').modal('show')
        </script>
        @php
        session()->forget('pdf');
        @endphp
    @endif
@endsection

@section('pagejs')
    <script>
        $('#timepicker').datetimepicker({
            format: 'HH:mm',
            use24hours : true
        })
        $('#timepicker1').datetimepicker({
            format: 'HH:mm',
            use24hours : true
        })
    </script>
    @foreach ($jadwal as $value)
        <script>
            var timepicker2 = '#timepicker2' + <?php echo $value->id_jadwal?>;
            var timepicker3 = '#timepicker3' + <?php echo $value->id_jadwal?>;
            $(timepicker2).datetimepicker({
                format: 'HH:mm',
                use24hours : true
            })
            $(timepicker3).datetimepicker({
                format: 'HH:mm',
                use24hours : true
            })
        </script>
    @endforeach
@endsection