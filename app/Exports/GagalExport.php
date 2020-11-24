<?php

namespace App\Exports;

use App\jadwal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GagalExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($jadwal) {
        $this->jadwal = $jadwal;
    }
    public function view(): View
    {
        return view('export.gagalexcel',[
            'jadwal' => $this->jadwal
        ]);
    }
}
