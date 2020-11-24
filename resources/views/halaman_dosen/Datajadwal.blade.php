@extends('halaman_dosen.main')
@section('judul','Data Penjadwalan')
@section('sidebar')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <div class="dropdown-divider"></div>
          <li class="header" style="color:white; margin-left:18px;">MAIN NAVIGATION</li>
         <div class="dropdown-divider"></div>
        <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                    Jadwal Pendadaran
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ Url('/halaman_dosen/nilai') }}" class="nav-link">
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
            <a href="{{ Url('/halaman_dosen/edit') }}" class="nav-link">
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
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width:20px;">No</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Ruangan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $a = 0;
                @endphp
                @foreach($jadwal as $value)
                @if ($value->tahap == 4 || $value->tahap == 5 || $value->tahap == 6 )
                <tr>
                    <th>@php
                        echo $a = $a+1;
                    @endphp</th>
                    <td>{{ $value->nama }}</a></td>
                    <td>{{ $value->nim }}</td>
                    <td>{{ \Carbon\Carbon::parse( $value->tanggal )->isoFormat('dddd, D MMMM Y') }}</td>
                    <td>{{ $value->shiftmulai }} - {{ $value->shiftselesai }}</td>
                    <td>{{ $value->ruang }}</td>                
                </tr>
                @endif
                @endforeach
                </tfoot>
        </table>
    </div>
</div>
@endsection