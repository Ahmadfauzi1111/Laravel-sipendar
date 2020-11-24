@extends('halaman_komisi.main')
@section('sidebar')
{{-- @php
($hasil->join('tb_mhs', 'tb_mhs.id_mahasiswa', '=', 'tb_jadwal.id_mhs')
        ->where('tb_jadwal.shift','shift1')
        ->where('tb_jadwal.tanggal','2020-05-02')
        ->get()
)
@endphp --}}
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa fa-clipboard"></i>
                <p>
                    Dasboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa fa-clipboard"></i>
                <p>
                    Penjadwalan
                </p>
            </a>
        </li>
        <li class="nav-header">KEAMANAN</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
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
<section class="content">
    <div class="content withmenu tableinside">
        <table class="seminar">
            <thead>
                <tr class="tabletitle">
                    <td colspan="9">
                        Jadwal Pendadaran
                    </td>
                </tr>
                <tr class="withtablefilter">
                    <td colspan="11">
                        <table class="tablefilter">
                            <tbody>
                                <tr>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn bg-blue margin margin-bottom"
                                            style="margin-right: 15px;" data-toggle="modal" data-target="#tambahdata">
                                            <i class="fa fa-user-plus"> Tambah Jadwal</i>
                                        </button></td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="tambahdata" data-backdrop="static" tabindex="-1"
                                        role="dialog" aria-labelledby="tambahdataLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document"
                                            style="max-width:700px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tambahdataLabel">Tambah Jadwal
                                                        Pendadaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-xs-12">
                                                        <form action="/halaman_komisi/penjadwalan" method="POST">
                                                            @csrf
                                                            <div class="form-group"
                                                                style="margin-bottom: .2rem; color:black; font-weight:normal; text-transform:capitalize;">
                                                                <label for="id_mhs" class="control-label"
                                                                    style="color: #0081d8; text-transform:uppercase;">Nama
                                                                    Mahasiswa</label>
                                                                <select
                                                                    class="form-control select2bs4 @error('id_mhs') is-invalid @enderror"
                                                                    name="id_mhs" id="id_mhs">
                                                                    <option value="" disabled selected>Pilih Mahasiswa
                                                                    </option>
                                                                    @foreach ($mahasiswa as $value) @if ($value->tahap
                                                                    == 3) @if(old('id_mhs')=='($value as nama)' )
                                                                    selected @endif <option
                                                                        value="{{ $value->id_mahasiswa}}">
                                                                        {{ $value->nama }}</option>
                                                                    @endif @endforeach
                                                                </select>
                                                                @error('nama')
                                                                <div class="invalid-feedback"> {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group" style="margin-bottom: .2rem;">
                                                                <label for="shift" class="control-label">Shift</label>
                                                                <select
                                                                    class="form-control @error('shift') is-invalid @enderror"
                                                                    name="shift" id="shift">
                                                                    <option value="" disabled selected>Pilih Shift
                                                                    </option>
                                                                    <option value="shift1" @if(old('shift')=='shift1' )
                                                                        selected @endif>
                                                                        SHIFT 1 (Jam 7-8)</option>
                                                                    <option value="shift2" @if(old('shift')=='shift2' )
                                                                        selected @endif>
                                                                        SHIFT 2 (Jam 8-9)</option>
                                                                    <option value="shift3" @if(old('shift')=='shift3' )
                                                                        selected @endif>
                                                                        SHIFT 3 (Jam 9-10)</option>
                                                                    <option value="shift4" @if(old('shift')=='shift4' )
                                                                        selected @endif>
                                                                        SHIFT 4 (Jam 10-11)</option>
                                                                    <option value="shift5" @if(old('shift')=='shift5' )
                                                                        selected @endif>
                                                                        SHIFT 5 (Jam 11-12)</option>
                                                                    <option value="shift6" @if(old('shift')=='shift6' )
                                                                        selected @endif>
                                                                        SHIFT 6 (Jam 13-14)</option>
                                                                    <option value="shift7" @if(old('shift')=='shift7' )
                                                                        selected @endif>
                                                                        SHIFT 7 (Jam 14-15)</option>
                                                                    <option value="shift8" @if(old('shift')=='shift8' )
                                                                        selected @endif>
                                                                        SHIFT 8 (Jam 15-16)</option>
                                                                </select>
                                                                @error('shift')
                                                                <div class="invalid-feedback"> {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group" style="margin-bottom: .2rem">
                                                                <label for="ruangan"
                                                                    class="control-label">Ruangan</label>
                                                                <select
                                                                    class="form-control @error('ruangan') is-invalid @enderror"
                                                                    name="ruangan" id="ruangan">
                                                                    <option value="" disabled selected>Pilih Ruangan
                                                                    </option>
                                                                    <option value="ruang1"
                                                                        @if(old('ruangan')=='Ruangan 1' ) selected
                                                                        @endif>
                                                                        Ruangan 1</option>
                                                                </select>
                                                                @error('ruangan')
                                                                <div class="invalid-feedback"> {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group" style="margin-bottom: .2rem" ;>
                                                                <label for="tanggal" class="control-label">Tanggal
                                                                    Seminar</label>
                                                                <input type="date" value="{{ old('tanggal') }}"
                                                                    class="form-control @error('tanggal') is-invalid @enderror"
                                                                    id="tanggal" name="tanggal"
                                                                    placeholder="Enter Tanggal Seminar">
                                                                @error('tanggal')
                                                                <div class="invalid-feedback"> {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group"
                                                                style="margin-bottom: .2rem; color:black; font-weight:normal; text-transform:capitalize;">
                                                                <label for="id_dsn1" class="control-label"
                                                                    style="color: #0081d8; text-transform:uppercase;">Nama
                                                                    Dosen</label>
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
                                                            <div class="form-group"
                                                                style="margin-bottom: .2rem; color:black; font-weight:normal; text-transform:capitalize;">
                                                                <label for="id_dsn2" class="control-label"
                                                                    style="color: #0081d8; text-transform:uppercase;">Nama
                                                                    Dosen</label>
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
                                                            <div class="form-group"
                                                                style="margin-bottom: .2rem; color:black; font-weight:normal; text-transform:capitalize;">
                                                                <label for="id_dsn3" class="control-label"
                                                                    style="color: #0081d8; text-transform:uppercase;">Nama
                                                                    Dosen</label>
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
                                                            <div class="form-group"
                                                                style="margin-bottom: .2rem; color:black; font-weight:normal; text-transform:capitalize;">
                                                                <label for="id_dsn4" class="control-label"
                                                                    style="color: #0081d8; text-transform:uppercase;">Nama
                                                                    Dosen</label>
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
                                                                <button type="submit"
                                                                    class="btn btn-primary">Selesai</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="center">Tanggal</td>
                    <td class="center">SHIFT 1<span style="font-size: 10px;">(JAM 7-8)</span></td>
                    <td class="center">SHIFT 2<span style="font-size: 10px;">(JAM 8-9)</span></td>
                    <td class="center">SHIFT 3<span style="font-size: 10px;">(JAM 9-10)</span></td>
                    <td class="center">SHIFT 4<span style="font-size: 10px;">(JAM 10-11)</span></td>
                    <td class="center">SHIFT 5<span style="font-size: 10px;">(JAM 11-12)</span></td>
                    <td class="center">SHIFT 6<span style="font-size: 10px;">(JAM 12-13)</span></td>
                    <td class="center">SHIFT 7<span style="font-size: 10px;">(JAM 13-14)</span></td>
                    <td class="center">SHIFT 8<span style="font-size: 10px;">(JAM 14-15)</span></td>
                </tr>
            </thead>
            <tbody>
            <?php 
                for ($i=0; $i < 14 ; $i++) { 
                $date = date('Y-m-d',strtotime("+".$i." day"));
            ?>
                <tr>
                    <td class="center caption">
                        <?php
                            echo date('D',strtotime("+".$i." day"));
                        ?>
                        <span class="big">
                            <?php
                                echo date('d',strtotime("+".$i." day"));
                            ?>
                        </span>
                        <?php
                            echo date('M Y',strtotime("+".$i." day"));
                        ?>
                    </td>
                        @php
                            $contohVariabel = DB::table('tb_jadwal AS j')->select('m.*')
                                ->join('tb_mhs AS m', 'm.id_mahasiswa', '=', 'j.id_mhs')
                                ->where('j.shift', '=', 'shift1')
                                ->where('j.tanggal', $date)
                                ->first();
                        @endphp
                        @if ($contohVariabel)
                            {{ $contohVariabel->nama }}
                        @endif
                    </td>
                    <td class="center">
                    </td>
                    <td class="center">
                    </td>
                    <td class="center">
                    </td>
                    <td class="center">
                    </td>
                    <td class="center">
                    </td>
                    <td class="center">
                    </td>
                    <td class="center">
                    </td>
                </tr>
                <tr>
            <?php 
                }
            ?>
            </tbody>
        </table>
    </div>
    @endsection