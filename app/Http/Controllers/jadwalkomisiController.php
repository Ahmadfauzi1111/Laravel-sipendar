<?php

namespace App\Http\Controllers;

use App\Admin;
use App\jadwal;
use App\Komisi;
use App\Dosen;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDF;
use App\Exports\MahasiswaExport;
use Carbon\Carbon;

class jadwalkomisiController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        $jadwal = Jadwal::all();
        // $mhs = Mahasiswa::first();
        // $mhsA = $mhs->id_mahasiswa;
        // $hasiljadwal = Jadwal::where('id_mhs','=',$mhsA);
        // $hasiljadwal = \DB::table('tb_jadwal AS j')->select('j.id_mhs','j.id_jadwal','m.id_mahasiswa','m.nama','m.nim','j.shiftmulai',
        // 'shiftselesai','j.ruang','j.tanggal','j.tahap','j.deleted_at','j.id_dsn1','j.id_dsn2','j.id_dsn3','j.id_dsn4')
        //             ->join('tb_mhs AS m', 'j.id_mhs', '=', 'm.id_mahasiswa')
        //             ->where('j.id_mhs','=',$mhsA)
        //             ->where('j.deleted_at','!=',NULL)
        //             ->groupBy('j.id_mhs')
        //             ->orderBy('j.id_jadwal','asc')->limit(1)
        //             ->get();
                    // dd($hasiljadwal);
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $komisi = Komisi::find(Auth::User()->komisi->id_komisi);
        return view('halaman_komisi/jadwalkomisi', [
            'mahasiswa' => $mahasiswa,
            // 'hasiljadwal' => $hasiljadwal,
            'dosen' => $dosen,
            'jadwal' => $jadwal,
            'komisi' => $komisi
        ] );
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_mhs' => 'required',
            'timepicker' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    // Validasi Jadwal Tabrakan
                    // dd($request->all());
                    if(isset($request->timepicker1) && isset($request->timepicker)){
                    $jadwalAda = Jadwal::where('ruang', $request->ruangan)
                                    ->whereDate('tanggal' , $request->tanggal)
                                    ->where(function($query) use ($request) {
                                        return $query->whereTime('shiftmulai', '<',$request->timepicker1)
                                                ->whereTime('shiftselesai', '>',$request->timepicker);
                                    })
                                    ->first();
                    } else {
                        $jadwalAda = true;
                    }
                    if ($jadwalAda) {
                        $fail('Jam Mulai Tabrakan');
                    }
                },
            ],
            'timepicker1' =>  [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    // Validasi Jadwal Tabrakan
                    // dd($request->all());
                    if(isset($request->timepicker1) && isset($request->timepicker)){
                    $jadwalAda = Jadwal::where('ruang', $request->ruangan)
                                    ->whereDate('tanggal' , $request->tanggal)
                                    ->where(function($query) use ($request) {
                                        return $query->whereTime('shiftmulai', '<',$request->timepicker1)
                                                ->whereTime('shiftselesai', '>',$request->timepicker);
                                    })
                                    ->first();
                    } else {
                        $jadwalAda = true;
                    }
                    if ($jadwalAda) {
                        $fail('Jam Selesai Tabrakan');
                    }
                },
            ],
            'ruangan' => 'required',
            'tanggal' => 'required'
        ],[
            'id_mhs.required' => 'Silahkan isi Form Nama Tersebut',
            'timepicker.required' => 'Silahkan pilih jam pendadaran Tersebut',
            'timepicker.tabrakan' => 'Jadwal Tabrakan',
            'timepicker1.required' => 'Silahkan pilih jam pendadaran Tersebut',
            'timepicker1.tabrakan' => 'Jadwal Tabrakan',
            'ruangan.required' => 'Silahkan pilih ruangan Tersebut',
            'tanggal.required' => 'Silahkan pilih tanggal Tersebut'
            ]);
        if ($validator->fails()) {
            session(['tambah' => 'value']);
            if(isset($request->timepicker1) && isset($request->timepicker)){
                $jadwalAda = Jadwal::where('ruang', $request->ruangan)
                ->whereDate('tanggal' , $request->tanggal)
                ->where(function($query) use ($request) {
                    return $query->whereTime('shiftmulai', '<',($request->timepicker1 ?? null))
                    ->whereTime('shiftselesai', '>',($request->timepicker ?? null));
                })
                ->first();
            }else {
                $jadwalAda = false;
            }
            if ($jadwalAda) {
                return redirect('/halaman_komisi/jadwalkomisi')
                    ->withErrors($validator)
                    ->withInput($request->input())
                    ->with('error', 'Jadwal Tabrakan');
            }else {
                return redirect('/halaman_komisi/jadwalkomisi')
                    ->withErrors($validator)
                    ->withInput($request->input());
            }
        }
        $jadwal = new jadwal;
        $jadwal->id_mhs = $request->id_mhs;
        $jadwal->shiftmulai = $request->timepicker;
        $jadwal->shiftselesai = $request->timepicker1;
        $jadwal->ruang = $request->ruangan;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->save();

        $mahasiswa = Mahasiswa::find($request->id_mhs);
        $mahasiswa->tahap = '4';
        $mahasiswa->save();
         return redirect('/halaman_komisi/jadwalkomisi')->with('success', 'Data Berhasil di Tambahkan');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_dsn1' =>  [
                'required',
                function ($attribute, $value, $fail1) use ($request) {
                    if ($request->id_dsn1 == $request->id_dsn2 || $request->id_dsn1 == $request->id_dsn3 || $request->id_dsn1 == $request->id_dsn4 ) {
                        $fail1('Dosen yang diinputkan sama');
                    }
                },
            ],
            'id_dsn2' =>  [
                'required',
                function ($attribute, $value, $fail2) use ($request) {
                    if ($request->id_dsn2 == $request->id_dsn1 || $request->id_dsn2 == $request->id_dsn3 || $request->id_dsn2 == $request->id_dsn4) {
                        $fail2('Dosen yang diinputkan sama');
                    }
                },
            ],
            'id_dsn3' =>  [
                'required',
                function ($attribute, $value, $fail3) use ($request) {
                    if ($request->id_dsn3 == $request->id_dsn1 || $request->id_dsn3 == $request->id_dsn2 || $request->id_dsn3 == $request->id_dsn4 ) {
                        $fail3('Dosen yang diinputkan sama');
                    }
                },
            ],
            'id_dsn4' =>  [
                'required',
                function ($attribute, $value, $fail3) use ($request) {
                    if ($request->id_dsn4 == $request->id_dsn1 || $request->id_dsn4 == $request->id_dsn2 || $request->id_dsn4 == $request->id_dsn3 ) {
                        $fail3('Dosen yang diinputkan sama');
                    }
                },
            ],
        ],[
            'id_dsn1.required' => 'Silahkan pilih Dosen penguji',
            'id_dsn2.required' => 'Silahkan pilih Dosen penguji',
            'id_dsn3.required' => 'Silahkan pilih Dosen penguji',
            'id_dsn4.required' => 'Silahkan pilih Dosen penguji'
        ]);
        if ($validator->fails()) {
            session(['edit' => $id]);
            return redirect('/halaman_komisi/jadwalkomisi')
                ->withErrors($validator)
                ->withInput($request->input());
        }
        $jadwal = Jadwal::find($id);
        $jadwal->id_dsn1 = $request->id_dsn1;
        $jadwal->id_dsn2 = $request->id_dsn2;
        $jadwal->id_dsn3 = $request->id_dsn3;
        $jadwal->id_dsn4 = $request->id_dsn4;
        $jadwal->tahap ='5';
        $jadwal->save();

        $admin = Admin::all();
        $emailAdm = $admin->pluck('email')->toArray();
        $komisi = Komisi::all();
        $emailkms = $komisi->pluck('email')->toArray();
        $emails = [$jadwal->dosen1->email,$jadwal->dosen2->email,$jadwal->dosen3->email,$jadwal->dosen4->email,$jadwal->mahasiswa->email];
        $emails = array_merge($emails, $emailAdm);

        \Mail::send('emails.jadwal-komisi', ['jadwal' => $jadwal, 'emailkms' => $emailkms], function ($message) use ($emails, $emailkms) {
            $message->from($emailkms, 'Komisi Pendadaran');
            // $message->sender($emailkms, 'Komisi Pendadaran');
            $message->to($emails);
            $message->subject('Komisi sudah membuat jadwal');
        });

        $mahasiswa = Jadwal::find($id)->mahasiswa;
        $mahasiswa->tahap = '5';
        $mahasiswa->save();

        return redirect('/halaman_komisi/jadwalkomisi')->with('success', 'Data Berhasil di Perbarui');
    }
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'timepicker2' => [
                'required',
                function ($attribute, $value, $fail) use ($request, $id) {
                    // Validasi Jadwal Tabrakan
                    // dd($request->all());
                    if(isset($request->timepicker3) && isset($request->timepicker2)){
                    $jadwalAda = Jadwal::where('ruang', $request->ruangan)
                                    ->whereDate('tanggal' , $request->tanggal)
                                    ->where('id_jadwal','!=', $id)
                                    ->where(function($query) use ($request) {
                                        return $query->whereTime('shiftmulai', '<',$request->timepicker3)
                                                ->whereTime('shiftselesai', '>',$request->timepicker2);
                                    })
                                    ->first();
                    } else {
                        $jadwalAda = true;
                    }
                    if ($jadwalAda) {
                        $fail('Jam Mulai Tabrakan');
                    }
                },
            ],
            'timepicker3' =>  [
                'required',
                function ($attribute, $value, $fail) use ($request, $id) {
                    // Validasi Jadwal Tabrakan
                    // dd($request->all());
                    if(isset($request->timepicker3) && isset($request->timepicker2)){
                    $jadwalAda = Jadwal::where('ruang', $request->ruangan)
                                    ->whereDate('tanggal' , $request->tanggal)
                                    ->where('id_jadwal','!=', $id)
                                    ->where(function($query) use ($request) {
                                        return $query->whereTime('shiftmulai', '<',$request->timepicker3)
                                                ->whereTime('shiftselesai', '>',$request->timepicker2);
                                    })
                                    ->first();
                    } else {
                        $jadwalAda = true;
                    }
                    if ($jadwalAda) {
                        $fail('Jam Selesai Tabrakan');
                    }
                },
            ],
            'ruangan' => 'required',
            'tanggal' => 'required',
            'id_dsn1' => [
                'required',
                function ($attribute, $value, $fail1) use ($request) {
                    if ($request->id_dsn1 == $request->id_dsn2 || $request->id_dsn1 == $request->id_dsn3 || $request->id_dsn1 == $request->id_dsn4 ) {
                        $fail1('Dosen yang diinputkan sama');
                    }
                },
            ],
            'id_dsn2' => [
                'required',
                function ($attribute, $value, $fail2) use ($request) {
                    if ($request->id_dsn2 == $request->id_dsn1 || $request->id_dsn2 == $request->id_dsn3 || $request->id_dsn2 == $request->id_dsn4) {
                        $fail2('Dosen yang diinputkan sama');
                    }
                },
            ],
            'id_dsn3' => [
                'required',
                function ($attribute, $value, $fail3) use ($request) {
                    if ($request->id_dsn3 == $request->id_dsn1 || $request->id_dsn3 == $request->id_dsn2 || $request->id_dsn3 == $request->id_dsn4 ) {
                        $fail3('Dosen yang diinputkan sama');
                    }
                },
            ],
            'id_dsn4' => [
                'required',
                function ($attribute, $value, $fail3) use ($request) {
                    if ($request->id_dsn4 == $request->id_dsn1 || $request->id_dsn4 == $request->id_dsn2 || $request->id_dsn4 == $request->id_dsn3 ) {
                        $fail3('Dosen yang diinputkan sama');
                    }
                },
            ],
        ],[
            
            'timepicker2.required' => 'Silahkan pilih jam pendadaran Tersebut',
            'timepicker3.required' => 'Silahkan pilih jam pendadaran Tersebut',
            'ruangan.required' => 'Silahkan pilih ruangan Tersebut',
            'tanggal.required' => 'Silahkan pilih tanggal Tersebut',
            'id_dsn1.required' => 'Silahkan pilih Dosen penguji',
            'id_dsn2.required' => 'Silahkan pilih Dosen penguji',
            'id_dsn3.required' => 'Silahkan pilih Dosen penguji',
            'id_dsn4.required' => 'Silahkan pilih Dosen penguji'
        ]);
        if ($validator->fails()) {
            session(['ubah' => $id]);
            if(isset($request->timepicker3) && isset($request->timepicker2)){
                $jadwalAda = Jadwal::where('ruang', $request->ruangan)
                ->whereDate('tanggal' , $request->tanggal)
                ->where('id_jadwal','!=', $id)
                ->where(function($query) use ($request) {
                    return $query->whereTime('shiftmulai', '<',($request->timepicker3 ?? null))
                    ->whereTime('shiftselesai', '>',($request->timepicker2 ?? null));
                })
                ->first();
            }else {
                $jadwalAda = false;
            }
            if ($jadwalAda) {
                return redirect('/halaman_komisi/jadwalkomisi')
                    ->withErrors($validator)
                    ->withInput($request->input())
                    ->with('error', 'Jadwal Tabrakan');
            }else {
                return redirect('/halaman_komisi/jadwalkomisi')
                    ->withErrors($validator)
                    ->withInput($request->input());
            }
        }
        $jadwal = Jadwal::find($id);
        $jadwal->shiftmulai = $request->timepicker2;
        $jadwal->shiftselesai = $request->timepicker3;
        $jadwal->ruang = $request->ruangan;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->id_dsn1 = $request->id_dsn1;
        $jadwal->id_dsn2 = $request->id_dsn2;
        $jadwal->id_dsn3 = $request->id_dsn3;
        $jadwal->id_dsn4 = $request->id_dsn4;
        $jadwal->save();

        $admin = Admin::all();
        $emailAdm = $admin->pluck('email')->toArray();
        $komisi = Komisi::all();
        $emailkms = $komisi->pluck('email')->toArray();
        $emails = [$jadwal->dosen1->email,$jadwal->dosen2->email,$jadwal->dosen3->email,$jadwal->dosen4->email,$jadwal->mahasiswa->email];
        $emails = array_merge($emails, $emailAdm);

        \Mail::send('emails.jadwal-komisi', ['jadwal' => $jadwal, 'emailkms' => $emailkms], function ($message) use ($emails, $emailkms) {
            $message->from($emailkms, 'Komisi Pendadaran');
            // $message->sender('ahmadfauziridwan20@gmail.com', 'Komisi Pendadaran');
            $message->to($emails);
            $message->subject('Komisi memperbarui jadwal');
        });
        return redirect('/halaman_komisi/jadwalkomisi')->with('success', 'Data Berhasil di Perbarui');
    }
    public function destroy($id)
    {
        $mahasiswa = Jadwal::find($id)->mahasiswa;
        $mahasiswa->tahap = '3';
        $mahasiswa->save();
        $jadwal = Jadwal::find($id);
        $jadwal->forceDelete();

        return redirect('/halaman_komisi/jadwalkomisi')->with('delete', 'Data Berhasil di Hapus');
    }

    public function cobaEmail(Request $request)
    {
        \Mail::raw('Selamat Datang di Sistem Informasi Pendadaran', function ($message) {
            // $message->from('ahmadfauziridwan20@gmail.com', 'Komisi Pendadaran');
            // $message->sender('ahmadfauziridwan20@gmail.com', 'Komisi Pendadaran');
            $message->to(['ahmadfauziridlwan20@gmail.com','axladilla@gmail.com']);
            $message->subject('Komisi sudah membuat jadwal');
        });

        return "OK";
    }
    public function print(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nosurat' => 'required'
        ],[
            'nosurat.required' => 'Silahkan isi No Surat'
        ]);
        if ($validator->fails()) {
            session(['pdf' => $id]);
            return redirect('/halaman_komisi/jadwalkomisi')
                ->withErrors($validator)
                ->withInput($request->input());
        }
        
        $dosen = \DB::table('tb_dsn AS d')->select('d.id_dosen')
        ->where('status', '=', 'Ketua Jurusan')
        ->first();
        $mahasiswa = mahasiswa::find($id);
        $jadwal = $mahasiswa->jadwal;
        $jadwal->nosurat = $request->nosurat;
        $jadwal->kajur = $dosen->id_dosen;
        $jadwal->save();
        return redirect('/halaman_komisi/jadwalkomisi')->with('success', 'No Surat Berhasil di Tambahkan');
    }
    public function daftarpenilaian(Request $request, $id)
    {
        $mahasiswa = mahasiswa::find($id);
        $jadwal = $mahasiswa->jadwal;
        $dosen = Dosen::all();
        $pdf = PDF::loadView('export.daftarpenilaian', ['mahasiswa' => $mahasiswa, 'jadwal' => $jadwal, 'dosen' => $dosen]);
        return $pdf->download('Surat Daftar Penilaian.pdf');
    }
    public function daftarhadir(Request $request, $id)
    {
        $mahasiswa = mahasiswa::find($id);
        $jadwal = $mahasiswa->jadwal;
        $dosen = Dosen::all();
        $pdf = PDF::loadView('export.daftarhadir', ['mahasiswa' => $mahasiswa, 'jadwal' => $jadwal, 'dosen' => $dosen]);
        return $pdf->download('Surat Daftar Hadir.pdf');
    }
    public function daftarundanganpendadaran(Request $request, $id)
    {
        $mahasiswa = mahasiswa::find($id);
        $jadwal = $mahasiswa->jadwal;
        $dosen = Dosen::all();
        $kajur = \DB::table('tb_dsn AS d')->select('d.id_dosen')
        ->where('status', '=', 'Ketua Jurusan')
        ->first();
        $status = $dosen->where('status' , '=' , 'Ketua Jurusan');
        $pdf = PDF::loadView('export.daftarundanganpendadaran', ['mahasiswa' => $mahasiswa, 'jadwal' => $jadwal, 'dosen' => $dosen, 'status' => $status, 'kajur' => $kajur]);
        return $pdf->download('Surat Undangan Pendadaran.pdf');
    }
    public function daftarberitaacara(Request $request, $id)
    {
        $mahasiswa = mahasiswa::find($id);
        $jadwal = $mahasiswa->jadwal;
        $dosen = Dosen::all();
        $pdf = PDF::loadView('export.daftarberitaacara', ['mahasiswa' => $mahasiswa, 'jadwal' => $jadwal, 'dosen' => $dosen]);
        return $pdf->download('Surat Daftar Berita Acara.pdf');
    }
    public function daftarnilaidosen(Request $request, $id)
    {
        $mahasiswa = mahasiswa::find($id);
        $jadwal = $mahasiswa->jadwal;
        $dosen = Dosen::all();
        $pdf = PDF::loadView('export.daftarnilaidosen', ['mahasiswa' => $mahasiswa, 'jadwal' => $jadwal, 'dosen' => $dosen]);
        return $pdf->download('Surat Daftar Nilai Dosen.pdf');
    }
}
