<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class daftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::find(Auth::User()->mahasiswa->id_mahasiswa);
        return view('halaman_mahasiswa/pendaftaran', [
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
        // Ini adalah Validasi Data file yang dikirim lewat form
        $this->validate($request, [
            'file1' => 'required',
            'file2' => 'required'
        ]);
        // Ambil File yang diupload lewat form, lalu disimpan divariabel $file
        $file = $request->file('file1');
        $file1 = $request->file('file2');
        // Menggabungkan time() (waktu saat ini) dengan $file->getClientOriginalName()
        $nama_file = time()."_".$file->getClientOriginalName();
        $nama_file1 = time()."_".$file1->getClientOriginalName();
        // Menginisialisasi nama folder, sebagai tempat penyimpanan
        $tujuan_upload = 'data_file';
        // Memindahkan isi dari $file dan $tujuan_upload
        $file->move($tujuan_upload,$nama_file);
        $file1->move($tujuan_upload,$nama_file1);
        // Bagian Update
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->file1 = $nama_file;
        $mahasiswa->file2 = $nama_file1;
        $mahasiswa->tahap = '1';
        $mahasiswa->save();
        
        // dd($mahasiswa);
        return redirect('/halaman_mahasiswa/pendaftaran')->with('success', 'Data Berhasil di Proses');
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
