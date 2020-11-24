<?php

namespace App\Http\Controllers;

use Carbon;
use Illuminate\Support\Facades\Validator;
use App\Dosen;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data_dosen()
    {
        $dosen = dosen::all();
        return view('halaman_admin/dsn/data_dosen', [
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => 'required|unique:tb_dsn',
            'status' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'alamat' => 'required'
        ],[
            'nama.required' => 'Silahkan isi Form Nama Tersebut',
            'nip.required' => 'Silahkan isi Form Nip Tersebut',
            'nip.unique' => 'Data Nip ini sudah ada',
            'status.required' => 'Silahkan pilih Status dosen Tersebut',
            'jenis_kelamin.required' => 'Silahkan pilih Jenis Kelamin Tersebut',
            'email.required' => 'Silahkan isi Form Email Tersebut',
            'alamat.required' => 'Silahkan isi Form Alamat Tersebut'
        ]);
        if ($validator->fails()) {
            session(['tambah' => 'value']);
            return redirect('/halaman_admin/dsn/data_dosen')
                ->withErrors($validator)
                ->withInput($request->input());
        }
        //insert ke table user
        $user = new User;
        $user->name = $request->nama;
        $user->username = $request->nip;
        $user->password = Hash::make($request->nip);
        $user->level = 'Dosen';
        $user->save();
        //insert ke table mahasiswa
        $request->request->Add(['user_id' => $user->id]);
        Dosen::create($request->all());
        return redirect('/halaman_admin/dsn/data_dosen')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dosen)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => [
                'required',
                Rule::unique('tb_dsn')->ignore($dosen, 'id_dosen'),
            ],
            'status' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'alamat' => 'required'
        ],[
            'nama.required' => 'Silahkan isi Form Nama Tersebut',
            'nip.required' => 'Silahkan isi Form Nip Tersebut',
            'nip.unique' => 'Data Nip ini sudah ada',
            'status.required' => 'Silahkan pilih Status dosen Tersebut',
            'jenis_kelamin.required' => 'Silahkan pilih Jenis Kelamin Tersebut',
            'email.required' => 'Silahkan isi Form Email Tersebut',
            'alamat.required' => 'Silahkan isi Form Alamat Tersebut'
        ]);
        if ($validator->fails()) {
            session(['edit' => $dosen]);
            return redirect('/halaman_admin/dsn/data_dosen')
                ->withErrors($validator)
                ->withInput($request->input())
                ;
        }
        $dosen = Dosen::find($dosen);
        $dosen->nama = $request->nama;
        $dosen->nip = $request->nip;
        $dosen->email = $request->email;
        $dosen->status = $request->status;
        $dosen->jenis_kelamin = $request->jenis_kelamin;
        $dosen->alamat = $request->alamat;
        $dosen->save();
        return redirect('/halaman_admin/dsn/data_dosen')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::find($id);
        $user = $dosen->user;
        $user->delete();
        return redirect('/halaman_admin/dsn/data_dosen')->with('delete', 'Data Berhasil di Hapus');
    }
}
