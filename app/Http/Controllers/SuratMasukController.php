<?php

namespace App\Http\Controllers;

use App\Http\Requests\suratmasuk\CreateRequest;
use App\Http\Requests\suratmasuk\UpdateRequest;
use App\Http\Resources\SuratMasuk\SuratMasukCollection;
use App\Http\Resources\SuratMasuk\SuratMasukDetail;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $suratmasuks = $this->suratmasuk->paginate($request->per_page);

        $query = $this->suratmasuk->query();

        if ($request->has('search')) {
            $query->where("tanggal", "like", "%" . $request->search . "%")
                ->orWhere("alamat_surat", "like", "%" . $request->search . "%");
        }

        $suratmasuks = $query->paginate($request->per_page);


        return new SuratMasukCollection($suratmasuks);

        ////return 'berhasil';
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        return DB::transaction(
            function () use ($request) {
                $file = "";
                if ($request->hasFile('dokumen_surat')) {
                    $file = $request->file('dokumen_surat')->store('dokumen');
                }
                $request->merge([
                    'dokumen' => $file
                ]);
                return $this->suratmasuk->create($request->all());
            }
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratmasuk)
    {
        if (auth()->user()->id_role == 3 && $suratmasuk->status == 0) {
            $suratmasuk->update([
                "status" => 1
            ]);
        }
        // if ((auth()->user()->id_role == 3 || auth()->user()->id_role == 2) && $suratmasuk->status == 0) {
        //     $suratmasuk->update([
        //         "status" => 1
        //     ]);
        // }

        if (auth()->user()->id_role == 3 && $suratmasuk->diajukan == 0) {
            $suratmasuk->update([
                "diajukan" => 1
            ]);
        }

        return new SuratMasukDetail($suratmasuk);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function update(UpdateRequest $request, string $id)
    {
        $suratmasuk = $this->suratmasuk->findOrFail($id);

        //return $this->suratmasuk->update($request->all());

        if ($request->hasFile('dokumen_surat')) {
            if ($suratmasuk->dokumen) {
                $path = str_replace(url('storage') . '/', '', $suratmasuk->dokumen);
                Storage::delete($path);
            }
            $file = $request->file('dokumen_surat')->store('dokumen');

            $request->merge([
                'dokumen' => $file
            ]);
        }

        return DB::transaction(function () use ($request, $suratmasuk) {
            return $suratmasuk->update($request->all());
        });
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
