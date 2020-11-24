<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Dosen;
use Illuminate\Support\Facades\Hash;

class unduhkmsController extends Controller
{
    public function getUnduh($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/data_file/".$mahasiswa->file2;
        $headers = ['Content-Type: application/pdf'];
        $newName = $mahasiswa->nama .'-Nilai Transkip'.'.pdf';
        return response()->download($file, $newName, $headers);
        // return response()->file($file);
        // return response()->($file, $mahasiswa->nama.' UEPT', $headers);
    }
}
