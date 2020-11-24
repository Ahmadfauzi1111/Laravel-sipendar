<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Dosen;
use App\Mahasiswa;
use App\jadwal;
use App\Nilai;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = \DB::table('tb_jadwal AS j')->select('j.id_mhs','j.id_jadwal','m.id_mahasiswa','m.nama','m.nim','j.shiftmulai','shiftselesai','j.ruang','j.tanggal','j.tahap','j.deleted_at')
        ->join('tb_mhs AS m', 'm.id_mahasiswa', '=', 'j.id_mhs')
        ->where('j.deleted_at', '=', NULL)
        ->where(function($q){
            $q->where('j.id_dsn1', Auth::user()->dosen->id_dosen)
            ->orWhere('j.id_dsn2', Auth::user()->dosen->id_dosen)
            ->orWhere('j.id_dsn3', Auth::user()->dosen->id_dosen)
            ->orWhere('j.id_dsn4', Auth::user()->dosen->id_dosen);
        })->get();  
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::find(Auth::User()->dosen->id_dosen);
        return view('halaman_dosen/nilai', [
            'mahasiswa' => $mahasiswa,
            'jadwal' => $jadwal,
            'dosen' => $dosen
        ] );
    }

    public function index1($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $id_dosen = Auth::user()->dosen->id_dosen;
        $nilai = Nilai::where('id_dsn', $id_dosen)
                    ->where('id_mhs', $mahasiswa->id_mahasiswa)
                    ->first();
        return view('halaman_dosen/Datanilai', [
            'mahasiswa' => $mahasiswa,
            'nilai' => $nilai
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
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nilai1' => 'required|integer|max:100|min:0',
            'nilai2' => 'required|integer|max:100|min:0',
            'nilai3' => 'required|integer|max:100|min:0',
            'nilai4' => 'required|integer|max:100|min:0'
        ],[
            'nilai1.required' => 'Silahkan isi Nilai Tersebut',
            'nilai1.integer' => 'Silahkan isi Angka',
            'nilai1.max' => 'Silahkan isi Nilai maximal 100',
            'nilai1.min' => 'Silahkan isi Nilai minimal 1',
            'nilai2.required' => 'Silahkan isi Nilai Tersebut',
            'nilai2.integer' => 'Silahkan isi Angka',
            'nilai2.max' => 'Silahkan isi Nilai minimal 1 dan maximal 100',
            'nilai2.min' => 'Silahkan isi Nilai minimal 1',
            'nilai3.required' => 'Silahkan isi Nilai Tersebut',
            'nilai3.integer' => 'Silahkan isi Angka',
            'nilai3.max' => 'Silahkan isi Nilai minimal 1 dan maximal 100',
            'nilai3.min' => 'Silahkan isi Nilai minimal 1',
            'nilai4.required' => 'Silahkan isi Nilai Tersebut',
            'nilai4.integer' => 'Silahkan isi Angka',
            'nilai4.max' => 'Silahkan isi Nilai minimal 1 dan maximal 100',
            'nilai4.min' => 'Silahkan isi Nilai minimal 1'
            
        ]);
        if ($validator->fails()) {
            session(['tambah' => 'value']);
            return redirect('halaman_dosen/Datanilai/'.$id)
                ->withErrors($validator)
                ->withInput($request->input());
        }
        $pepek = \DB::table('tb_jadwal')->where('id_mhs', '=', $id)->where('deleted_at','=', NULL)->groupBy('id_jadwal')->first();
        $nilai = new Nilai;
        $nilai->id_mhs = Mahasiswa::find($id)->id_mahasiswa;
        $nilai->id_dsn = Dosen::find(Auth::User()->dosen->id_dosen)->id_dosen;
        $nilai->nilai1 = $request->nilai1;
        $nilai->nilai2 = $request->nilai2;
        $nilai->nilai3 = $request->nilai3;
        $nilai->nilai4 = $request->nilai4;
        $nilai->jadwal_id = $pepek->id_jadwal;
        $nilai->save();
        
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->tahap = '6';
        $mahasiswa->save();

        $jadwal = \DB::table('tb_jadwal')->where('id_mhs', '=', $id)->where('deleted_at','=', NULL)
        ->update([
			'tahap' => '6'
		]);

         return redirect('halaman_dosen/Datanilai/'.$id)->with('success', 'Data Berhasil di Tambahkan');;
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
        $validator = Validator::make($request->all(), [
            'nilai1' => 'required|integer|max:100|min:0',
            'nilai2' => 'required|integer|max:100|min:0',
            'nilai3' => 'required|integer|max:100|min:0',
            'nilai4' => 'required|integer|max:100|min:0'
        ],[
            'nilai1.required' => 'Silahkan isi Nilai Tersebut',
            'nilai1.integer' => 'Silahkan isi Angka',
            'nilai1.max' => 'Silahkan isi Nilai maximal 100',
            'nilai1.min' => 'Silahkan isi Nilai minimal 1',
            'nilai2.required' => 'Silahkan isi Nilai Tersebut',
            'nilai2.integer' => 'Silahkan isi Angka',
            'nilai2.max' => 'Silahkan isi Nilai minimal 1 dan maximal 100',
            'nilai2.min' => 'Silahkan isi Nilai minimal 1',
            'nilai3.required' => 'Silahkan isi Nilai Tersebut',
            'nilai3.integer' => 'Silahkan isi Angka',
            'nilai3.max' => 'Silahkan isi Nilai minimal 1 dan maximal 100',
            'nilai3.min' => 'Silahkan isi Nilai minimal 1',
            'nilai4.required' => 'Silahkan isi Nilai Tersebut',
            'nilai4.integer' => 'Silahkan isi Angka',
            'nilai4.max' => 'Silahkan isi Nilai minimal 1 dan maximal 100',
            'nilai4.min' => 'Silahkan isi Nilai minimal 1'
        ]);
        if ($validator->fails()) {
            $yeay = nilai::Find($id);
            session(['edit' => 'value']);
            return redirect('halaman_dosen/Datanilai/'.$yeay->id_mhs)
                ->withErrors($validator)
                ->withInput($request->input());
        }
        
        $nilai = nilai::find($id);
        $nilai->nilai1 = $request->nilai1;
        $nilai->nilai2 = $request->nilai2;
        $nilai->nilai3 = $request->nilai3;
        $nilai->nilai4 = $request->nilai4;
        $nilai->save();
        return redirect('halaman_dosen/Datanilai/'.$nilai->id_mhs)->with('success', 'Data Berhasil di Edit');
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
