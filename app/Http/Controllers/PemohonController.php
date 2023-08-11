<?php

namespace App\Http\Controllers;

use App\Http\Requests\pemohon\PemohonCreateRequest;
use App\Http\Resources\pemohon\PemohonCollection;
use App\Http\Resources\pemohon\PemohonDetail;
use App\Models\pemohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemohonController extends Controller
{
    protected $pemohon;

    public function __construct(pemohon $pemohon)
    {
        $this->pemohon = $pemohon;
    }
    public function index()
    {
        $pemohons = $this->pemohon->get();

        return new PemohonCollection($pemohons);
    }

    public function store(PemohonCreateRequest $request)
    {
        // $file = "";
        // if ($request->hasFile('document')) {
        //     $file = $request->file('document')->store('file_document');
        // }
        // $request->merge([
        //     'file_document' => $file
        // ]);
        // return $this->jenissurat->create($request->all());
        return DB::transaction(
            function () use ($request) {


                return $this->pemohon->create($request->all());
            }
        );
    }
    public function show(pemohon $pemohon)
    {
        return new PemohonDetail($pemohon);
    }

    public function destroy(pemohon $pemohon)
    {
        return DB::transaction(function () use ($pemohon) {
            return $pemohon->delete();
        });
    }
}
