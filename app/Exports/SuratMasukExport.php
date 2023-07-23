<?php

namespace App\Exports;

use App\Models\SuratMasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SuratMasukExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $suratmasuk = SuratMasuk::all();
        return view('excel.suratmasukexcel', compact('suratmasuk'));
    }
}
