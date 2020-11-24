<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Dosen;
use Illuminate\Support\Facades\Hash;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = mahasiswa::all();
        $dosen = Dosen::all();
        return view('halaman_komisi/pengajuan', [
            'dosen' => $dosen,
            'mahasiswa' => $mahasiswa
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
        return redirect('/halaman_komisi/pengajuan')->with('success', 'Data Berhasil di Proses');
    }

    public function updated(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->alasan = $request->alasan;
        $mahasiswa->tahap = '2';
        $mahasiswa->save();
        return redirect('/halaman_komisi/pengajuan')->with('success', 'Data Berhasil di Proses');
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
