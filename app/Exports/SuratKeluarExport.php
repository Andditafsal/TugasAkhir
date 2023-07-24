<?php

namespace App\Exports;

use App\Models\SuratKeluar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratKeluarExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $suratkeluar = SuratKeluar::all();
        return view('excel.suratkeluarexcel', compact('suratkeluar'));
    }
}
