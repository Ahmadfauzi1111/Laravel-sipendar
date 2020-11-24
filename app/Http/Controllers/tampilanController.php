<?php

namespace App\Http\Controllers;

use App\jadwal;
use App\nilai;
use App\Dosen;
use App\Komisi;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tampilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::find(Auth::User()->mahasiswa->id_mahasiswa);
        $jadwal = \DB::table('tb_jadwal as j')->select('j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','m.tahap','j.tahap','j.deleted_at')
        ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
        ->where('j.id_mhs','=', $mahasiswa->id_mahasiswa)
        ->where('j.deleted_at','=', NULL)
        ->where('j.tahap','=',8)
        ->get();
        $idMhsDadar = $mahasiswa->id_mahasiswa;
        $nilaiDadar = null;
        $dosenDadar = null;
        $dosenPenilai = array();
        $semuaDosen = false;

        //Siapa saja dosen yang mendadar contoh: Wahyu?
        
        $dosenDadarMentah = \DB::table('tb_jadwal AS n')
            ->select('n.id_dsn1','n.id_dsn2','n.id_dsn3','n.id_dsn4')
            ->where('n.deleted_at','=', NULL)
            ->where('n.id_mhs', '=' , $idMhsDadar )
            ->get();
        foreach ($dosenDadarMentah as $dosenDadarku) {
            $dosenDadar = array($dosenDadarku->id_dsn1, $dosenDadarku->id_dsn2, $dosenDadarku->id_dsn3, $dosenDadarku->id_dsn4);
            sort($dosenDadar);
        }
        $dosenKasihNilai = \DB::table('tb_nilai AS n')
            ->select('n.id_dsn')
            ->where('n.id_mhs', '=' , $idMhsDadar )
            ->where('n.deleted_at','=', NULL)
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
        $nilai = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai1', 'n.nilai2', 'n.nilai3', 'n.nilai4', 'm.id_mahasiswa','m.nama', 'm.nim', 'm.Angkatan')
            ->join('tb_dsn AS d' , 'd.id_dosen', '=', 'n.id_dsn')
            ->join('tb_mhs AS m' , 'm.id_mahasiswa', '=', 'n.id_mhs')
            ->where('n.id_mhs', '=' , $idMhsDadar )
            ->where('n.deleted_at','=', NULL)
            ->get();
        $nilaiA = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai1')
            ->where('n.id_mhs', '=' , $idMhsDadar )
            ->where('n.deleted_at','=', NULL)
            ->get()
            ->sum('nilai1');
        $nilaiB = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai2')
            ->where('n.id_mhs', '=' , $idMhsDadar )
            ->where('n.deleted_at','=', NULL)
            ->get()
            ->sum('nilai2');
        $nilaiC = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai3')
            ->where('n.id_mhs', '=' , $idMhsDadar )
            ->where('n.deleted_at','=', NULL)
            ->get()
            ->sum('nilai3');
        $nilaiD = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai4')
            ->where('n.id_mhs', '=' , $idMhsDadar )
            ->where('n.deleted_at','=', NULL)
            ->get()
            ->sum('nilai4');
        $nilaiTotal = ($nilaiA + $nilaiB + $nilaiC + $nilaiD)/16;
        return view('halaman_mahasiswa/nilai', [
            'nilai' => $nilai,
            'jadwal' => $jadwal,
            'mahasiswa' => $mahasiswa,
            'semuaDosen' => $semuaDosen,
            'nilaiA' => $nilaiA,
            'nilaiB' => $nilaiB,
            'nilaiC' => $nilaiC,
            'nilaiD' => $nilaiD,
            'nilaiTotal' => $nilaiTotal
        ]);
    }
    public function destroy($id)
    {
        $hasil = nilai::select('id_mhs')->where('id_mhs', '=', $id )->delete();
        $mahasiswa = Mahasiswa::FindOrFail($id);
        $mahasiswa->tahap = '3';
        $mahasiswa->save();
        $jadwal = Jadwal::where('id_mhs', '=', $id)->delete();

        return redirect('halaman_mahasiswa/registrasi')->with('delete', 'Data Berhasil di Hapus');
    }
}
