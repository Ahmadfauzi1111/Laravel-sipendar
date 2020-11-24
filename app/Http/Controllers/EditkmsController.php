<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Komisi;

class EditkmsController extends Controller
{
    public function index()
    {
        $komisi = Komisi::find(Auth::User()->komisi->id_komisi);
        return view('halaman_komisi/edit', [
            'komisi' => $komisi
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
    
        return redirect('/halaman_komisi/edit')->with('success', 'Password telah diganti');
    }
}
