<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\user;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data_admin()
    {
        //$tes = phpinfo();
        $admin = Admin::all();
        return view('halaman_admin/adm/data_admin', [
            'admin' => $admin
            //'tes' => $tes
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
            'nip' => 'required|unique:tb_adm',
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
            return redirect('/halaman_admin/adm/data_admin')
                ->withErrors($validator)
                ->withInput($request->input());
        }
        //insert ke table user
        $user = new User;
        $user->name = $request->nama;
        $user->username = $request->nip;
        $user->password = Hash::make($request->nip);
        $user->level = 'Admin';
        $user->save();
        //insert ke table admin
        $request->request->Add(['user_id' => $user->id]);
        $admin = Admin::create($request->all());

        return redirect('/halaman_admin/adm/data_admin')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$admin)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => [
                'required',
                Rule::unique('tb_adm')->ignore($admin, 'id_admin'),
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
            session(['edit' => $admin]);
            return redirect('/halaman_admin/adm/data_admin')
                ->withErrors($validator)
                ->withInput($request->input());
        }
        $admin = Admin::find($admin);
        $admin->nama = $request->nama;
        $admin->nip = $request->nip;
        $admin->email = $request->email;
        $admin->jenis_kelamin = $request->jenis_kelamin;
        $admin->alamat = $request->alamat;
        $admin->save();
        $user = $admin->user;
        $user->name = $request->nama;
        $user->username = $request->nip;
        $user->save();
        return redirect('/halaman_admin/adm/data_admin')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $user = $admin->user;
        $user->delete();
        return redirect('/halaman_admin/adm/data_admin')->with('delete', 'Data Berhasil di Hapus');
    }
}   