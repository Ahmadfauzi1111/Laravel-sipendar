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
use App\Exports\JadwallulusExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use \Milon\Barcode\DNS2D;

class lulusController extends Controller
{
    public function index(Request $request)
    {
        // $nilai = Nilai::all();
        $jadwal = \DB::table('tb_jadwal as j')->select('j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','j.tahap','j.deleted_at','j.shiftmulai','j.shiftselesai','j.tanggal')
        ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
        ->where('j.deleted_at','=', NULL)
        ->where('j.tahap','=',8);

        if (isset($request->semester)) {
            $jadwal->where('semester', $request->semester);
        }

        if (isset($request->tahun)) {
            $jadwal->whereYear('tahun', $request->tahun);
        }

        $jadwal= $jadwal->get();
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
        // $jadwal = jadwal::where('deleted_at','=',NULL)->where('tahap','=',8)->get();
        return view('halaman_komisi/lulus' ,[
            // 'nilai' => $nilai,
            'jadwal' => $jadwal,
            // 'mahasiswa' => $mahasiswa,
            'nilaiTotal' => $nilaiTotal,
            'gagal' => $gagal,
            'komisi' => $komisi,
            'lulus' => $lulus,
            'count' => $count,
            'gagaldaftar' => $gagaldaftar,
            'dosdar' => $dosdar
        ]);
    }
    public function pdfexport(Request $request)
    {
        $jadwal = \DB::table('tb_jadwal as j')->select('j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','j.tahap','j.deleted_at','j.shiftmulai','j.shiftselesai','j.tanggal')
        ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
        ->where('j.deleted_at','=', NULL)
        ->where('j.tahap','=',8);
        
        if (isset($request->semester)) {
            $jadwal->where('semester', $request->semester);
        }

        if (isset($request->tahun)) {
            $jadwal->whereYear('tahun', $request->tahun);
        }

        $jadwal= $jadwal->get();
        // $mahasiswa = Mahasiswa::all(); 
        $pdf = PDF::loadView('export.luluspdf', ['jadwal' => $jadwal]);
        return $pdf->download('Mahasiswa lulus Pedadaran.pdf');
    }
    public function excelexport(Request $request) 
    {
        $jadwal = \DB::table('tb_jadwal as j')->select('j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','j.tahap','j.deleted_at','j.shiftmulai','j.shiftselesai','j.tanggal')
        ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
        ->where('j.deleted_at','=', NULL)
        ->where('j.tahap','=',8);
        
        if (isset($request->semester)) {
            $jadwal->where('semester', $request->semester);
        }

        if (isset($request->tahun)) {
            $jadwal->whereYear('tahun', $request->tahun);
        }

        $jadwal= $jadwal->get();

        return Excel::download(new JadwallulusExport($jadwal), 'Mahasiswa lulus Pedadaran.xlsx');
    }
    public function laporanlulus(Request $request, $id)
    {
        $mahasiswa = mahasiswa::find($id);
        $jadwal = $mahasiswa->jadwal;
        $dosen = Dosen::all();
        $nilai = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai1', 'n.nilai2', 'n.nilai3', 'n.nilai4', 'm.id_mahasiswa','m.nama', 'm.nim', 'm.Angkatan')
            ->join('tb_dsn AS d' , 'd.id_dosen', '=', 'n.id_dsn')
            ->join('tb_mhs AS m' , 'm.id_mahasiswa', '=', 'n.id_mhs')
            ->where('n.id_mhs', '=' , $id )
            ->where('n.deleted_at', '=', NULL)
            ->get();

            $idMhsDadar = $id;
            $nilaiDadar = null;
            $dosenDadar = null;
            $dosenPenilai = array();
            $semuaDosen = false;
    
            //Siapa saja dosen yang mendadar contoh: Wahyu?
            
            $dosenDadarMentah = \DB::table('tb_jadwal AS n')
                ->select('n.id_dsn1','n.id_dsn2','n.id_dsn3','n.id_dsn4')
                ->where('n.id_mhs', '=' , $idMhsDadar )
                ->where('n.deleted_at', '=', NULL)
                ->get();
            foreach ($dosenDadarMentah as $dosenDadarku) {
                $dosenDadar = array($dosenDadarku->id_dsn1, $dosenDadarku->id_dsn2, $dosenDadarku->id_dsn3, $dosenDadarku->id_dsn4);
            }
            sort($dosenDadar);
            $dosenKasihNilai = \DB::table('tb_nilai AS n')
                ->select('n.id_dsn')
                ->where('n.id_mhs', '=' , $idMhsDadar )
                ->where('n.deleted_at', '=', NULL)
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

        $hasil1 = $nilai->avg('nilai1');
        $hasil2 = $nilai->avg('nilai2');
        $hasil3 = $nilai->avg('nilai3');
        $hasil4 = $nilai->avg('nilai4');

        $nilai1 = $nilai->sum('nilai1');
        $nilai2 = $nilai->sum('nilai2');
        $nilai3 = $nilai->sum('nilai3');
        $nilai4 = $nilai->sum('nilai4');

        $nilaiTotal = ($nilai1 + $nilai2 + $nilai3 + $nilai4)/16;
        
        $pdf = PDF::loadView('export.laporanlulus', ['mahasiswa' => $mahasiswa, 'jadwal' => $jadwal, 'dosen' => $dosen, 'hasil1' => $hasil1 , 'hasil2' => $hasil2 , 'hasil3' => $hasil3 , 'hasil4' => $hasil4, 'nilaiTotal' => $nilaiTotal, 'semuaDosen' => $semuaDosen]);
        return $pdf->download('Surat Daftar Penilaian.pdf');
    }
}