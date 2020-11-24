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
<table style="float:right; border-style:solid;  ">
    <tr>
        <td style="text-align: center; font-size:15px;">
        <b>
            <p style="margin-bottom: 0px; margin-top:0px;">
                (F.S. TA 1D)
            </p>
        </b>
        </td>
    </tr>
</table>
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
<table style="margin-left: 210px; margin-top:0px; margin-bottom:0px;">
    <tr>
        <td style="font-size: 15px;"><b>LAMPIRAN DAFTAR HADIR UJIAN KOMPREHENSIF</b></td>    
    </tr>    
</table>
<table style="margin-left: 30px; ">
    <tr>
        <td>Telah dilakukan pendadaran atas nama mahasiswa berikut :</td>
    </tr>
</table>
<table style="margin-left: 70px;line-height: 80%; font-size:15px; ">
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
            N a m a<br>
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
            Jam<br>
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
        <td>dengan perincian dosen penguji sebagai berikut :</td>
    </tr>
</table>
<table style="margin-left: 30px;" class="solid" >
    <tr>
        <th style="width: 30px; ">No</th>
        <th style="width: 250px;">Dosen Penguji</th>
        <th style="width: 180px;">NIP</th>
        <th>Bidang Konsentrasi</th>
    </tr>
    <tr>
        <td style="text-align: center">1</td>
        @foreach ($dosen as $faker)
            @if($faker->id_dosen == $jadwal->id_dsn1)
            <td> {{ $faker->nama }}</td>
            @endif
        @endforeach
        @foreach ($dosen as $faker)
            @if($faker->id_dosen == $jadwal->id_dsn1)
            <td> {{ $faker->nip }}</td>
            @endif
        @endforeach
        <td></td>
    </tr>
    <tr>
        <td style="text-align: center">2</td>
        @foreach ($dosen as $faker)
            @if($faker->id_dosen == $jadwal->id_dsn2)
            <td> {{ $faker->nama }}</td>
            @endif
        @endforeach
        @foreach ($dosen as $faker)
            @if($faker->id_dosen == $jadwal->id_dsn2)
            <td> {{ $faker->nip }}</td>
            @endif
        @endforeach
        <td></td>
    </tr>
    <tr>
        <td style="text-align: center">3</td>
        @foreach ($dosen as $faker)
            @if($faker->id_dosen == $jadwal->id_dsn3)
            <td> {{ $faker->nama }}</td>
            @endif
        @endforeach
        @foreach ($dosen as $faker)
            @if($faker->id_dosen == $jadwal->id_dsn3)
            <td> {{ $faker->nip }}</td>
            @endif
        @endforeach
        <td></td>
    </tr>
    <tr>
        <td style="text-align: center">4</td>
        @foreach ($dosen as $faker)
            @if($faker->id_dosen == $jadwal->id_dsn4)
            <td> {{ $faker->nama }}</td>
            @endif
        @endforeach
        @foreach ($dosen as $faker)
            @if($faker->id_dosen == $jadwal->id_dsn4)
            <td> {{ $faker->nip }}</td>
            @endif
        @endforeach
        <td></td>
    </tr>
    <tr>
        <td style="text-align: center">5</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<br>
<table style="margin-left: 30px; line-height: 75%; font-size:14px;">
    <tr>
        <td style="font-style: italic; ">[ Kehadiran minimal : 4 orang dosen penguji ]</td>
    </tr>
    <tr>
        <td>Ditetapkan di Purbalingga,  {{ \Carbon\Carbon::parse( $jadwal->tanggal )->isoFormat('dddd, D MMMM Y') }} </td>
    </tr>
    <tr>
        <td>Jam {{$jadwal->shiftmulai}} s/d {{$jadwal->shiftselesai}} Wib</td>
    </tr>
    <tr>
        <td>di {{$jadwal->ruang}} Fakultas Teknik kampus Purbalingga</td>
    </tr>
</table>
<br>
<table style="margin-left: 30px;">
    <tr>
        <td style="font-size: 14px;">Ketua Penguji :</td>
    </tr>
    <tr>
        @foreach ($dosen as $faker)
            @if($faker->id_dosen == $jadwal->id_dsn1)
        <td style="font-size: 16px;">{{ $faker->nama }}</td>
        @endif
        @endforeach
        <td>ttd.................</td>
    </tr>
</table>
<br>
<table style="margin-left: 30px; font-size: 14px;">
    <tr>
        <td>Anggota :</td>
    </tr>
</table>
<br>
<table style="margin-left: 30px;" class="pepek">
    <tr>
        <td style="font-size: 15px;">Penguji II <br>NIP :</td>
        <td style="width:10px; text-align: center; font-size: 15px;">:</td>
             @foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn2)
        <td style="width:300px; font-size: 15px;">{{ $faker->nama }}
                @endif
            @endforeach
            <br>
            @foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn2)
                {{ $faker->nip }}
                @endif
            @endforeach
        </td>
        <td>ttd : ...........................</td>
    </tr>
    <tr>
        <td  style="font-size: 15px;">Penguji III <br>NIP :</td>
        <td style="width:10px; text-align: center; font-size: 15px;">:</td>
             @foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn3)
        <td style="width:300px; font-size: 15px;">{{ $faker->nama }}
                @endif
            @endforeach
            <br>
            @foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn3)
                {{ $faker->nip }}
                @endif
            @endforeach
        </td>
        <td>ttd : ...........................</td>
    </tr>
    <tr>
        <td  style="font-size: 15px;">Penguji IV <br>NIP :</td>
        <td style="width:10px; text-align: center; font-size: 15px;">:</td>
             @foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn4)
        <td style="width:300px; font-size: 15px;">{{ $faker->nama }}
                @endif
            @endforeach
            <br>
            @foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn4)
                {{ $faker->nip }}
                @endif
            @endforeach
        </td>
        <td>ttd : ...........................</td>
    </tr>
    <tr>
        <td  style="font-size: 15px;">Penguji V <br>NIP :</td>
        <td style="text-align: center; font-size: 15px;">:</td>
        <td style="width:300px; font-size: 15px;"><br></td>
        <td>ttd : ...........................</td>
    </tr>
</table>
<table style="margin-left: 30px;">
    <tr>
        <td><font size="2" style="font-style: italic;">[Rangkap 3 : dosen pembimbing, Ketua komisi, Bapendik Program]</font></td>
    </tr>
</table>
<body>
    
</body>
</html>