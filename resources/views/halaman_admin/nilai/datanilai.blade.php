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
                <a href="{{ url('/halaman_admin/kfrm/konfirmasi')}}" class="nav-link ">
                    <i class="nav-icon fas fa fa-file-contract"></i>
                    <p>
                        Data Pengajuan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active">
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

@section('judul','Nilai Pendadaran')

@section('header')
<div class="table-responsive-md">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="width:20px;">No</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Angkatan</th>
                <th>Penguji 1</th>
                <th>Penguji 2</th>
                <th>Penguji 3</th>
                <th>Penguji 4</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @php
            $a = 0;
            @endphp
            @foreach($jadwal as $value)
            @php
            $nilaiA = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai1')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai1');
            $nilaiB = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai2')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai2');
            $nilaiC = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai3')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai3');
            $nilaiD = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai4')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai4');
            $nilaiTotal = ($nilaiA + $nilaiB + $nilaiC + $nilaiD)/16;
            // dd($gagal, $lulus);
            $nilaiDadar = null;
            $dosenDadar = null;
            $dosenPenilai = array();
            $semuaDosen = false;

            //Siapa saja dosen yang mendadar contoh: Wahyu?

            $dosenDadarMentah = \DB::table('tb_jadwal AS n')
            ->select('n.id_jadwal','n.id_dsn1','n.id_dsn2','n.id_dsn3','n.id_dsn4')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at', '=' , NULL)
            ->get();
            foreach ($dosenDadarMentah as $dosenDadarku) {
            $dosenDadar = array($dosenDadarku->id_dsn1, $dosenDadarku->id_dsn2, $dosenDadarku->id_dsn3,
            $dosenDadarku->id_dsn4);
            sort($dosenDadar);
            }
            $dosenKasihNilai = \DB::table('tb_nilai AS n')
            ->select('n.id_dsn')
            ->where('n.id_mhs', '=' , $value->id_mahasiswa )
            ->where('n.deleted_at', '=' , NULL)
            ->orderBy('n.id_dsn','asc')
            ->get();
            foreach ($dosenKasihNilai as $dosenKasihNilaiku) {
            array_push($dosenPenilai, $dosenKasihNilaiku->id_dsn);
            }
            if ($dosenPenilai == $dosenDadar) {
            $semuaDosen = true;
            }else {
            $semuaDosen = false;
            }
            @endphp
            @if ($value->tahap == 8 && $semuaDosen && $nilaiTotal >= 60)
            <tr>
                <th>@php
                    echo $a = $a+1;
                    @endphp</th>
                <td>{{$value->nama}}</td>
                <td>{{$value->nim}}</td>
                <td width="20px">{{$value->Angkatan}}</td>
                <td>
                    @php                                                
                    foreach ($dosen as $faker) {
                        if ($faker->id_dosen == $dosenDadarku->id_dsn1) {
                            echo $faker->nama;
                        }
                    }
                    @endphp
                </td>
                <td>
                    @php                                                
                    foreach ($dosen as $faker) {
                        if ($faker->id_dosen == $dosenDadarku->id_dsn2) {
                            echo $faker->nama;
                        }
                    }
                    @endphp
                </td>
                <td>
                    @php                                                
                    foreach ($dosen as $faker) {
                        if ($faker->id_dosen == $dosenDadarku->id_dsn3) {
                            echo $faker->nama;
                        }
                    }
                    @endphp
                </td>
                <td>
                    @php                                                
                    foreach ($dosen as $faker) {
                        if ($faker->id_dosen == $dosenDadarku->id_dsn4) {
                            echo $faker->nama;
                        }
                    }
                    @endphp
                </td>
                <td width="70px">
                    @php
                    if ($semuaDosen == true) {
                        echo round($nilaiTotal, 2);
                        if ($nilaiTotal < 46) {
                            echo ' / E' ; } 
                        elseif ($nilaiTotal >=46 && $nilaiTotal<55.99) { 
                            echo ' / D' ; } 
                        elseif ($nilaiTotal >=56 && $nilaiTotal<59.99) { 
                            echo ' / CD' ; } 
                        elseif ($nilaiTotal >=60 && $nilaiTotal<64.99) { 
                            echo ' / C' ; }
                        elseif ($nilaiTotal >=65 && $nilaiTotal<69.99) {
                            echo ' / BC' ; }
                        elseif ($nilaiTotal >=70 && $nilaiTotal<74.99) { 
                            echo ' / B' ; } 
                        elseif ($nilaiTotal >=75 && $nilaiTotal<79.99) { 
                            echo ' / AB' ;
                        } 
                        elseif ($nilaiTotal> 80) {
                            echo ' / A';
                        } 
                    }
                        @endphp
                </td>
            </tr>
            @endif
            @endforeach
            </tfoot>
    </table>
</div>
@endsection