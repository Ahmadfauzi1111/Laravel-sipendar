<?php

namespace App\Http\Controllers;

use App\jadwal;
use App\nilai;
use App\Dosen;
use App\Komisi;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class infonilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $idMhsDadar = $id;
        $nilaiDadar = null;
        $dosenDadar = null;
        $dosenPenilai = array();
        $semuaDosen = false;

        //Siapa saja dosen yang mendadar contoh: Wahyu?
        
        $dosenDadarMentah = \DB::table('tb_jadwal AS n')
            ->select('n.id_dsn1','n.id_dsn2','n.id_dsn3','n.id_dsn4')
            ->where('n.deleted_at', '=' , NULL)
            ->where('n.id_mhs', '=' , $idMhsDadar )
            ->get();
        foreach ($dosenDadarMentah as $dosenDadarku) {
            $dosenDadar = array($dosenDadarku->id_dsn1, $dosenDadarku->id_dsn2, $dosenDadarku->id_dsn3, $dosenDadarku->id_dsn4);
        }
        sort($dosenDadar);
        $dosenKasihNilai = \DB::table('tb_nilai AS n')
            ->select('n.id_dsn')
            ->where('n.deleted_at', '=' , NULL)
            ->where('n.id_mhs', '=' , $idMhsDadar )
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
            ->where('n.id_mhs', '=' , $id )
            ->where('n.deleted_at', '=' , NULL)
            ->get();
        $nilaiA = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai1')
            ->where('n.id_mhs', '=' , $id )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai1');
        $nilaiB = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai2')
            ->where('n.id_mhs', '=' , $id )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai2');
        $nilaiC = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai3')
            ->where('n.id_mhs', '=' , $id )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai3');
        $nilaiD = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai4')
            ->where('n.id_mhs', '=' , $id )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai4');
        $nilaiTotal = ($nilaiA + $nilaiB + $nilaiC + $nilaiD)/16;

            $yeay = Mahasiswa::find($id);
            $mahasiswa = Mahasiswa::all();
            $dosen = Dosen::all();
            $komisi = Komisi::find(Auth::User()->komisi->id_komisi);
            $jadwal = \DB::table('tb_jadwal as j')->select('j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','j.tahap','j.deleted_at')
                ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
                ->where('j.id_mhs', '=', $id)
                ->where('j.tahap','=',6)
                ->where('j.deleted_at','=', NULL)
                ->get();
        return view('/halaman_komisi/informasi',[
            'yeay' => $yeay,
            'nilai' => $nilai,
            'jadwal' => $jadwal,
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'komisi' => $komisi,
            'semuaDosen' => $semuaDosen,
            'nilaiA' => $nilaiA,
            'nilaiB' => $nilaiB,
            'nilaiC' => $nilaiC,
            'nilaiD' => $nilaiD,
            'nilaiTotal' => $nilaiTotal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tahap($id)
    {
        $nilai = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai1', 'n.nilai2', 'n.nilai3', 'n.nilai4', 'm.id_mahasiswa','m.nama', 'm.nim', 'm.Angkatan')
            ->join('tb_dsn AS d' , 'd.id_dosen', '=', 'n.id_dsn')
            ->join('tb_mhs AS m' , 'm.id_mahasiswa', '=', 'n.id_mhs')
            ->where('n.id_mhs', '=' , $id )
            ->where('n.deleted_at', '=' , NULL)
            ->get();
        $nilaiA = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai1')
            ->where('n.id_mhs', '=' , $id )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai1');
        $nilaiB = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai2')
            ->where('n.id_mhs', '=' , $id )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai2');
        $nilaiC = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai3')
            ->where('n.id_mhs', '=' , $id )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai3');
        $nilaiD = \DB::table('tb_nilai AS n')
            ->select('n.id_nilai', 'n.id_mhs', 'n.id_dsn', 'n.nilai4')
            ->where('n.id_mhs', '=' , $id )
            ->where('n.deleted_at', '=' , NULL)
            ->get()
            ->sum('nilai4');
        $nilaiTotal = ($nilaiA + $nilaiB + $nilaiC + $nilaiD)/16;
        if($nilaiTotal <60 ){
            $jadwal = \DB::table('tb_jadwal')->where('id_mhs', '=', $id)->where('deleted_at','=', NULL)
            ->update([
                'tahap' => '7'
            ]);
        }
        elseif($nilaiTotal >=60 && $nilaiTotal <64.99 || $nilaiTotal >=65 && $nilaiTotal<69.99||$nilaiTotal >=70 && $nilaiTotal<74.99 || $nilaiTotal >=75 && $nilaiTotal<79.99 || $nilaiTotal> 80){
            $jadwal = \DB::table('tb_jadwal')->where('id_mhs', '=', $id)->where('deleted_at','=', NULL)
            ->update([
                'tahap' => '8'
            ]);
        }
        $jadwal = \DB::table('tb_jadwal as j')->select('j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','j.tahap','j.deleted_at','j.ruang','j.tanggal','j.shiftmulai','j.shiftselesai')
        ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
        ->where('j.id_mhs','=', $id)
        ->where('j.tahap','=',6)
        ->where('j.deleted_at','=', NULL)
        ->get(); 
        
        return redirect('/halaman_komisi/informasi/'.$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
