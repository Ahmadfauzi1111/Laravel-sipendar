<!DOCTYPE html>
<html>
<head>
	<title>Mahasiswa yang sudah pendadaran</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
    </style>
		<h5 style="text-align: center;">Mahasiswa yang sudah pendadaran</h4>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="width:10px;">No</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Jadwal Pendadaran</th>
                <th>Penguji 1</th>
                <th>Penguji 2</th>
                <th>Penguji 3</th>
                <th>Penguji 4</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            @php
                $a = 0;
            @endphp
            @foreach($jadwal as $value)
            @if($value->tahap == 6 || $value->tahap == 7|| $value->tahap == 8)
            <tr>
                <th>@php
                    echo $a = $a+1;
                @endphp</th>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->nim }}</td>
                {{-- <td width="20px">{{ $value->Angkatan }}</td> --}}
                <td> {{ $value->ruang }}, {{ date('d M Y', strtotime($value->tanggal)) }}, {{ $value->shiftmulai }} - {{ $value->shiftselesai }}</td>
                <td>
                    @foreach($dosen as $faker)
                        @if($faker->id_dosen == $value->id_dsn1)
                        {{$faker->nama}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($dosen as $faker)
                        @if($faker->id_dosen == $value->id_dsn2)
                        {{$faker->nama}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($dosen as $faker)
                        @if($faker->id_dosen == $value->id_dsn3)
                        {{$faker->nama}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($dosen as $faker)
                        @if($faker->id_dosen == $value->id_dsn4)
                        {{$faker->nama}}
                        @endif
                    @endforeach
                </td>
                <td width="50px">
                    @if($value->tahap == 6 && $value->deleted_at == NULL)
                    <span class="badge badge-primary" style="font-size: 1em;">Proses</span>
                    @elseif($value->tahap == 7)
                    <span class="badge badge-success" style="font-size: 1em;">Sudah</span>
                    @elseif($value->tahap == 8)
                    <span class="badge badge-success" style="font-size: 1em;">Sudah</span>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
        </tfoot>
    </table>
</body>
</html>
