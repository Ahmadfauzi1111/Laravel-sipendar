<?php

namespace App\Http\Controllers;

use Carbon;
use App\Dosen;
use App\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::User()->mahasiswa->id_mahasiswa);
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::find(Auth::User()->mahasiswa->id_mahasiswa);
        return view('halaman_mahasiswa/registrasi', [
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
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $this->validate($request, [
            'judulta' => 'required',
            'pembimbing1' => [
                'required',
                function ($attribute, $value, $fail1) use ($request) {
                    if ($request->pembimbing1 == $request->pembimbing2) {
                        $fail1('Dosen yang diinputkan sama');
                    }
                },
            ],
            'pembimbing2' => [
                'required',
                function ($attribute, $value, $fail1) use ($request) {
                    if ($request->pembimbing2 == $request->pembimbing1) {
                        $fail1('Dosen yang diinputkan sama');
                    }
                },
            ],
            'pembimbingakademik' => 'required',
            'semester' => 'required',
            'tahun' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email',
            'alamat' => 'required'
        ],[
            'judulta.required' => 'Silahkan isi Form JudulTa Tersebut',
            'pembimbing1.required' => 'Silahkan pilih siapa Pembimbing 1 Anda',
            'pembimbing2.required' => 'Silahkan pilih siapa Pembimbing 2 Anda',
            'pembimbingakademik.required' => 'Silahkan pilih siapa Pembimbing Akademik Anda',
            'semester.required' => 'Silahkan pilih Semester sekarang Anda',
            'tahun.required' => 'Silahkan pilih tahun sekarang Anda',
            'tanggal_lahir.required' => 'Silahkan isi Form Tanggal Lahir Tersebut',
            'jenis_kelamin.required' => 'Silahkan pilih Jenis Kelamin Tersebut',
            'email.required' => 'Silahkan isi Form Email Tersebut',
            'email.email' => 'Harap Sertakan @email.com kamu diform email Tersebut',
            'alamat.required' => 'Silahkan isi Form Alamat Tersebut'
        ]);
        // dd($id, $request);
        $mahasiswa = Mahasiswa::find($id);

        $mahasiswa->judulta = $request->judulta;
        $mahasiswa->pembimbing1 = $request->pembimbing1;
        $mahasiswa->pembimbing2 = $request->pembimbing2;
        $mahasiswa->pembimbingakademik = $request->pembimbingakademik;
        $mahasiswa->semester = $request->semester;
        $mahasiswa->tahun = $request->tahun;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->email = $request->email;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();

        // dd($student);

        return redirect('/halaman_mahasiswa/registrasi')->with('success', 'Data Berhasil di Proses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
