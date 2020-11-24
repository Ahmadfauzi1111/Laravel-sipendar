<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Mahasiswa;
use App\jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = \DB::table('tb_jadwal AS j')->select('m.id_mahasiswa','m.nama','m.nim','j.shiftmulai','shiftselesai','j.ruang','j.tanggal','j.tahap')
        ->join('tb_mhs AS m', 'm.id_mahasiswa', '=', 'j.id_mhs')
        ->where('j.deleted_at', '=', NULL)
        ->where(function($q){
            $q->where('j.id_dsn1', Auth::user()->dosen->id_dosen)
            ->orWhere('j.id_dsn2', Auth::user()->dosen->id_dosen)
            ->orWhere('j.id_dsn3', Auth::user()->dosen->id_dosen)
            ->orWhere('j.id_dsn4', Auth::user()->dosen->id_dosen);
        })->get();       
        $dosen = Dosen::find(Auth::User()->dosen->id_dosen);
        return view('halaman_dosen/Datajadwal', [
            'jadwal' => $jadwal,
            'dosen' => $dosen
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
