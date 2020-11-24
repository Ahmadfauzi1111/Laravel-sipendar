{{-- <!DOCTYPE html>
<html>
<head>
    <title>Surat - Surat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<table border="1">
    <td><img src="{{ asset('adminlte/img/uns.png') }}" width="70" height="70"></td>
    <td><center>
        <font size="4">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</font><BR>
        </center></td>
</table>
<body>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
    </style>
</body>
</html> --}}
<!DOCTYPE html>
<html>
<head>
    <title>Surat Pendadaran</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style type="text/css">
    table.solid {
	border-collapse: collapse;
	border: 1px solid; /*for older IE*/
}

table.solid caption {
	font-size: x-large;
	font-weight: bold;
	letter-spacing: .3em;
}

table.solid thead th {
	padding: 8px;
	font-size: large;
}

table.solid th{
    padding: 3px;
	border-width: 1px;
	border-style: solid;
}

table.solid td {
	padding: 3px;
	border-width: 1px;
	border-style: solid;
    font-size: 15px;
}

table.solid td {
	text-align: left;
}

table.solid tbody th {
	font-weight: normal;
}

table.pepek {
	border-collapse: collapse;
	border: 1px dotted; /*for older IE*/
}

table.pepek caption {
	font-size: x-large;
	font-weight: bold;
	letter-spacing: .3em;
}

table.pepek thead th {
	padding: 8px;
	font-size: large;
}

table.pepek th{
    padding: 3px;
	border-width: 1px;
	border-style: dotted;
}

table.pepek td {
	padding: 3px;
	border-width: 1px;
	border-style: dotted;
}

table.pepek td {
	text-align: left;
}

table.pepek tbody th {
	font-weight: normal;
}
.page_break { 
    page-break-before: always; 
}
</style>
{{-- HALAMAN 1 --}}
    <table style="float:right; border-style:solid;  ">
        <tr>
            <td style="text-align: center; font-size:12px;">
            <b>
                <p style="margin-bottom: 0px; margin-top:0px;">
                    REKAP PENILAIAN TUGAS<br>AKHIR (FS.TA1F)<br>PENGUJI I - V
                </p>
            </b>
            </td>
        </tr>
    </table>
<br>
<br>
<br>
    <table align="center">
        <tr>
            <td><img src="{{ public_path('adminlte/img/uns.png') }}" style="width: 90px; height:90px; margin-bottom: 40px;"></td>
            <td style="text-align: center;">
                <font size="3"><b>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</b></font><br>
                <font size="3"><b>UNIVERSITAS JENDERAL SOEDIRMAN  </b></font><br>
                <font size="3"><b>FAKULTAS TEKNIK  </b></font><br>
                <font size="3">JURUSAN TEKNIK INFORMATIKA</font><br>
                <font size="2">Jalan Mayor Jenderal Sungkono KM 5 Blater Purbalingga 53371 Telepon/Faksimile. (0281) 6596700</font><br>
                <font size="2">E-mail : ft@unsoed.ac.id</font><br>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr></td>
        </tr>
    </table>
    <table style="margin-left: 220px; margin-top:0px; margin-bottom:0px;">
        <tr>
            <td><b>LAMPIRAN PENILAIAN UJIAN KOMPREHENSIF</b></td>    
        </tr>    
    </table>
    <table style="margin-left: 30px; ">
        <tr>
            <td>Telah dilakukan ujian akhir dan pendadaran atas nama mahasiswa sebagai berikut :</td>
        </tr>
    </table>
    <table style="margin-left: 70px; line-height: 65%; font-size:14px;">
        <tr>
            <td>
                NIM<br>
            </td>
            <td>
                :
            </td>
            <td>
                {{$mahasiswa->nim}}
            </td>
        </tr>
        <tr>
            <td>
                Nama mahasiswa<br>
            </td>
            <td>
                : 
            </td>
            <td>
                {{$mahasiswa->nama}}
            </td>
        </tr>
        <tr>
            <td>
                Hari/Tanggal<br>
            </td>
            <td>
                :
            </td>
            <td>
                {{ \Carbon\Carbon::parse( $jadwal->tanggal )->isoFormat('dddd, D MMMM Y') }} 
            </td>
        </tr>
        <tr>
            <td>
                Waktu<br>
            </td>
            <td>
                :
            </td>
            <td>
               Jam {{$jadwal->shiftmulai}} s/d {{$jadwal->shiftselesai}} Wib
            </td>
        </tr>
        <tr>
            <td>
                Ruang
            </td>
            <td>
                :
            </td>
            <td>
               di {{$jadwal->ruang}} Fakultas Teknik kampus Purbalingga
            </td>
        </tr>
    </table>
    <table style="margin-left: 30px;">
        <tr>
            <td>dengan perincian sebagai berikut :</td>
        </tr>
    </table>
    <table style="margin-left: 30px;" class="solid" >
        <tr>
            <th style="width: 30px;">No</th>
            <th style="width:450px;">Komponen Penilaian</th>
            <th style="width: 100px;">Komponen Nilai</th>
        </tr>
        <tr>
            <td style="text-align: center">1</td>
            <td>Penguasaan Materi Dasar</td>
            <td style="text-align: center">{{$hasil1}}
            </td>
        </tr>
        <tr>
            <td style="text-align: center">2</td>
            <td>Kemampuan Rekayasa Bidang keahlian (Analisis, Perancangan, <br> Penyelesaian Masalah)</td>
            <td style="text-align: center">{{$hasil2}}
            </td>
        </tr>
        <tr>
            <td style="text-align: center">3</td>
            <td>Kemampuan Berkomunikasi secara ilmiah</td>
            <td style="text-align: center">{{$hasil3}}
            </td>
        </tr>
        <tr>
            <td style="text-align: center">4</td>
            <td>Kemampuan belajar mandiri untuk mengembangkan pengetahuan <br>yang dimiliki </td>
            <td style="text-align: center">{{$hasil4}}
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center">TOTAL NILAI</td>
            <td style="text-align: center">
                @php
                    if ($semuaDosen == true) {
                        if ($nilaiTotal >= 60) {
                            echo round($nilaiTotal, 2);
                        }
                        if ($nilaiTotal >=60 && $nilaiTotal<64.99) { 
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
    </table>
    <table style="margin-left: 30px;">
        <tr>
            <td>Keterangan :</td>
        </tr>
    </table>
    <table style="margin-left: 30px;" class="pepek">
        <tr>
            <td><font size="2">A. Nilai {{'>='}} 80</font></td>
            <td><font size="2">BC. 65 {{'<='}} Nilai {{'<'}} 69,99</font></td>
            <td><font size="2">D. 46 {{'<='}} Nilai {{'<'}} 55,99</font></td>
        </tr>
        <tr>
            <td><font size="2">AB. 75 {{'<='}} Nilai {{'<'}} 79,99</font></td>
            <td><font size="2">C. 60 {{'<='}} Nilai {{'<'}} 64,99</font></td>
            <td><font size="2">E. {{'<'}} 46</td>
        </tr>
        <tr>
            <td><font size="2">B.70 {{'<='}} Nilai {{'<'}} 74,99</font></td>
            <td><font size="2">CD. 56 {{'<='}} Nilai {{'<'}} 59,99</font></td>
            <td><font size="2"></td>
        </tr>
    </table>
    <table style="margin-left: 30px;">
        <tr>
            <td style="font-size: 14px;"> Nilai di atas akan sah sebagai nilai matakuliah Tugas Akhir jika yang bersangkutan telah dinyatakan lulus <br>yang tercantum dalam “Surat Kelulusan” beserta menyerahkan laporan akhir Tugas Akhir yang telah dijilid <br> dan disahkan.</td>
            <br>
        </tr>
    </table>
    <table style="margin-left: 30px; line-height: 65%">
        <tr>
            <td style="font-size: 14px;">Ditetapkan di Purbalingga,  {{ \Carbon\Carbon::parse( $jadwal->tanggal )->isoFormat('dddd, D MMMM Y') }} </td>
        </tr>
        <tr>
            <td style="font-size: 14px;">Jam {{$jadwal->shiftmulai}} s/d {{$jadwal->shiftselesai}} Wib</td>
        </tr>
        <tr>
            <td style="font-size: 14px;">di {{$jadwal->ruang}} Fakultas Teknik kampus Purbalingga</td>
        </tr>
    </table>
    <table style="margin-left: 30px;">
        <tr>
            <td style="width:110px; font-size: 15px;">Penguji I <br>NIP :</td>
            <td style="width:10px; text-align: center; font-size: 15px;">:</td>
                 @foreach ($dosen as $faker)
                    @if($faker->id_dosen == $jadwal->id_dsn1)
            <td style="width:250px; font-size: 15px;">{{ $faker->nama }}
                    @endif
                @endforeach
                <br>
                @foreach ($dosen as $faker)
                    @if($faker->id_dosen == $jadwal->id_dsn1)
                    {{ $faker->nip }}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($dosen as $faker)
                    @if($faker->id_dosen == $jadwal->id_dsn1)
                    <img src="data:image/png;base64, {{DNS1D::getBarcodePNG($faker->nip, 'C128', 2,28,array(1,1,1)) }} " />
                    <br><span style="margin-left:70px;font-size:13px;">{{ $faker->nip }}</span>
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="font-size: 15px;">Penguji II <br>NIP :</td>
            <td style="text-align: center; font-size: 15px;">:</td>
                 @foreach ($dosen as $faker)
                    @if($faker->id_dosen == $jadwal->id_dsn2)
            <td style="width:250px; font-size: 15px;">{{ $faker->nama }}
                    @endif
                @endforeach
                <br>
                @foreach ($dosen as $faker)
                    @if($faker->id_dosen == $jadwal->id_dsn2)
                    {{ $faker->nip }}
                    @endif
                @endforeach
            </td>
            <td>@foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn2)
                <img src="data:image/png;base64, {{DNS1D::getBarcodePNG($faker->nip, 'C128', 2,28,array(1,1,1)) }} "/>
                <br><span style="margin-left:70px;font-size:13px;">{{ $faker->nip }}</span>
                @endif
            @endforeach</td>
        </tr>
        <tr>
            <td  style="font-size: 15px;">Penguji III <br>NIP :</td>
            <td style="text-align: center; font-size: 15px;">:</td>
                @foreach ($dosen as $faker)
                    @if($faker->id_dosen == $jadwal->id_dsn3)
            <td style="width:250px; font-size: 15px;">{{ $faker->nama }}
                    @endif
                @endforeach
                <br>
                @foreach ($dosen as $faker)
                    @if($faker->id_dosen == $jadwal->id_dsn3)
                    {{ $faker->nip }}
                    @endif
                @endforeach
            </td>
            <td>@foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn3)
                <img src="data:image/png;base64, {{DNS1D::getBarcodePNG($faker->nip, 'C128', 2,28,array(1,1,1)) }} "/>
                <br><span style="margin-left:70px;font-size:13px;">{{ $faker->nip }}</span>
                @endif
            @endforeach</td>
        </tr>
        <tr>
            <td  style="font-size: 15px;">Penguji IV <br>NIP :</td>
            <td style="text-align: center; font-size: 15px;">:</td>
                 @foreach ($dosen as $faker)
                    @if($faker->id_dosen == $jadwal->id_dsn4)
            <td style="width:250px; font-size: 15px;">{{ $faker->nama }}
                    @endif
                @endforeach
                <br>
                @foreach ($dosen as $faker)
                    @if($faker->id_dosen == $jadwal->id_dsn4)
                    {{ $faker->nip }}
                    @endif
                @endforeach
            </td>
            <td>@foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn4)
                <img src="data:image/png;base64, {{DNS1D::getBarcodePNG($faker->nip, 'C128C', 2,28,array(1,1,1)) }} "/>
                <br><span style="margin-left:70px;font-size:13px;">{{ $faker->nip }}</span>
                @endif
            @endforeach</td>
        </tr>
    </table>
    <table style="margin-left: 30px;">
        <tr>
            <td><font size="2" style="font-style: italic;">[Rangkap 3:dosen penguji, ketua komisi, bapendik, program]</font></td>
        </tr>
    </table>
<body>
    
</body>
</html>
