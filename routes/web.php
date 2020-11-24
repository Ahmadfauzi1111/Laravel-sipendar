<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
    {
        //INI ADALAH HALAMANAN ADMIN (Admin)
        Route::post('/halaman_admin/adm/data_admin','AdminController@store');
        Route::get('/halaman_admin/adm/data_admin/{id}','AdminController@destroy');
        Route::patch('/halaman_admin/adm/data_admin/{admin}','AdminController@update');
        Route::get('/halaman_admin/adm/data_admin','AdminController@data_admin');
        //INI ADALAH HALAMANAN ADMIN (Dosen)
        Route::post('/halaman_admin/dsn/data_dosen','DosenController@store');
        Route::get('/halaman_admin/dsn/data_dosen/{dosen}','DosenController@destroy');
        Route::patch('/halaman_admin/dsn/data_dosen/{dosen}','DosenController@update');
        Route::get('/halaman_admin/dsn/data_dosen','DosenController@data_dosen');
        //INI ADALAH HALAMANAN ADMIN (Mahasiswa)
        Route::post('/halaman_admin/mhs/data_mahasiswa','MahasiswaController@store');
        Route::get('/halaman_admin/mhs/data_mahasiswa/{id}','MahasiswaController@destroy');
        Route::patch('/halaman_admin/mhs/data_mahasiswa/{mahasiswa}','MahasiswaController@update');
        Route::get('/halaman_admin/mhs/data_mahasiswa','MahasiswaController@data_mahasiswa');
        //INI ADALAH HALAMANAN ADMIN (Komisi)
        Route::post('/halaman_admin/kms/data_komisi','KomisiController@store');
        Route::get('/halaman_admin/kms/data_komisi/{komisi}','KomisiController@destroy');
        Route::patch('/halaman_admin/kms/data_komisi/{komisi}','KomisiController@update');
        Route::get('/halaman_admin/kms/data_komisi','KomisiController@data_komisi');
        //INI ADALAH HALAMANAN ADMIN (Konfirmasi)
        Route::get('/halaman_admin/kfrm/konfirmasi/download/file1/{id}','downloadController@getDownload');
        Route::get('/halaman_admin/kfrm/konfirmasi/download/file2/{id}','unduhController@getUnduh');
        Route::put('/halaman_admin/kfrm/konfirmasi/{id}','konfirmasiController@update');
        Route::patch('/halaman_admin/kfrm/konfirmasi/{id}','konfirmasiController@updated');
        Route::get('/halaman_admin/kfrm/konfirmasi/{id}','konfirmasiController@destroy');
        Route::get('/halaman_admin/kfrm/konfirmasi', 'konfirmasiController@index');
        //INI ADALAH HALAMANAN ADMIN (Data nilai)
        Route::get('/halaman_admin/nilai/datanilai','datanilaiController@index');
        //INI ADALAH HALAMANAN ADMIN (Edit Password)
        Route::put('/halaman_admin/edit', 'EditadmController@update');
        Route::get('/halaman_admin/edit', 'EditadmController@index');
    });
    Route::group(['middleware' => 'App\Http\Middleware\MahasiswaMiddleware'], function()
    {
        //INI ADALAH HALAMANAN MAHASISWA (Registrasi)
        Route::patch('/halaman_mahasiswa/registrasi/{student}', 'studentController@update');
        Route::get('/halaman_mahasiswa/registrasi', 'studentController@index');
        //INI ADALAH HALAMANAN MAHASISWA (Pendaftaran)
        Route::patch('/halaman_mahasiswa/pendaftaran/{id}', 'daftarController@update');
        Route::get('/halaman_mahasiswa/pendaftaran', 'daftarController@index');
        //INI ADALAH HALAMANAN MAHASISWA (Jadwal Pendadaran)
        Route::get('/halaman_mahasiswa/jadwal', 'jadwalController@index');
        //INI ADALAH HALAMANAN MAHASISWA (Edit Password)
        Route::put('/halaman_mahasiswa/edit', 'EditmhsController@update');
        Route::get('/halaman_mahasiswa/edit', 'EditmhsController@index');
        //INI ADALAH HALAMANAN MAHASISWA (Nilai Pendadaran)
        Route::get('/halaman_mahasiswa/nilai/{id}', 'tampilanController@destroy');
        Route::get('/halaman_mahasiswa/nilai', 'tampilanController@index');
    });
    Route::group(['middleware' => 'App\Http\Middleware\KomisiMiddleware'], function()
    {
        //INI ADALAH HALAMANAN KOMISI (Jadwal Pendadaran)
        // Route::get('/halaman_komisi/penjadwalan', 'penjadwalanController@index');
        Route::Post('/halaman_komisi/jadwalkomisi','jadwalkomisiController@store');
        Route::patch('/halaman_komisi/jadwalkomisi/{id}','jadwalkomisiController@update');
        Route::put('/halaman_komisi/jadwalkomisi/{id}','jadwalkomisiController@edit');
        Route::get('/halaman_komisi/jadwalkomisi/cobaEmail', 'jadwalkomisiController@cobaEmail');
        Route::get('//halaman_komisi/jadwalkomisi/{id}','jadwalkomisiController@destroy');
        Route::get('/halaman_komisi/jadwalkomisi', 'jadwalkomisiController@index');
        Route::get('//halaman_komisi/jadwalkomisi/{id}','jadwalkomisiController@destroy');
        Route::post('/halaman_komisi/print/{id}','jadwalkomisiController@print');
        Route::get('/halaman_komisi/daftarhadir/{id}','jadwalkomisiController@daftarhadir');
        Route::get('/halaman_komisi/daftarpenilaian/{id}','jadwalkomisiController@daftarpenilaian');
        Route::get('/halaman_komisi/daftarundanganpendadaran/{id}','jadwalkomisiController@daftarundanganpendadaran');
        Route::get('/halaman_komisi/daftarberitaacara/{id}','jadwalkomisiController@daftarberitaacara');
        Route::get('/halaman_komisi/daftarnilaidosen/{id}','jadwalkomisiController@daftarnilaidosen');
        //INI ADALAH HALAMANAN KOMISI (Laporan Pendadaran)
        Route::get('/halaman_komisi/exportpdf','LaporanController@exportpdf');
        Route::get('/halaman_komisi/pdfexport','lulusController@pdfexport');
        Route::get('/halaman_komisi/pdfexportgagal','gagaldaftarController@pdfexportgagal');
        Route::get('/halaman_komisi/exportexcel','LaporanController@exportexcel');
        Route::get('/halaman_komisi/excelexport','lulusController@excelexport');
        Route::get('/halaman_komisi/excelexportgagal','gagaldaftarController@excelexportgagal');
        Route::get('/halaman_komisi/laporanlulus/{id}','lulusController@laporanlulus');
        Route::get('/halaman_komisi/laporangagal/{id}','gagaldaftarController@laporangagal');
        Route::get('/halaman_komisi/laporan', 'LaporanController@index');
        Route::get('/halaman_komisi/tabledosen', 'tabledosenController@index');
        Route::get('/halaman_komisi/lulus', 'lulusController@index');
        Route::get('/halaman_komisi/gagal', 'gagalController@index');
        Route::get('/halaman_komisi/gagaldaftar', 'gagaldaftarController@index');
        //INI ADALAH HALAMANAN KOMISI (Informasi Pendadaran)
        Route::get('/halaman_komisi/laporan/{id}', 'infonilaiController@tahap');
        Route::get('/halaman_komisi/informasi/{id}', 'infonilaiController@index');
        //INI ADALAH HALAMANAN KOMISI (List Jadwal Pendadaran)
        // Route::Post('/halaman_komisi/list','listdataController@store');
        // Route::patch('/halaman_komisi/list/{id}','listdataController@update');
        // Route::get('//halaman_komisi/list/{id}','listdataController@destroy');
        // Route::get('/halaman_komisi/list', 'ListdataController@index');
        //INI ADALAH HALAMANAN KOMISI (Pengajuan Pendadaran)
        Route::get('/halaman_komisi/pengajuan', 'PengajuanController@index');
        Route::get('/halaman_komisi/pengajuan/download/file1/{id}','downloadkmsController@getDownload');
        Route::get('/halaman_komisi/pengajuan/download/file2/{id}','unduhkmsController@getUnduh');
        Route::put('/halaman_komisi/pengajuan/{id}','PengajuanController@update');
        Route::patch('/halaman_komisi/pengajuan/{id}','PengajuanController@updated');
        //INI ADALAH HALAMANAN KOMISI (Edit Password)
        Route::put('/halaman_komisi/edit', 'EditkmsController@update');
        Route::get('/halaman_komisi/edit', 'EditkmsController@index');
    });
    Route::group(['middleware' => 'App\Http\Middleware\DosenMiddleware'], function()
    {
        //INI ADALAH HALAMANAN DOSEN (Jadwal Pendadaran)
        Route::get('/halaman_dosen/Datajadwal', 'GuruController@index');
        //INI ADALAH HALAMANAN DOSEN (Nilai Pendadaran)
        Route::Post('/halaman_dosen/Datanilai/{id}','NilaiController@store');
        Route::Patch('/halaman_dosen/Datanilai/{id}','NilaiController@update');
        Route::get('/halaman_dosen/nilai', 'NilaiController@index');
        Route::get('/halaman_dosen/Datanilai/{id}', 'NilaiController@index1');
        //INI ADALAH HALAMANAN Dosen (Edit Password)
        Route::put('/halaman_dosen/edit', 'EditdsnController@update');
        Route::get('/halaman_dosen/edit', 'EditdsnController@index');
    });
});
