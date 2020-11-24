<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;

class EditmhsController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::find(Auth::User()->mahasiswa->id_mahasiswa);
        return view('halaman_mahasiswa/edit', [
            'mahasiswa' => $mahasiswa
        ] );
    }

    public function update(Request $request)
    {
        $request->validate([
            'passlama' => ['required', new MatchOldPassword],
            'passbaru' => ['required'],
            'passlagi' => ['same:passbaru'],
        ],[
            'passbaru.required' => 'Silahkan isi dengan Password Baru anda',
            'passlagi.required' => 'Silahkan isi dengan Password Baru anda'
        ]);
    
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->passlagi)]);
    
        return redirect('/halaman_mahasiswa/edit');
    }
}
