<?php

namespace App\Http\Controllers;

use App\Http\Requests\Arsip\CreateRequest;
use App\Http\Requests\Arsip\UpdateRequest;
use App\Http\Resources\Arsip\ArsipSuratCollection;
use App\Http\Resources\Arsip\ArsipSuratDetail;
use App\Models\ArsipSurat;
use App\Models\JenisSurat;
use Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ArsipSuratController extends Controller
{

    protected $arsipsurat;
    public function __construct(ArsipSurat $arsipsurat)
    {
        $this->arsipsurat = $arsipsurat;
    }
    public function index()
    {
        $arsipsurats = $this->arsipsurat->get();

        return new ArsipSuratCollection($arsipsurats);
    }


    public function store(CreateRequest $request)
    {
        return $this->arsipsurat->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(ArsipSurat $arsipsurat)
    {
        return new ArsipSuratDetail($arsipsurat);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $arsipsurat = $this->arsipsurat->findOrFail($id);
        return $arsipsurat->update($request->all());
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArsipSurat $arsipsurat)
    {
        return DB::transaction(function () use ($arsipsurat) {
            return $arsipsurat->delete();
        });
    }

    public function cetak(ArsipSurat $arsipsurat)
    {
        $template = new \PhpOffice\PhpWord\TemplateProcessor('./template/Surat/coba.docx');
        $template->setValues([

            'tanggal_surat' => $arsipsurat->tanggal_surat,
            'nama' => $arsipsurat->nama,
            'lampiran' => $arsipsurat->lampiran,
            'perihal' => $arsipsurat->perhal,
            'tahun_ajaran' => $arsipsurat->tahun_ajaran,


        ]);
        $template->saveAs('arsipsurat/' . $arsipsurat
            ->nama . " - .docx");
        return 'ok';

        // $phpWord = new \PhpOffice\PhpWord\PhpWord;
        // $section = $phpWord->addSection();

        // $description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident dignissimos qui, asperiores, error reprehenderit voluptas quod minus culpa beatae possimus eaque consectetur adipisci accusantium magni sed itaque ducimus praesentium dolorem.";

        // $section->addText($description);
        // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        // try {
        //     $objWriter->save(storage_path('coba.docx'));
        // } catch (Exception $e) {
        //     //throw $th;
        // }

        // return response()->download(storage_path('coba.docx'));
    }
}
