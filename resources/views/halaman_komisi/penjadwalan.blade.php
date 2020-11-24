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
                {{-- <li class="nav-item">
                <a href="{{ url('/halaman_komisi/list') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list text-cyan"></i>
                        <p style="font-size: 15px;">
                            List Jadwal
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-clipboard-list text-cyan"></i>
                        <p style="font-size: 15px;">
                            Data Jadwal
                        </p>
                    </a>
                </li> --}}
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
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="center">Tanggal</td>
                    <td class="center">SHIFT 1<span style="font-size: 10px;">(JAM 8-10)</span></td>
                    <td class="center">SHIFT 2<span style="font-size: 10px;">(JAM 10-12)</span></td>
                    <td class="center">SHIFT 3<span style="font-size: 10px;">(JAM 12-14)</span></td>
                    <td class="center">SHIFT 4<span style="font-size: 10px;">(JAM 14-16)</span></td>
                </tr>
            </thead>
            <tbody>
                <?php 
                for ($i=0; $i < 7 ; $i++) { 
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
                    <td>
                        @php
                        $contohVariabel = DB::table('tb_jadwal AS j')->select('m.*')
                        ->join('tb_mhs AS m', 'm.id_mahasiswa', '=', 'j.id_mhs')
                        ->where('j.shift', '=', 'SHIFT 1 (Jam 8-10)')
                        ->where('j.tanggal', $date)
                        ->first();
                        @endphp
                        @if ($contohVariabel)
                        <span style="font-size: 15px; text-align:center">{{ $contohVariabel->nama }}</span>
                        <span style="font-size: 15px; text-align:center">{{ $contohVariabel->nim }}</span>
                        @endif
                    </td>
                    <td class="center">
                        @php
                        $contohVariabel = DB::table('tb_jadwal AS j')->select('m.*')
                        ->join('tb_mhs AS m', 'm.id_mahasiswa', '=', 'j.id_mhs')
                        ->where('j.shift', '=', 'SHIFT 2 (Jam 10-12)')
                        ->where('j.tanggal', $date)
                        ->first();
                        @endphp
                        @if ($contohVariabel)
                        <span style="font-size: 15px; text-align:center">{{ $contohVariabel->nama }}</span>
                        <span style="font-size: 15px; text-align:center">{{ $contohVariabel->nim }}</span>
                        @endif
                    </td>
                    <td class="center">
                        @php
                        $contohVariabel = DB::table('tb_jadwal AS j')->select('m.*')
                        ->join('tb_mhs AS m', 'm.id_mahasiswa', '=', 'j.id_mhs')
                        ->where('j.shift', '=', 'SHIFT 3 (Jam 12-14)')
                        ->where('j.tanggal', $date)
                        ->first();
                        @endphp
                        @if ($contohVariabel)
                        <span style="font-size: 15px; text-align:center">{{ $contohVariabel->nama }}</span>
                        <span style="font-size: 15px; text-align:center">{{ $contohVariabel->nim }}</span>
                        @endif
                    </td>
                    <td class="center">
                        @php
                        $contohVariabel = DB::table('tb_jadwal AS j')->select('m.*')
                        ->join('tb_mhs AS m', 'm.id_mahasiswa', '=', 'j.id_mhs')
                        ->where('j.shift', '=', 'SHIFT 4 (Jam 14-16)')
                        ->where('j.tanggal', $date)
                        ->first();
                        @endphp
                        @if ($contohVariabel)
                        <span style="font-size: 15px; text-align:center">{{ $contohVariabel->nama }}</span>
                        <span style="font-size: 15px; text-align:center">{{ $contohVariabel->nim }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <?php 
                      }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    @endsection