<?php

namespace App\Http\Controllers;

use App\Http\Requests\suratkeluar\UpdateRequest;
use App\Http\Requests\suratkeluar\CreateRequest;
use App\Http\Resources\SuratKeluar\SuratKeluarCollection;
use App\Http\Resources\SuratKeluar\SuratKeluarDetail;
use App\Models\JenisSurat;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratKeluarController extends Controller
{
    protected $suratkeluar, $jenissurat;

    public function __construct(SuratKeluar $suratkeluar, JenisSurat $jenissurat)
    {
        $this->suratkeluar = $suratkeluar;
        $this->jenissurat = $jenissurat;
    }


    public function index(Request $request)
    {
        $suratkeluars = $this->suratkeluar->paginate($request->per_paage);
        return new SuratKeluarCollection($suratkeluars);
        //return 'berhasil';
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {

        return DB::transaction(
            function () use ($request) {
                $file = "";
                if ($request->hasFile('lampiran_surat')) {
                    $file = $request->file('lampiran_surat')->store('lampiran');
                }
                $request->merge([
                    'lampiran' => $file
                ]);
                return $this->suratkeluar->create($request->all());
            }
        );

        $jenisSurat = JenisSurat::find($request->jenis_surat_id);

        $suratKeluar = new SuratKeluar;

        $suratKeluar->diajukan = $request->diajukan;
        $suratKeluar->perihal = $request->perihal;

        $jenisSurat->suratKeluar()->save($suratKeluar);

        return $this->suratkeluar->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratkeluar)
    {
        if (auth()->user()->id_role == 3 && $suratkeluar->status == 0) {
            $suratkeluar->update([
                "status" => 1
            ]);
        }

        return new SuratKeluarDetail($suratkeluar);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        // $suratkeluar = $this->suratKeluar->findOrFail($id);

        // return DB::transaction(
        //     function () use ($request, $suratkeluar) {

        //         return $this->suratKeluar->update($request->all());
        //     }
        // );

        $suratkeluar = $this->suratkeluar->findOrFail($id);

        //return $this->suratmasuk->update($request->all());



        return DB::transaction(function () use ($request, $suratkeluar) {
            return $suratkeluar->update($request->all());
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $suratkeluar)
    {
        return DB::transaction(function () use ($suratkeluar) {
            return $suratkeluar->delete();
        });
    }


    public function cetak(string $id, Request $request)
    {
        $jenissurat = $this->jenissurat->findOrFail($id);

        // $nomor_surat = '123/2023';
        // $lampiran = 'Lampiran Surat';
        // $perihal = 'Perihal Surat';

        // $kepada = 'Penerima Surat';
        //   'kode_surat',
        // 'kode_sekolah',
        // 'tahun_surat',
        // 'perihal',
        // $hari_kegiatan = 'Senin';
        // $tanggal_kegiatan = '2023-06-13';
        // $waktu = '09:00 - 12:00';
        // $tempat_kegiatan = 'Gedung Serbaguna';
        // $catatan_kegiatan = 'Catatan Kegiatan';
        // $tanggal_surat = '2023-06-13';
        // $signature = 'Tanda Tangan';
        // $jabatan = 'Jabatan';
        // $nip = '123456789';

        if ($jenissurat->kode_surat == "800") {
            return $this->cetakSuratPanggilanPegawai($jenissurat, $request);
        }
        // else if ($databse->hemalsasb) {
        //     # code...
        // }


    }

    protected function cetakSuratPanggilanPegawai($jenissurat, $request)
    {
        $template = new \PhpOffice\PhpWord\TemplateProcessor("./img/dokumen/Surat_Panggilan_pegawai.docx");
        $template->setValues([
            // Surat
            'kode_surat' => $jenissurat->kode_surat,
            'kode_sekolah' => $jenissurat->kode_sekolah,
            'tahun_surat' => $jenissurat->tahun_surat,

        ]);

        $template->saveAs('arsip/Surat_Panggilan_pegawai.docx');
        return response()->download(public_path('arsip/Surat_Panggilan_pegawai.docx'));
    }

    // protected function cetakSuratAudit($jenissurat, $request)
    // {
    //     $template = new \PhpOffice\PhpWord\TemplateProcessor("./coba.docx");
    //     $template->setValues([
    //         // Surat


    //     ]);

    //     $template->saveAs('dokumen/coba.docx');
    //     return response()->download(public_path('dokumen/coba.docx'));
    // }

    // protected function cetakSuratPeringatan($database) {
    //     $template = new \PhpOffice\PhpWord\TemplateProcessor("./coba.docx");
    //     $template->setValues([
    //         // Surat
    //         'nomorSurat' => $nomor_surat,
    //         'lampiran' => $lampiran,
    //         'perihal' => $perihal,
    //         'kepada' => $kepada,

    //     ]);

    //     $template->saveAs('dokumen/coba.docx');
    //     return response()->download(public_path('dokumen/coba.docx'));
    // }
}
