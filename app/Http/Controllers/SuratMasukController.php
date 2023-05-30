<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller


{
    protected $suratmasuk;
    public function __construct(SuratMasuk $suratmasuk)
    {
        $this->suratmasuk = $suratmasuk;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratmasuks = $this->suratmasuk->paginate();

        // return new SuratmasukCollection($suratmasuks);

        return 'cobaaa';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
}
