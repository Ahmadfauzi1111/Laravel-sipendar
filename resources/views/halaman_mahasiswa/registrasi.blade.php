@extends('halaman_mahasiswa.main')
@section('header')
    <div class="box-header with-border" style="text-align: center; padding: 0px;">
        <div class="box-title">
            <h3 class="color-palette" style="font-size: 40px;  margin-bottom: 0px;">Registrasi Data Pendadaran </h3>
        </div>
    </div>
@endsection

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
                        <a href="#" class="nav-link active">
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

@section('card-body')
    <form action="/halaman_mahasiswa/registrasi/{{$mahasiswa->id_mahasiswa}}" id="formregistrasi" method="POST">
        @method('patch')
        @csrf
        <div class="user-panel d-flex justify-content-center">
            <div class="image" style="margin-left: 10px; margin-top: 20px;">
                <img style="width:75px" src="/adminlte/img/Capture6.PNG" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info p-2 flex-fill">
                <label for="judulta" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;"> Judul
                    Tugas Akhir</label>
                @if ($mahasiswa->judulta == NULL)
                <textarea class="form-control @error('judulta') is-invalid @enderror" rows="2" name="judulta" style="max-width: 370px;"
                    >{{ old('judulta') }}</textarea>
                @error('judulta')
                <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
                @else
                <textarea class="form-control" style="max-width: 370px;" rows="3" readonly>{{ $mahasiswa->judulta }}</textarea>
                @endif
            </div>
        </div>
        <div class="user-panel mt-2 pb-1 mb-1 d-flex justify-content-center">
            <div class="image" style="margin-left: 10px;  margin-top: 7px;">
                <img style="width:75px" src="/adminlte/img/Capture1.PNG" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info p-2 flex-fill bd-highlight">
                <label for="pembimbing1" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;"> Pembimbing TA I
                </label>
                @if ($mahasiswa->judulta == NULL)
                <select class="form-control select2bs4 @error('pembimbing1') is-invalid @enderror" name="pembimbing1" style="max-width: 370px;"
                    id="pembimbing1">
                    <option value="" disabled selected>Isi Dosen Pembimbing TA I</option>
                    @foreach ($dosen as $value)
                    @if(old('pembimbing1')== $value->id_dosen )
                    <option selected value="{{ $value->id_dosen }}">{{ $value->nama }}</option>
                    @else
                    <option value="{{ $value->id_dosen }}">{{ $value->nama }}</option>
                    @endif
                    @endforeach
                </select>
                @error('pembimbing1')
                <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
                @else
                @foreach ($dosen as $value)
                @if($value->id_dosen == $mahasiswa->pembimbing1)
                <p>{{ $value->nama }}</p>
                @endif
                @endforeach
                @endif
            </div>
        </div>
        <div class="user-panel mt-1 pb-1 mb-1 d-flex justify-content-center">
            <div class="image" style="margin-left: 10px;  margin-top: 7px;">
                <img style="width:75px" src="/adminlte/img/Capture1.PNG" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info p-2 flex-fill bd-highlight">
                <label for="pembimbing2" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;"> Pembimbing TA II
                </label>
                @if ($mahasiswa->judulta == NULL)
                <select class="form-control select2bs4 @error('pembimbing2') is-invalid @enderror" name="pembimbing2" style="max-width: 370px;"
                    id="pembimbing2" >
                    <option value="" disabled selected>Isi Dosen Pembimbing TA II</option>
                    @foreach ($dosen as $value)
                    @if(old('pembimbing2')== $value->id_dosen )
                    <option selected value="{{ $value->id_dosen }}">{{ $value->nama }}</option>
                    @else
                    <option value="{{ $value->id_dosen }}">{{ $value->nama }}</option>
                    @endif
                    @endforeach
                </select>
                @error('pembimbing2')
                <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
                @else
                @foreach ($dosen as $value)
                @if($value->id_dosen == $mahasiswa->pembimbing2)
                <p>{{ $value->nama }}</p>
                @endif
                @endforeach
                @endif
            </div>
        </div>
        <div class="user-panel mt-1 pb-1 mb-1 d-flex justify-content-center">
            <div class="image" style="margin-left: 10px;  margin-top: 7px;">
                <img style="width:75px" src="/adminlte/img/Capture1.PNG" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info p-2 flex-fill bd-highlight">
                <label for="pembimbingakademik" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;"> Pembimbing
                    Akademik</label>
                @if ($mahasiswa->judulta == NULL)
                <select class="form-control select2bs4 @error('pembimbingakademik') is-invalid @enderror" style="max-width: 370px;"
                    name="pembimbingakademik" id="pembimbingakademik" >
                    <option value="" disabled selected>Isi Dosen Pembimbing Akademik</option>
                    @foreach ($dosen as $value)
                    @if(old('pembimbingakademik')== $value->id_dosen )
                    <option selected value="{{ $value->id_dosen }}">{{ $value->nama }}</option>
                    @else
                    <option value="{{ $value->id_dosen }}">{{ $value->nama }}</option>
                    @endif
                    @endforeach
                </select>
                @error('pembimbingakademik')
                <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
                @else
                @foreach ($dosen as $value)
                @if($value->id_dosen == $mahasiswa->pembimbingakademik)
                <p>{{ $value->nama }}</p>
                @endif
                @endforeach
                @endif
            </div>
        </div>
        <div class="user-panel mt-1 pb-1 mb-1 d-flex justify-content-center">
            <div class="image" style="margin-left: 10px;  margin-top: 7px;">
                <img style="width:75px" src="/adminlte/img/Capture8.PNG" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info p-2 flex-fill bd-highlight">
                <div class="d-flex flex-row">
                    <div class="d-flex flex-column" style="margin-bottom:0px;">
                        <label for="semester" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;">Semester Berjalan</label>
                        @if ($mahasiswa->judulta == NULL)
                        <select class="form-control select2bs4 @error('semester') is-invalid @enderror" style="max-width:150px"
                        name="semester" id="semester" >
                        <option value="" disabled selected>Pilih Semester</option>
                        <option value="7" @if(old('semester')=='7' ) selected @endif>7</option>
                        <option value="8" @if(old('semester')=='8' ) selected @endif>8</option>
                        <option value="9" @if(old('semester')=='9' ) selected @endif>9</option>
                        <option value="10" @if(old('semester')=='10' ) selected @endif>10</option>
                        <option value="11" @if(old('semester')=='11' ) selected @endif>11</option>
                        <option value="12" @if(old('semester')=='12' ) selected @endif>12</option>
                        <option value="13" @if(old('semester')=='13' ) selected @endif>13</option>
                        <option value="14" @if(old('semester')=='14' ) selected @endif>14</option>
                    </select>
                    @error('semester')
                    <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                    @else
                    <p>{{ $mahasiswa->semester }}</p>
                    @endif
                    </div>
                    <div class="d-flex flex-column" style="margin-bottom:0px; margin-left:20px;">
                        <label for="tahun" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;">Tahun</label>
                        @if ($mahasiswa->judulta == NULL)
                        <select class="form-control select2bs4 @error('tahun') is-invalid @enderror" style="max-width:130px"
                        name="tahun" id="tahun" type="year" >
                        <option value="">Pilih Tahun</option>
                        <?php
                        $thn_skr = date('Y');
                        for ($x = $thn_skr; $x >= 2010; $x--) {
                            ?>
                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                            <?php
                        }
                        ?>
                        </select>
                        @error('tahun')
                        <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                        @else
                        <p>{{ $mahasiswa->tahun }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="user-panel mt-1 pb-1 mb-1 d-flex justify-content-center">
            <div class="image" style="margin-left: 10px;  margin-top: 7px;">
                <img style="width:75px" src="/adminlte/img/Capture4.PNG" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info p-2 flex-fill bd-highlight">
                <label for="tanggal_lahir" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;">
                    Tanggal Lahir</label>
                @if ($mahasiswa->judulta == NULL)
                <input type="date" value="{{ old('tanggal_lahir') }}" style="max-width: 370px;"
                    class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                    name="tanggal_lahir" placeholder="Enter Tanggal Lahir" >
                @error('tanggal_lahir')
                <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
                @else
                <p>{{ \Carbon\Carbon::parse( $mahasiswa->tanggal_lahir )->isoFormat('dddd, D MMMM Y') }}</p>
                @endif
            </div>
        </div>
        <div class="user-panel mt-1 pb-1 mb-1 d-flex justify-content-center">
            <div class="image" style="margin-left: 10px;  margin-top: 7px;">
                <img style="width:75px" src="/adminlte/img/Capture2.PNG" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info p-2 flex-fill bd-highlight">
                <label for="jenis_kelamin" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;">
                    Jenis Kelamin </label>
                @if ($mahasiswa->judulta == NULL)
                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" style="max-width: 370px;"
                    id="jenis_kelamin" >
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="Laki-Laki" @if(old('jenis_kelamin')=='Laki-Laki' ) selected @endif>Laki-Laki</option>
                    <option value="Perempuan" @if(old('jenis_kelamin')=='Perempuan' ) selected @endif> Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
                @else
                <p>{{ $mahasiswa->jenis_kelamin }}</p>
                @endif
            </div>
        </div>
        <div class="user-panel mt-1 pb-1 mb-1 d-flex justify-content-center">
            <div class="image" style="margin-left: 10px;  margin-top: 7px;">
                <img style="width:75px" src="/adminlte/img/Capture10.PNG" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info p-2 flex-fill bd-highlight ">
                <label for="email" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;"> Email </label>
                @if ($mahasiswa->judulta == NULL)
                <input type="email" id="email" name="email" value="{{ old('email') }}" style="max-width: 370px;"
                    class="form-control @error('email') is-invalid @enderror" placeholder="Isi email" >
                @error('email')
                <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
                @else
                <p>{{ $mahasiswa->email }}</p>
                @endif
            </div>
        </div>
        <div class="user-panel mt-1 pb-1 mb-1 d-flex justify-content-center">
            <div class="image" style="margin-left: 10px;  margin-top: 20px;">
                <img style="width:75px" src="/adminlte/img/Capture5.PNG" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info p-2 flex-fill bd-highlight">
                <label for="alamat" style="color:#0081d8; font-size: 1.0em; margin-bottom: 0px;"> Alamat
                </label>
                @if ($mahasiswa->judulta == NULL)
                <textarea class="form-control @error('alamat') is-invalid @enderror" rows="2" name="alamat" style="max-width: 370px;"
                    >{{ old('alamat') }}</textarea>
                @error('alamat')
                <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
                @else
                <textarea class="form-control" style="max-width: 370px;" rows="3" readonly>{{ $mahasiswa->alamat }}</textarea>
                @endif
            </div>
        </div>
        <br>
        @if ($mahasiswa->judulta == NULL)
        <div class="box-footer" style="text-align: center;">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#register">
                Register
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
                            Apakah Registrasi Pendadaran anda sudah di isi dengan Benar ???
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
        @endif
        <br>
    </form>
@endsection