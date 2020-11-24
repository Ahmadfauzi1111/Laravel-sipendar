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
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-id-badge text-cyan"></i>
                            <p style="font-size: 15px;">
                                Data Dosen
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/halaman_admin/adm/data_admin')}}" class="nav-link">
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
@section('judul','Data Dosen')
@section('header')
    <!-- Button Tambah Data -->
    <button type="button" class="btn btn bg-blue margin margin-bottom" style="margin-right: 15px;" 
        data-toggle="modal" data-target="#tambahdata">
        <i class="fa fa-user-plus"> Tambah Dosen</i>
    </button>
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahdata" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="tambahdataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdataLabel">Tambah Data Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <form action="/halaman_admin/dsn/data_dosen" method="POST">
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
                                <label for="nip" class="control-label">NIP</label>
                                <input type="text" value="{{ old('nip') }}"
                                    class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip"
                                    placeholder="Isi NIP">
                                @error('nip')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-bottom: .2rem;">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                    id="email" name="email" value="{{ old('email') }}" placeholder="isi Email">
                                @error('email')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-bottom: .2rem;" >
                                <label for="status" class="control-label">Jabatan Dosen</label>
                                <select class="form-control @error('status') is-invalid @enderror"
                                    name="status" id="status">
                                    <option value="" disabled selected>Pilih Status</option>
                                    @if($dosen->where('status', '=', 'Ketua Jurusan')->count())
                                    <option value="Dosen Penguji" @if(old('status')=='Dosen Penguji' ) selected @endif>
                                        Dosen Penguji</option>
                                    @else
                                    <option value="Ketua Jurusan" @if(old('status')=='Ketua Jurusan' ) selected @endif>
                                        Ketua Jurusan</option>
                                    <option value="Dosen Penguji" @if(old('status')=='Dosen Penguji' ) selected @endif>
                                        Dosen Penguji</option>
                                    @endif
                                </select>
                                @error('status')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-bottom: .2rem;" >
                                <label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>
                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                    name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="Laki-Laki" @if(old('jenis_kelamin')=='Laki-Laki' ) selected @endif>
                                        Laki-Laki</option>
                                    <option value="Perempuan" @if(old('jenis_kelamin')=='Perempuan' ) selected @endif>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-bottom: .2rem;" >
                                <label for="alamat" class="control-label">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" rows="2"
                                    name="alamat">{{ old('alamat') }}</textarea>
                                @error('alamat')
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
                <th>Nip</th>
                <th style="width: 120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dosen as $value)
                <tr>
                    <td class="d-flex justify-content-center">{{ $loop->iteration}}</td>
                    <td>{{ $value->nama}}</td>
                    <td>{{ $value->nip}}</td>
                    <td class="d-flex justify-content-center">
                        <!-- Button Lihat Data -->
                        <button type="button" class="btn btn-info btn-xs btn-flat" style="margin-right: 5px;"
                            data-toggle="modal" data-target="#lihatinfo{{ $value->id_dosen }}">
                            <i class="fa fa-eye"></i>
                        </button>
                        <!-- Modal Lihat Data -->
                        <div class="modal fade" data-backdrop="static" id="lihatinfo{{ $value->id_dosen }}"
                            tabindex="-1" role="dialog" aria-labelledby="lihatinfoLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="lihatinfoLabel">Informasi Dosen</h5>
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
                                                    <td> {{ $value->nama}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">NIP</th>
                                                    <th>:</th>
                                                    <td> {{ $value->nip}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Email</th>
                                                    <th>:</th>
                                                    <td> {{ $value->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Jabatan Dosen</th>
                                                    <th>:</th>
                                                    <td> {{ $value->status}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Jenis Kelamin</th>
                                                    <th>:</th>
                                                    <td> {{ $value->jenis_kelamin}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Alamat</th>
                                                    <th>:</th>
                                                    <td> {{ $value->alamat}}</td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary my-3"
                                            data-dismiss="modal">Kembali</button>
                                        <a href="/halaman_admin/dsn/data_dosen/{{$value->id_dosen}}"
                                            class="btn btn-danger my-3 delete-confirm">Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button Edit Data -->
                        <button type="button" class="btn btn-default btn-xs btn-flat" style="margin-right: 5px;"
                            data-toggle="modal" data-target="#edit{{ $value->id_dosen }}">
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <!-- Modal Edit Data -->
                        <div class="modal fade" id="edit{{ $value->id_dosen }}" data-backdrop="static" tabindex="-1"
                            role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editLabel">Edit Data Dosen</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-xs-12">
                                            <form action="/halaman_admin/dsn/data_dosen/{{$value->id_dosen}}"
                                                method="POST">
                                                @method('patch')
                                                @csrf
                                                <div class="form-group" style="margin-bottom: .2rem;" >
                                                    <label for="nama" class="control-label">Nama</label>
                                                    <input type="text" id="nama" name="nama"
                                                        value="{{ $value->nama }}"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        placeholder="Enter Nama">
                                                    @error('nama')
                                                    <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group" style="margin-bottom: .2rem;" >
                                                    <label for="nip" class="control-label">NIP</label>
                                                    <input type="text" value="{{ $value->nip }}"
                                                        class="form-control @error('nip') is-invalid @enderror"
                                                        id="nip" name="nip" placeholder="Enter NIP">
                                                    @error('nip')
                                                    <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group" style="margin-bottom: .2rem;" >
                                                    <label for="email" class="control-label">Email</label>
                                                    <input type="text" value="{{ $value->email }}"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="email" name="email" placeholder="Enter Email">
                                                    @error('email')
                                                    <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group" style="margin-bottom: .2rem;" >
                                                    <label for="status" class="control-label">Jabatan
                                                        Dosen</label>
                                                    <select
                                                        class="form-control @error('status') is-invalid @enderror"
                                                        name="status" id="status">
                                                        <option value="" disabled selected>Pilih Kategori</option>
                                                        <option value="Ketua Jurusan" @if($value->status ==
                                                            'Ketua Jurusan') selected @endif>Ketua Jurusan</option>
                                                        <option value="Dosen Penguji" @if($value->status ==
                                                            'Dosen Penguji') selected @endif>Dosen Penguji</option>
                                                    </select>
                                                    @error('status')
                                                    <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group" style="margin-bottom: .2rem;" >
                                                    <label for="jenis_kelamin" class="control-label">Jenis
                                                        Kelamin</label>
                                                    <select
                                                        class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                        name="jenis_kelamin" id="jenis_kelamin">
                                                        <option value="" disabled selected>Pilih Kategori</option>
                                                        <option value="Laki-Laki" @if($value->jenis_kelamin ==
                                                            'Laki-Laki') selected @endif>Laki-Laki</option>
                                                        <option value="Perempuan" @if($value->jenis_kelamin ==
                                                            'Perempuan') selected @endif>Perempuan</option>
                                                    </select>
                                                    @error('jenis_kelamin')
                                                    <div class="invalid-feedback"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group" style="margin-bottom: .2rem;" >
                                                    <label for="alamat" class="control-label">Alamat</label>
                                                    <textarea
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        rows="2" name="alamat">{{$value->alamat}}</textarea>
                                                    @error('alamat')
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
                        <a href="/halaman_admin/dsn/data_dosen/{{$value->id_dosen}}" style="margin-right: 5px;"
                            class="btn btn-danger btn-xs btn-flat delete-confirm"><i class="fa fa-trash"></i>
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