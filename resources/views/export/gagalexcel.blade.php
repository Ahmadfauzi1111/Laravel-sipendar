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
            $nilai = \DB::table('tb_nilai AS n')
                    ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai1', 'n.nilai2', 'n.nilai3', 'n.nilai4', 'm.id_mahasiswa','m.nama', 'm.nim', 'm.Angkatan','n.jadwal_id')
                    ->join('tb_dsn AS d' , 'd.id_dosen', '=', 'n.id_dsn')
                    ->join('tb_mhs AS m' , 'm.id_mahasiswa', '=', 'n.id_mhs')
                    ->join('tb_jadwal AS j' , 'n.jadwal_id', '=', 'j.id_jadwal')
                    ->where('n.id_mhs', '=' , $value->id_mahasiswa )
                    ->where('n.deleted_at','!=',NULL)
                    ->where('n.jadwal_id','=', $value->id_jadwal)
                    ->get();
                    
                    $hasil1 = $nilai->avg('nilai1');
                    $hasil2 = $nilai->avg('nilai2');
                    $hasil3 = $nilai->avg('nilai3');
                    $hasil4 = $nilai->avg('nilai4');

                    $nilai1 = $nilai->sum('nilai1');
                    $nilai2 = $nilai->sum('nilai2');
                    $nilai3 = $nilai->sum('nilai3');
                    $nilai4 = $nilai->sum('nilai4');

                    $nilaiTotal = ($nilai1 + $nilai2 + $nilai3 + $nilai4)/16;
        @endphp

             @if ($value->tahap == 7 || $value->tahap == 8)
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
                    
                        if ($nilaiTotal <= 64.99) {
                            echo round($nilaiTotal, 2);
                        }
                        if ($nilaiTotal < 46) {
                            echo ' / E' ; } 
                        elseif ($nilaiTotal >=46 && $nilaiTotal<55.99) { 
                            echo ' / D' ; } 
                        elseif ($nilaiTotal >=56 && $nilaiTotal<59.99) { 
                            echo ' / CD' ; } 
                        elseif ($nilaiTotal >=60 && $nilaiTotal<64.99) { 
                        echo ' / C' ; } 
                    
                    @endphp
                </td>
            </tr>
            @endif
            @endforeach
	</tbody>
</table>