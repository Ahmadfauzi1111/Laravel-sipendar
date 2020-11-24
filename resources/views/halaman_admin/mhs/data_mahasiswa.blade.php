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
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>
                        Data Pengguna
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left: 10px;">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
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
                <a href="{{ url('/halaman_admin/kfrm/konfirmasi')}}" class="nav-link">
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

@section('judul','Data Mahasiswa')

@section('header')
    <!-- Button Tambah Data -->
    <button type="button" class="btn btn bg-blue margin margin-bottom" style="margin-right: 15px;" data-toggle="modal"
        data-target="#tambahdata">
        <i class="fa fa-user-plus"> Tambah Mahasiswa</i>
    </button>
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahdata" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="tambahdataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdataLabel">Tambah Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <form action="/halaman_admin/mhs/data_mahasiswa" method="POST">
                            @csrf
                            <div class="form-group" style="margin-bottom: .2rem;" >
                                <label for="nama" class="control-label">Nama</label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                    class="form-control @error('nama') is-invalid @enderror" placeholder="Isi Nama">
                                @error('nama')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-bottom: .2rem;" >
                                <label for="nim" class="control-label">NIM</label>
                                <input type="text" value="{{ old('nim') }}"
                                    class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim"
                                    placeholder="Isi NIM">
                                @error('nim')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-bottom: .2rem;" >
                                <label for="Angkatan" class="control-label">Angkatan</label>
                                <input type="text" value="{{ old('Angkatan') }}"
                                    class="form-control @error('Angkatan') is-invalid @enderror" id="Angkatan"
                                    name="Angkatan" placeholder="Isi Angkatan">
                                @error('Angkatan')
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
<div class="table-responsive-md">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="width:20px;">No</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Angkatan</th>
                <th style="width: 120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $mahasiswa)
                <tr>
                    <td class="d-flex justify-content-center">{{ $loop->iteration}}</td>
                    <td>{{ $mahasiswa->nama}}</td>
                    <td>{{ $mahasiswa->nim}}</td>
                    <td>{{ $mahasiswa->Angkatan}}</td>
                    <td class="d-flex justify-content-center">
                        <!-- Button Lihat Data -->
                        <button type="button" class="btn btn-info btn-xs" style="margin-left: 5px;" 
                            data-toggle="modal" data-target="#lihatinfo{{ $mahasiswa->id_mahasiswa }}">
                            <i class="fa fa-eye" ></i>
                        </button>
                        <!-- Modal Lihat Data -->
                        <div class="modal fade" data-backdrop="static" id="lihatinfo{{ $mahasiswa->id_mahasiswa }}"
                            tabindex="-1" role="dialog" aria-labelledby="lihatinfoLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="lihatinfoLabel">Informasi Mahasiswa</h5>
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
                                                    <th scope="col">Angkatan</th>
                                                    <th>:</th>
                                                    <td> {{ $mahasiswa->Angkatan}}</td>
                                                </tr>
                                                @if($mahasiswa->semester == Null)
                                                @else
                                                <tr>
                                                    <th scope="col">Semester</th>
                                                    <th>:</th>
                                                  <td> {{ $mahasiswa->semester}} / {{$mahasiswa->tahun}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Email</th>
                                                    <th>:</th>
                                                    <td> {{ $mahasiswa->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Tanggal Lahir</th>
                                                    <th>:</th>
                                                    <td> {{ $mahasiswa->tanggal_lahir}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Jenis Kelamin</th>
                                                    <th>:</th>
                                                    <td> {{ $mahasiswa->jenis_kelamin}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Alamat</th>
                                                    <th>:</th>
                                                    <td> {{ $mahasiswa->alamat}}</td>
                                                </tr>    
                                                @endif
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary my-3"
                                            data-dismiss="modal">Kembali</button>
                                            <a href="/halaman_admin/mhs/data_mahasiswa/{{$mahasiswa->id_mahasiswa}}"
                                                class="btn btn-danger my-3 delete-confirm">Hapus
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button Edit Data -->
                        <button type="button" class="btn btn-default btn-xs" style="margin-left: 5px;" 
                            data-toggle="modal" data-target="#edit{{ $mahasiswa->id_mahasiswa }}">
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <!-- Modal Edit Data -->
                        <div class="modal fade" id="edit{{ $mahasiswa->id_mahasiswa }}" data-backdrop="static"
                            tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editLabel">Edit Data Mahasiswa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-xs-12">
                                            <form
                                                action="/halaman_admin/mhs/data_mahasiswa/{{$mahasiswa->id_mahasiswa}}"
                                                method="POST">
                                                @method('patch')
                                                @csrf
                                                <div class="form-group" style="margin-bottom: .2rem;" >
                                                    <label for="nama" class="control-label">Nama</label>
                                                    <input type="text" id="nama" name="nama"
                                                        value="{{ $mahasiswa->nama }}"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        placeholder="Enter Nama">
                                                    @error('nama')
                                                    <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group" style="margin-bottom: .2rem;" >
                                                    <label for="nim" class="control-label">NIM</label>
                                                    <input type="text" value="{{ $mahasiswa->nim }}"
                                                        class="form-control @error('nim') is-invalid @enderror"
                                                        id="nim" name="nim" placeholder="Enter NIM">
                                                    @error('nim')
                                                    <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group" style="margin-bottom: .2rem;" >
                                                    <label for="Angkatan" class="control-label">Angkatan</label>
                                                    <input type="text" value="{{ $mahasiswa->Angkatan }}"
                                                        class="form-control @error('Angkatan') is-invalid @enderror"
                                                        id="Angkatan" name="Angkatan" placeholder="Enter Angkatan">
                                                    @error('Angkatan')
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
                        <a href="/halaman_admin/mhs/data_mahasiswa/{{$mahasiswa->id_mahasiswa}}" style="margin-left: 5px;" 
                            class="btn btn-danger btn-xs delete-confirm"><i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
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
                $('#edit{{session('edit')}}').modal('show')
        </script>
        @php
        session()->forget('edit');
        @endphp
    @endif
@endsection