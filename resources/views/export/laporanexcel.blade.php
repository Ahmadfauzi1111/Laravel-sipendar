<table class="table">
	<thead>
		<tr>
			<th>No</th>
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
                <td>{{$value->nama}}</td>
                <td>{{$value->nim}}</td>
                {{-- <td>{{$value->Angkatan}}</td> --}}
                <td>{{$value->ruang}}, {{ date('d M Y', strtotime($value->tanggal)) }}, {{$value->shiftmulai}} - {{$value->shiftselesai}}</td>
                <td>
                    @foreach($dosen as $faker)
                        @if($faker->id_dosen == $value->id_dsn1)
                        {{$faker->nama}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($dosen as $faker)
                        @if($faker->id_dosen == $value->id_dsn1)
                        {{$faker->nama}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($dosen as $faker)
                        @if($faker->id_dosen == $value->id_dsn1)
                        {{$faker->nama}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($dosen as $faker)
                        @if($faker->id_dosen == $value->id_dsn1)
                        {{$faker->nama}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @if($value->tahap == 6 && $value->deleted_at == NULL)
                    <span class="badge badge-danger" style="font-size: 1em;">Proses</span>
                    @elseif($value->tahap == 7)
                    <span class="badge badge-danger" style="font-size: 1em;">Sudah</span>
                    @elseif($value->tahap == 8)
                    <span class="badge badge-success" style="font-size: 1em;">Sudah</span>
                    @endif
                    
                </td>
            </tr>
            @endif
            @endforeach
	</tbody>
</table>