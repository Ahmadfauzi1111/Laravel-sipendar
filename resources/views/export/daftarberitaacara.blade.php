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
        <td style="text-align: center; font-size:12px;">
        <b>
            <p style="margin-bottom: 0px; margin-top:0px;">
                Berita Acara Ujian<br>(F.S. TA 1C)
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
    <td style="font-size: 15px;"><b>LAMPIRAN BERITA ACARA UJIAN KOMPREHENSIF</b></td>    
</tr>    
</table>
<br>
<br>
<table style="margin-left: 30px; ">
<tr>
    <td>Telah melakukan ujian pendadaran saudara :</td>
</tr>
</table>
<table style="margin-left: 70px;line-height: 100%; font-size:14px; ">
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
<table style="margin-left: 30px; ">
<tr>
    <td>Dengan nilai terlampir pada lampiran FS-TA1E.</td>
</tr>
</table>
<br>
<table style="margin-left: 250px; line-height: 75%; font-size:14px;">
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
<table style="margin-left: 70px;" class="pepek">
    <tr>
        <td style="width:110px; font-size: 15px;">Penguji I <br>NIP :</td>
        <td style="width:10px; text-align: center; font-size: 15px;">:</td>
             @foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn1)
        <td style="width:300px; font-size: 15px;">{{ $faker->nama }}
                @endif
            @endforeach
            <br>
            @foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn1)
                {{ $faker->nip }}
                @endif
            @endforeach
        </td>
        <td>ttd : ..........................</td>
    </tr>
    <tr>
        <td style="font-size: 15px;">Penguji II <br>NIP :</td>
        <td style="text-align: center; font-size: 15px;">:</td>
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
        <td style="text-align: center; font-size: 15px;">:</td>
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
        <td style="text-align: center; font-size: 15px;">:</td>
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
<br>
<br>
<br>
<table style="margin-left: 30px; font-size:14px;">
    <tr>
        <td>Nama</td>
        <td>
            :
        </td>
        <td>{{$mahasiswa->nama}}</td>
    </tr>
    <tr>
        <td>NIM</td>
        <td>
            :
        </td>
        <td>{{$mahasiswa->nip}}</td>
    </tr>
</table>
<body>
    
</body>
</html>