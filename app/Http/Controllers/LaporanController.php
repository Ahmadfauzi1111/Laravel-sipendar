<?php

namespace App\Http\Controllers;

use App\jadwal;
use App\nilai;
use App\Dosen;
use App\Komisi;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\JadwalExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $nilai = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai1', 'n.nilai2', 'n.nilai3', 'n.nilai4', 'm.id_mahasiswa','m.nama', 'm.nim', 'm.Angkatan')
            ->join('tb_dsn AS d' , 'd.id_dosen', '=', 'n.id_dsn')
            ->join('tb_mhs AS m' , 'm.id_mahasiswa', '=', 'n.id_mhs')
            ->get();
        $jadwal = \DB::table('tb_jadwal as j')->select('j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','j.tahap','j.deleted_at','j.ruang','j.tanggal','j.shiftmulai','j.shiftselesai','j.id_dsn1','j.id_dsn2','j.id_dsn3','j.id_dsn4')
        ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
        ->where('j.tahap','>',5)
        ->get(); 
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        $komisi = Komisi::find(Auth::User()->komisi->id_komisi);
        $nilaiTotal =DB::select(DB::raw('SELECT id_mhs, deleted_at,
        sum(
            (nilai1+nilai2+nilai3+nilai4)
            )/16
            as nilai
        FROM
            tb_nilai tn 
        GROUP BY 
            id_mhs
        ;'));
        $lulus = \DB::table('tb_nilai as n')->select('n.id_mhs', 'j.id_mhs')
        ->join('tb_jadwal as j', 'n.id_mhs', '=', 'j.id_mhs')
        ->where('j.tahap','=', 8)
        ->where('n.deleted_at','=', NULL)
        ->where('j.deleted_at','=', NULL)
        ->groupBy('j.id_mhs')
        ->get()->count();
        $gagal = \DB::table('tb_nilai as n')->select('n.id_mhs', 'j.id_mhs')
        ->join('tb_jadwal as j', 'n.id_mhs', '=', 'j.id_mhs')
        ->where('j.tahap','=', 7)
        ->where('j.deleted_at','=', NULL)
        ->groupBy('j.id_mhs')
        ->get()->count();
        $gagaldaftar = \DB::table('tb_jadwal as j')->select('j.id_mhs')
        // ->where('j.tahap','=', 7)
        ->where('j.deleted_at','!=', NULL)
        ->get()->count();
        // $lulus = collect($nilaiTotal)->where('nilai', '>=', 60)->where('deleted_at','=', NULL)->count();
        // $gagal = collect($nilaiTotal)->where('nilai', '<=', 60)->where('deleted_at','=', NULL)->count();
        // $gagaldaftar = collect($nilaiTotal)->where('nilai', '<=', 60)->where('deleted_at','!=', NULL)->count();
        $count = \DB::table('tb_jadwal')->where('tahap' , '>', 5)->get()->count();
        $dosdar = Dosen::all()->count();
        return view('halaman_komisi/laporan' ,[
            'nilai' => $nilai,
            'jadwal' => $jadwal,
            'dosen' => $dosen,
            'komisi' => $komisi,
            'lulus' => $lulus,
            'gagal' => $gagal,
            'gagaldaftar' => $gagaldaftar,
            'count' => $count,
            'dosdar' => $dosdar
        ]);
    }
    public function exportpdf()
    {
        $jadwal = \DB::table('tb_jadwal as j')->select('j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','j.tahap','j.deleted_at','j.ruang','j.tanggal','j.shiftmulai','j.shiftselesai','j.id_dsn1','j.id_dsn2','j.id_dsn3','j.id_dsn4')
        ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
        ->where('j.tahap','>',5)
        ->get(); 
        $dosen = Dosen::all();
        $pdf = PDF::loadView('export.laporanpdf', ['jadwal' => $jadwal,'dosen' => $dosen])->setPaper('a4', 'landscape');
        return $pdf->download('Mahasiswa sudah Pedadaran.pdf');
    }
    public function exportexcel() 
    {
        $jadwal = \DB::table('tb_jadwal as j')->select('j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','j.tahap','j.deleted_at','j.ruang','j.tanggal','j.shiftmulai','j.shiftselesai','j.id_dsn1','j.id_dsn2','j.id_dsn3','j.id_dsn4')
        ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
        ->where('j.tahap','>',5)
        ->get(); 
        $dosen = Dosen::all();
        return Excel::download(new JadwalExport($jadwal,$dosen), 'Mahasiswa sudah Pedadaran.xlsx');
    }
}
