<?php

namespace App\Exports;

use App\jadwal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JadwalExport implements FromView, ShouldAutoSize
{
    private $jadwal;
    private $dosen;

    public function __construct($jadwal,$dosen) {
           $this->jadwal = $jadwal;
           $this->dosen = $dosen;
    }
    use Exportable;
    public function view(): View
    {
        return view('export.laporanexcel',[
            'jadwal' => $this->jadwal,
            'dosen' => $this->dosen
        ]);
    }
}
