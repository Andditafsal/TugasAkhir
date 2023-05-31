<?php

namespace App\Http\Controllers;

use App\Http\Requests\suratmasuk\CreateRequest;
use App\Http\Requests\suratmasuk\UpdateRequest;
use App\Http\Resources\SuratMasuk\SuratMasukCollection;
use App\Http\Resources\SuratMasuk\SuratMasukDetail;
use App\Models\SuratMasuk;

use Illuminate\Support\Facades\DB;
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
    public function index(Request $request)
    {
        $suratmasuks = $this->suratmasuk->paginate();

        return new SuratMasukCollection($suratmasuks);

        ////return 'berhasil';
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        return $this->suratmasuk->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratmasuk)
    {
        return new SuratMasukDetail($suratmasuk);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function update(UpdateRequest $request, string $id)
    {
        $suratmasuk = $this->suratmasuk->findOrFail($id);
        return $this->suratmasuk->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratmasuk)
    {
        return DB::transaction(function () use ($suratmasuk) {
            return $suratmasuk->delete();
        });
    }
}
