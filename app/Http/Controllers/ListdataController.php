<?php

namespace App\Http\Controllers;

use App\jadwal;
use App\Komisi;
use App\Dosen;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        $jadwal = Jadwal::all();
        $komisi = Komisi::find(Auth::User()->komisi->id_komisi);
        return view('halaman_komisi/list', [
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'jadwal' => $jadwal,
            'komisi' => $komisi
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
        $this->validate($request, [
            'id_mhs' => 'required',
            'shift' => 'required',
            'ruangan' => 'required',
            'tanggal' => 'required'
        ]);
        $jadwal = new jadwal;
        $jadwal->id_mhs = $request->id_mhs;
        $jadwal->shift = $request->shift;
        $jadwal->ruang = $request->ruangan;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->save();
        $mahasiswa = Mahasiswa::find($request->id_mhs);
        $mahasiswa->tahap = '4';
        $mahasiswa->save();
         return redirect('/halaman_komisi/list')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Listdata  $listdata
     * @return \Illuminate\Http\Response
     */
    public function show(Listdata $listdata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listdata  $listdata
     * @return \Illuminate\Http\Response
     */
    public function edit(Listdata $listdata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listdata  $listdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_dsn1' => 'required',
            'id_dsn2' => 'required',
            'id_dsn3' => 'required',
            'id_dsn4' => 'required'
        ],[
            'id_dsn1.required' => 'Silahkan pilih Dosen penguji',
            'id_dsn2.required' => 'Silahkan pilih Dosen penguji',
            'id_dsn3.required' => 'Silahkan pilih Dosen penguji',
            'id_dsn4.required' => 'Silahkan pilih Dosen penguji'
        ]);
        $jadwal = Jadwal::find($id);
        $jadwal->id_dsn1 = $request->id_dsn1;
        $jadwal->id_dsn2 = $request->id_dsn2;
        $jadwal->id_dsn3 = $request->id_dsn3;
        $jadwal->id_dsn4 = $request->id_dsn4;
        $jadwal->save();
        $mahasiswa = Jadwal::find($id)->mahasiswa;
        $mahasiswa->tahap = '5';
        $mahasiswa->save();
        return redirect('/halaman_komisi/list')->with('success', 'Data Berhasil di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listdata  $listdata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Jadwal::find($id)->mahasiswa;
        $mahasiswa->tahap = '3';
        $mahasiswa->save();
        $jadwal = Jadwal::find($id);
        $jadwal->delete();

        return redirect('/halaman_komisi/list')->with('delete', 'Data Berhasil di Hapus');
    }
}
