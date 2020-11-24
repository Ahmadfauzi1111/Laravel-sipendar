<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\user;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data_mahasiswa()
    {
        $mahasiswa = mahasiswa::all();
        return view('halaman_admin/mhs/data_mahasiswa', compact('mahasiswa') );
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nim' => 'required|unique:tb_mhs',
            'Angkatan' => 'required'
        ],[
            'nama.required' => 'Silahkan isi Form Nama Tersebut',
            'nim.required' => 'Silahkan isi Form Nim Tersebut',
            'nim.unique' => 'Data Nim ini sudah ada',
            'Angkatan.required' => 'Silahkan isi Form Angkatan Tersebut'
        ]);
        if ($validator->fails()) {
            session(['tambah' => 'value']);
            return redirect('/halaman_admin/mhs/data_mahasiswa')
                ->withErrors($validator)
                ->withInput($request->input());
        }
        //insert ke table user
        $user = new User;
        $user->name = $request->nama;
        $user->username = $request->nim;
        $user->password = Hash::make($request->nim);
        $user->level = 'Mahasiswa';
        $user->save();
        //insert ke table mahasiswa
        $request->request->Add(['user_id' => $user->id]);
        Mahasiswa::create($request->all());
        // dd($request);
        return redirect('/halaman_admin/mhs/data_mahasiswa')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mahasiswa)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nim' => [
                'required',
                Rule::unique('tb_mhs')->ignore($mahasiswa, 'id_mahasiswa'),
            ],
            'Angkatan' => 'required'
        ],[
            'nama.required' => 'Silahkan isi Form Nama Tersebut',
            'nim.required' => 'Silahkan isi Form Nim Tersebut',
            'nim.unique' => 'Data Nim ini sudah ada',
            'Angkatan.required' => 'Silahkan isi Form Angkatan Tersebut'
        ]);
        if ($validator->fails()) {
            session(['edit' => $mahasiswa]);
            return redirect('/halaman_admin/mhs/data_mahasiswa')
                ->withErrors($validator)
                ->withInput($request->input());
        }
        $mahasiswa = Mahasiswa::find($mahasiswa);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->Angkatan = $request->Angkatan;
        $mahasiswa->save();
        return redirect('/halaman_admin/mhs/data_mahasiswa')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $user = $mahasiswa->user;
        $user->delete();
        return redirect('/halaman_admin/mhs/data_mahasiswa')->with('delete', 'Data Berhasil di Hapus');
    }
}
