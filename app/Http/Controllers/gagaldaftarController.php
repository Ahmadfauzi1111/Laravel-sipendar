<?php

namespace App\Http\Controllers;

use App\jadwal;
use App\Nilai;
use App\Dosen;
use App\Komisi;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\GagalExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class gagaldaftarController extends Controller
{
    public function index(Request $request)
    {
        // $nilai = Nilai::all();
        $jadwal = \DB::table('tb_jadwal as j')->select('j.id_jadwal','j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','j.tahap','j.deleted_at','j.shiftmulai','j.shiftselesai','j.tanggal')
        ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
        ->where('j.deleted_at','!=', NULL);
        if (isset($request->semester)) {
            $jadwal->where('semester', $request->semester);
        }

        if (isset($request->tahun)) {
            $jadwal->whereYear('tahun', $request->tahun);
        }

        $jadwal= $jadwal->get();
        $nilai = nilai::onlyTrashed()->get();
        // $dosen = Dosen::all();
        $komisi = Komisi::find(Auth::User()->komisi->id_komisi);
        $nilaiTotal =DB::select(DB::raw('SELECT id_mhs,deleted_at,
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
        $count = \DB::table('tb_jadwal')->where('tahap' , '>', 5)->get()->count();
        $dosdar = Dosen::all()->count();
        return view('halaman_komisi/gagaldaftar' ,[
            'nilai' => $nilai,
            'jadwal' => $jadwal,
            'gagaldaftar' => $gagaldaftar,
            'komisi' => $komisi,
            'lulus' => $lulus,
            'gagal' => $gagal,
            'count' => $count,
            'dosdar' => $dosdar
        ]);
    }
    public function pdfexportgagal(Request $request)
    {
        $jadwal = \DB::table('tb_jadwal as j')->select('j.id_jadwal','j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','j.tahap','j.deleted_at','j.shiftmulai','j.shiftselesai','j.tanggal')
        ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
        // ->where('j.tahap','=',7)
        ->where('j.deleted_at','!=', NULL);
        if (isset($request->semester)) {
            $jadwal->where('semester', $request->semester);
        }

        if (isset($request->tahun)) {
            $jadwal->whereYear('tahun', $request->tahun);
        }

        $jadwal= $jadwal->get();
        $pdf = PDF::loadView('export.gagalpdf', ['jadwal' => $jadwal]);
        return $pdf->download('Mahasiswa Gagal Pedadaran.pdf');
    }
    public function excelexportgagal(Request $request) 
    {
        $jadwal = \DB::table('tb_jadwal as j')->select('j.id_jadwal','j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','j.tahap','j.deleted_at','j.shiftmulai','j.shiftselesai','j.tanggal')
        ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
        // ->where('j.tahap','=',7)
        ->where('j.deleted_at','!=', NULL);
        if (isset($request->semester)) {
            $jadwal->where('semester', $request->semester);
        }

        if (isset($request->tahun)) {
            $jadwal->whereYear('tahun', $request->tahun);
        }

        $jadwal= $jadwal->get();

        return Excel::download(new GagalExport($jadwal), 'Mahasiswa Gagal Pedadaran.xlsx');
    }
    public function laporangagal(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        $jadwal = Jadwal::onlyTrashed()->where('id_jadwal',$id)->first();
        $nilai = \DB::table('tb_nilai AS n')
        ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai1', 'n.nilai2', 'n.nilai3', 'n.nilai4', 'm.id_mahasiswa','m.nama', 'm.nim', 'm.Angkatan','n.jadwal_id')
        ->join('tb_dsn AS d' , 'd.id_dosen', '=', 'n.id_dsn')
        ->join('tb_mhs AS m' , 'm.id_mahasiswa', '=', 'n.id_mhs')
        ->join('tb_jadwal AS j' , 'n.jadwal_id', '=', 'j.id_jadwal')
        ->where('n.id_mhs', '=' , $jadwal->id_mhs )
        ->where('n.deleted_at','!=',NULL)
        ->where('n.jadwal_id','=', $jadwal->id_jadwal)
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
        $pdf = PDF::loadView('export.laporangagal', ['mahasiswa' => $mahasiswa, 'jadwal' => $jadwal, 'dosen' => $dosen, 'hasil1' => $hasil1 , 'hasil2' => $hasil2 , 'hasil3' => $hasil3 , 'hasil4' => $hasil4, 'nilaiTotal' => $nilaiTotal]);
        return $pdf->download('Surat Daftar Penilaian.pdf');
    }
}
