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
        <td style="text-align: center; font-size:14px;">
        <b>
            <p style="margin-bottom: 0px; margin-top:0px;">
                Penguji <br> Pendadaran <br> (FS-TA23)
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
<table style="margin-left: 70px; line-height: 65%; font-size:14px;">
    <tr>
        <td>
            Nomor<br>
        </td>
        <td>
            :
        </td>
        <td>
            {{$mahasiswa->jadwal->nosurat}}
        </td>
    </tr>
    <tr>
        <td>
            Lampiran<br>
        </td>
        <td>
            : 
        </td>
        <td>
            4 (empat) lembar
        </td>
    </tr>
    <tr>
        <td>
            Perihal<br>
        </td>
        <td>
            :
        </td>
        <td>
            Undangan Penguji Pendadaran       
        </td>
    </tr>
</table>
<br>
<table style="margin-left: 70px; line-height: 65%; font-size:14px;">
    <tr>
        <td>
            Kepada Yth
        </td>
    </tr>
    <tr>
        <td>
            Bapak/Ibu (Penguji Pendadaran)
        </td>
    </tr>
</table>
<table style="margin-left: 70px; font-size: 16px;" class="pepek">
    <tr>
        <td style="width: 30px; text-align:center;">1</td>
            @foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn1)
        <td style="width:300px;">{{ $faker->nama }}
                @endif
            @endforeach
        <td style="width: 120px;">(Penguji I)</td>
    </tr>
    <tr>
        <td style="width: 30px; text-align:center;">2</td>
        @foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn2)
        <td style="width:300px;">{{ $faker->nama }}
                @endif
            @endforeach
        <td style="width: 120px;">(Penguji II)</td>
    </tr>
    <tr>
        <td style="width: 30px; text-align:center;">3</td>
        @foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn3)
        <td style="width:300px;">{{ $faker->nama }}
                @endif
            @endforeach
        <td style="width: 120px;">(Penguji III)</td>
    </tr>
    <tr>
        <td style="width: 30px; text-align:center;">4</td>
        @foreach ($dosen as $faker)
                @if($faker->id_dosen == $jadwal->id_dsn4)
        <td style="width:300px;">{{ $faker->nama }}
                @endif
            @endforeach
        <td style="width: 120px;">(Penguji IV)</td>
    </tr>
    <tr>
        <td style="width: 30px; text-align:center;">5</td>
        <td style="width:300px; "><br></td>
        <td style="width: 120px;">(Penguji V)</td>
    </tr>
</table>
<table style="margin-left: 70px; font-size:14px;">
    <tr>
        <td>
            di tempat
        </td>
    </tr>
</table>
<br>
<br>
<table style="margin-left: 70px; font-size:14px;">
    <tr>
        <td>
            Berdasarkan ajuan dari mahasiswa berikut ini :
        </td>
    </tr>
</table>
<table style="margin-left: 90px; font-size:15px;">
    <tr>
        <td>Nama</td>
        <td>
            :
        </td>
        <td>{{ $mahasiswa->nama }}</td>
    </tr>
    <tr>
        <td>NIM</td>
        <td>
            :
        </td>
        <td>{{ $mahasiswa->nim }}</td>
    </tr>
</table>
<table style="margin-left: 70px; font-size:14px;">
    <tr>
        <td>
            Akan melakukan ujian pendadaran pada :
        </td>
    </tr>
</table>
<table style="margin-left: 100px; font-size:14px;">
    <tr>
        <td>Hari/Tanggal</td>
        <td>
            :
        </td>
        <td>{{ \Carbon\Carbon::parse( $jadwal->tanggal )->isoFormat('dddd, D MMMM Y') }} </td>
    </tr>
    <tr>
        <td>Waktu</td>
        <td>
            :
        </td>
        <td>Jam {{$jadwal->shiftmulai}} s/d {{$jadwal->shiftselesai}} Wib </td>
    </tr>
    <tr>
        <td>Tempat</td>
        <td>
            :
        </td>
        <td>di {{$jadwal->ruang}} Fakultas Teknik kampus Purbalingga</td>
    </tr>
</table>
<table style="margin-left: 70px; font-size:14px;">
    <tr>
        <td>
            Dimohon saudara untuk menjadi penguji pendadaran  mahasiswa tersebut.
        </td>
    </tr>
    <tr>
        <td>Demikian surat undangan penguji pendadaran Tugas Akhir , terimakasih atas perhatiannya.</td>
    </tr>
</table>
<br>
<table style="float:right; font-size:14px;">
    <tr>
        <td>
            Purbalingga, {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y')}}
        </td>
    </tr>
    <tr>
        <td>
            Ketua Jurusan Teknik Informatika
        </td>
    </tr>
</table>
<br>    
<br>    
<br>    
<br>    
<br>    
<br>    
<br>    
<br>    

<table style="float:right; font-size:14px; margin-right:30px;">
    <tr>
        <td>
            @foreach ($dosen as $object)
                @if($object->id_dosen == $kajur->id_dosen)
                {{ $object->nama }}
                @endif
            @endforeach
        </td>
    </tr>
    <tr>
        <td style="text-decoration:overline;">
            @foreach ($dosen as $object)
                @if($object->id_dosen == $kajur->id_dosen)
                {{ $object->nip }}
                @endif
            @endforeach
        </td>
    </tr>
</table>
<br>
<br>    
<table style="margin-left: 30px;">
    <tr>
        <td><font size="2" style="font-style: italic;">[Rangkap 3:dosen penguji, ketua komisi, bapendik, program]</font></td>
    </tr>
</table>
<body>
    
</body>
</html>