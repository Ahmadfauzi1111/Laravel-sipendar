<?php

namespace App\Http\Controllers;

use App\jadwal;
use App\Nilai;
use App\Dosen;
use App\Komisi;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class datanilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = \DB::table('tb_jadwal as j')->select('j.id_mhs', 'm.id_mahasiswa', 'm.nama','m.nim','m.Angkatan','m.semester','m.tahun','j.tahap','j.deleted_at')
        ->join('tb_mhs as m','m.id_mahasiswa', '=', 'j.id_mhs')
        ->where('j.deleted_at','=', NULL)
        ->where('j.tahap','=',8)
        ->get();
        $dosen = Dosen::all();
        return view('halaman_admin/nilai/datanilai', [
            'dosen' => $dosen,
            'jadwal' => $jadwal
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
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->tahap = '3';
        $mahasiswa->save();
        return redirect('/halaman_admin/kfrm/konfirmasi')->with('success', 'Data Berhasil di Proses');
    }

    public function updated(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->alasan = $request->alasan;
        $mahasiswa->tahap = '2';
        $mahasiswa->save();
        return redirect('/halaman_admin/kfrm/konfirmasi')->with('success', 'Data Berhasil di Proses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->tahap = NULL;
        $mahasiswa->save();
        return redirect('/halaman_admin/kfrm/konfirmasi')->with('delete', 'Data Berhasil di Hapus');
    }
}