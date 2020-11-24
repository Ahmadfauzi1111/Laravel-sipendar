<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jadwal Komisi</title>
</head>
<body>
    <h3>Jadwal Pendadaran Fakultas Teknik Universitas Jenderal Soedirman</h3>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col" style="color: #007bff">Nama</th>
                <th>:</th>
                <td>{{ $jadwal->mahasiswa->nama }}</td>
            </tr>
            <tr>
                <th scope="col" style="color: #007bff">NIM</th>
                <th>:</th>
                <td>{{ $jadwal->mahasiswa->nim }}</td>
            </tr>
            <tr>
                <th scope="col" style="color: #007bff">Tanggal</th>
                <th>:</th>
                <td>{{ \Carbon\Carbon::parse( $jadwal->tanggal )->isoFormat('dddd, D MMMM Y') }}</td>
            </tr>
            <tr>
                <th scope="col" style="color: #007bff">Waktu</th>
                <th>:</th>
                <td>{{ $jadwal->shiftmulai }} - {{ $jadwal->shiftselesai }}</td>
            </tr>
            <tr>
                <th scope="col" style="color: #007bff">Ruangan</th>
                <th>:</th>
                <td>{{ $jadwal->ruang }}</td>
            </tr>
            <tr>
                <th scope="col" style="color: #007bff">Ketua Dosen Penguji 1</th>
                <th>:</th>
                <td> {{ $jadwal->dosen1->nama }}</td>
            </tr>
            <tr>
                <th scope="col" style="color: #007bff">Dosen Penguji 2</th>
                <th>:</th>
                <td> {{ $jadwal->dosen2->nama }}</td>
            </tr>
            <tr>
                <th scope="col" style="color: #007bff">Dosen Penguji 3</th>
                <th>:</th>
                <td> {{ $jadwal->dosen3->nama }}</td>
            </tr>
            <tr>
                <th scope="col" style="color: #007bff">Dosen Penguji 4</th>
                <th>:</th>
                <td> {{ $jadwal->dosen4->nama }}</td>
            </tr>
        </thead>
    </table>
</body>
</html>