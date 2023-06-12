<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuratKeluar\SuratKeluarCollection;
use App\Models\SuratKeluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    protected $suratkeluar;
    public function _construct(SuratKeluar $suratkeluar)
    {
        $this->suratkeluar = $suratkeluar;
    }


    public function index(Request $request)
    {
        $suratkeluars = $this->suratkeluar->paginate($request->per_page);
        return new SuratKeluarCollection($suratkeluars);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function cetak(string $id)
    {
        $pdf = Pdf::loadview('cetakSurat.SuratKeluar.audit');
        return $pdf->download();
        ///return view('cetakSurat.SuratKeluar.audit');
    }
}
