<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Support\Facades\Validator;
use App\Komisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class KomisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data_komisi()
    {
        $komisi = komisi::all();
        return view('halaman_admin/kms/data_komisi', compact('komisi') );
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
            'nip' => 'required|unique:tb_kms',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ],[
            'nama.required' => 'Silahkan isi Form Nama Tersebut',
            'nip.required' => 'Silahkan isi Form Nip Tersebut',
            'nip.unique' => 'Data Nip ini sudah ada',
            'email.required' => 'Silahkan isi Form Email Tersebut',
            'jenis_kelamin.required' => 'Silahkan pilih Jenis Kelamin Tersebut',
            'alamat.required' => 'Silahkan isi Form Alamat Tersebut'
        ]);
        if ($validator->fails()) {
            session(['tambah' => 'value']);
            return redirect('/halaman_admin/kms/data_komisi')
                ->withErrors($validator)
                ->withInput($request->input());
        }
       //insert ke table user
       $user = new User;
       $user->name = $request->nama;
       $user->username = $request->nip;
       $user->password = Hash::make($request->nip);
       $user->level = 'Komisi';
       $user->save();
       //insert ke table mahasiswa
       $request->request->Add(['user_id' => $user->id]);
       Komisi::create($request->all());
       // dd($request);
       return redirect('/halaman_admin/kms/data_komisi')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Komisi  $komisi
     * @return \Illuminate\Http\Response
     */
    public function show(Komisi $komisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Komisi  $komisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Komisi $komisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Komisi  $komisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $komisi)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => [
                'required',
                Rule::unique('tb_kms')->ignore($komisi, 'id_komisi'),
            ],
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ],[
            'nama.required' => 'Silahkan isi Form Nama Tersebut',
            'nip.required' => 'Silahkan isi Form Nip Tersebut',
            'nip.unique' => 'Data Nip ini sudah ada',
            'email.required' => 'Silahkan isi Form Email Tersebut',
            'jenis_kelamin.required' => 'Silahkan pilih Jenis Kelamin Tersebut',
            'alamat.required' => 'Silahkan isi Form Alamat Tersebut'
        ]);
        if ($validator->fails()) {
            session(['edit' => $komisi]);
            return redirect('/halaman_admin/kms/data_komisi')
                ->withErrors($validator)
                ->withInput($request->input());
        }
        $komisi = Komisi::find($komisi);
        $komisi->nama = $request->nama;
        $komisi->nip = $request->nip;
        $komisi->email = $request->email;
        $komisi->jenis_kelamin = $request->jenis_kelamin;
        $komisi->alamat = $request->alamat;
        $komisi->save();
        return redirect('/halaman_admin/kms/data_komisi')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Komisi  $komisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $komisi = Komisi::find($id);
        $user = $komisi->user;
        $user->delete();
        return redirect('/halaman_admin/kms/data_komisi')->with('delete', 'Data Berhasil di Hapus');
    }
}
