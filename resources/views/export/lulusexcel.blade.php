<table class="table">
	<thead>
		<tr>
			<th style="text-align:center;">No</th>
			<th style="text-align:center;">Nama</th>
			<th style="text-align:center;">Nim</th>
            <th style="text-align:center;">Angkatan</th>
            <th>Jadwal Pendadaran</th>
			<th style="text-align:center;">Nilai Pendadaran</th>
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
                <td>{{$value->Angkatan}}</td>
                <td>{{$value->shiftmulai}} - {{$value->shiftselesai}}, {{ date('d M Y', strtotime($value->tanggal)) }}</td>
                <td>
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
            @endif
            @endforeach
	</tbody>
</table>