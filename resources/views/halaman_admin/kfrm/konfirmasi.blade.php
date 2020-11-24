@extends('halaman_admin.main')
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
                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>
                        Data Pengguna
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left: 10px;">
                    <li class="nav-item">
                        <a href="{{ url('/halaman_admin/mhs/data_mahasiswa')}}" class="nav-link">
                            <i class="nav-icon fas fa-id-badge text-cyan"></i>
                            <p style="font-size: 15px;">
                                Data Mahasiswa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/halaman_admin/kms/data_komisi')}}" class="nav-link">
                            <i class="nav-icon fas fa-id-badge text-cyan"></i>
                            <p style="font-size: 15px;">
                                Data Komisi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/halaman_admin/dsn/data_dosen')}}" class="nav-link">
                            <i class="nav-icon fas fa-id-badge text-cyan"></i>
                            <p style="font-size: 15px;">
                                Data Dosen
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/halaman_admin/adm/data_admin')}}" class="nav-link">
                            <i class="nav-icon fas fa-id-badge text-cyan"></i>
                            <p style="font-size: 15px;">
                                Data Admin
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa fa-file-contract"></i>
                    <p>
                        Data Pengajuan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/halaman_admin/nilai/datanilai')}}" class="nav-link">
                    <i class="nav-icon fas fa fa-scroll"></i>
                    <p>
                        Data Nilai
                    </p>
                </a>
            </li>
            <div class="dropdown-divider"></div>
                <li class="header" style="color:white; margin-left:18px;">KEAMANAN</li>
                <div class="dropdown-divider"></div>
            <li class="nav-item">
                <a href="{{ url('/halaman_admin/edit')}}" class="nav-link">
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

@section('judul','Data Pengajuan')

@section('header')
<div class="table-responsive-md">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="width:20px;">No</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Angkatan</th>
                <th>Status</th>
                <th style="width: 120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $a = 0;
            @endphp
            @foreach($mahasiswa as $mahasiswa)
            @if ($mahasiswa->tahap ==1 || $mahasiswa->tahap ==2 || $mahasiswa->tahap ==3 || $mahasiswa->tahap ==4 || $mahasiswa->tahap ==5)
            <tr>
                <th class="d-flex justify-content-center">@php
                    echo $a = $a+1;
                @endphp</th>
                <td>{{ $mahasiswa->nama}}</td>
                <td>{{ $mahasiswa->nim}}</td>
                <td>{{ $mahasiswa->Angkatan}}</td>
                    @if ($mahasiswa->tahap ==1)
                    <td><span class="badge badge-warning" style="font-size: 1em;">Belum Konfirmasi</span></td>
                    @elseif ($mahasiswa->tahap ==2)
                    <td><span class="badge badge-danger" style="font-size: 1em;">Belum Memenuhi</span></td>
                    @elseif ($mahasiswa->tahap ==3)
                    <td><span class="badge badge-success" style="font-size: 1em;">Sudah Memenuhi</span></td>
                    @elseif ($mahasiswa->tahap ==4 || $mahasiswa->tahap ==5)
                    <td><span class="badge badge-success" style="font-size: 1em;">Sudah Dapat Jadwal</span></td>
                    @endif
                <td class="d-flex justify-content-center">
                    <!-- Lihat Data -->
                    <button type="button" class="btn btn-info btn-xs btn-flat"
                        data-toggle="modal" data-target="#lihatinfo{{ $mahasiswa->id_mahasiswa }}">Lihat Data
                    </button>
                    <!-- Modal lihat Data-->
                    <div class="modal fade" id="lihatinfo{{ $mahasiswa->id_mahasiswa }}" data-backdrop="static"
                        tabindex="-1" role="dialog " aria-labelledby="lihatinfoLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width:900px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="lihatinfoLabel">Data Pengajuan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-borderless">
                                        <thead>
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
                                                <th scope="col">Judul Tugas Akhir</th>
                                                <th>:</th>
                                                <td> {{ $mahasiswa->judulta}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Pembimbing I</th>
                                                <th>:</th>
                                                @foreach ($dosen as $value)
                                                @if($value->id_dosen == $mahasiswa->pembimbing1)
                                                <td>{{ $value->nama }}</td>
                                                @endif
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <th scope="col">Pembimbing II</th>
                                                <th>:</th>
                                                @foreach ($dosen as $value)
                                                @if($value->id_dosen == $mahasiswa->pembimbing2)
                                                <td>{{ $value->nama }}</td>
                                                @endif
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <th scope="col">Pembimbing Akademik</th>
                                                <th>:</th>
                                                @foreach ($dosen as $value)
                                                @if($value->id_dosen == $mahasiswa->pembimbingakademik)
                                                <td>{{ $value->nama }}</td>
                                                @endif
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <th scope="col">Sertifikat UEFT</th>
                                                <th>:</th>
                                                <td>{{ $mahasiswa->file1 }}</td>
                                            <td><a target="_blank" href="/halaman_admin/kfrm/konfirmasi/download/file1/{{ $mahasiswa->id_mahasiswa }}" class="btn-xs btn-primary">Lihat Data</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Transkip Nilai</th>
                                                <th>:</th>
                                                <td>{{ $mahasiswa->file2 }}</td>
                                            <td><a target="_blank" href="/halaman_admin/kfrm/konfirmasi/download/file2/{{ $mahasiswa->id_mahasiswa }}" class="btn-xs btn-primary">Lihat Data</a></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                @if ($mahasiswa->tahap == 1)
                                <div class="modal-footer justify-content-center">
                                    <form action="/halaman_admin/kfrm/konfirmasi/{{$mahasiswa->id_mahasiswa}}"
                                        method="post" class="d-inline">
                                        @method('patch')
                                        @csrf
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger my-3" data-toggle="modal" 
                                            data-target="#exampleModalCenter">
                                            Ditolak
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" 
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content bg-danger">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Ditolak dengan Alasan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <textarea name="alasan" id="alasan" cols="62" rows="3"></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="/halaman_admin/kfrm/konfirmasi/{{$mahasiswa->id_mahasiswa}}"
                                        method="post" class="d-inline">
                                        @method('put')
                                        @csrf
                                        <button type="submit" class="btn btn-success my-3">Diterima</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection