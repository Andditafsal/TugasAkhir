<?php

namespace App\Http\Controllers;

use App\Http\Requests\jenissurat\CreateRequest;
use App\Http\Requests\jenissurat\JenisSuratUpdateRequest;
use App\Http\Resources\JenisSurat\JenisSuratCollection;
use App\Http\Resources\JenisSurat\JenisSuratDetail;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisSuratController extends Controller
{
    protected $jenissurat;

    public function __construct(JenisSurat $jenissurat)
    {
        $this->jenissurat = $jenissurat;
    }
    public function index()
    {
        $query = $this->jenissurat->query();

        if (auth()->user()->id_role == 5) {
            $query->whereIn("id", [1, 3]);
        }

        $jenissurats = $query->get();

        return new JenisSuratCollection($jenissurats);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $cek = JenisSurat::count();

        if ($cek == 0) {
            $nomer = 1;
        } else {
            $jenis = JenisSurat::where("kode_surat", $request->kode_surat)->max("nomor_surat");

            $nomer = $jenis + 1;
        }

        return DB::transaction(
            function () use ($request, $nomer) {
                $file = "";
                if ($request->hasFile('template_dokumen')) {
                    $file = $request->file('template_dokumen')->store('dokumen');
                }
                $request->merge([
                    'dokumen' => $file,
                    "nomor_surat" => $nomer
                ]);

                return $this->jenissurat->create($request->all());
            }
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisSurat $jenissurat)
    {
        return new JenisSuratDetail($jenissurat);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(JenisSuratUpdateRequest $request, string $id)
    {
        $jenissurat = $this->jenissurat->findOrFail($id);
        return $jenissurat->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisSurat $jenissurat)
    {
        return DB::transaction(function () use ($jenissurat) {
            return $jenissurat->delete();
        });
    }
}
