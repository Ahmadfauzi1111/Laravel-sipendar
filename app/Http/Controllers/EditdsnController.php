<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Dosen;

class EditdsnController extends Controller
{
    public function index()
    {
        $dosen = Dosen::find(Auth::User()->dosen->id_dosen);
        return view('halaman_dosen/edit', [
            'dosen' => $dosen
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
    
        return redirect('/halaman_dosen/edit')->with('success', 'Password telah diganti');
    }
}
