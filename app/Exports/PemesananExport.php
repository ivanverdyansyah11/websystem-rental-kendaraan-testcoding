<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PemesananExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        // return view('nota.generate-pemesanan', [
        //     'alumnis' => Alumni::all(),
        // ]);
    }
}
