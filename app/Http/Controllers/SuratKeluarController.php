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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuratKeluarExport;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    protected $suratkeluar, $jenissurat;

    public function __construct(SuratKeluar $suratkeluar, JenisSurat $jenissurat,)
    {
        $this->suratkeluar = $suratkeluar;
        $this->jenissurat = $jenissurat;
    }


    public function index(Request $request)
    {
        //$suratkeluars = $this->suratkeluar->paginate($request->per_paage);
        $query = $this->suratkeluar->query();

        if ($request->has('search')) {
            $query->where("Kepada", "like", "%" . $request->search . "%")
                ->orWhere("Perihal", "like", "%" . $request->search . "%");
        }

        $suratkeluars = $query->paginate($request->per_page);
        return new SuratKeluarCollection($suratkeluars);
        //return 'berhasil';
    }

    public function suratkeluarexport()
    {
        return Excel::download(new SuratKeluarExport, 'suratkeluarcobaa.xlsx');
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
        if (auth()->check()) {
            $user = auth()->user();

            if ($user->id_role === 2 && $suratkeluar->status === 0) {
                $suratkeluar->update([
                    "status" => 1
                ]);
            }
        }
        return new SuratKeluarDetail($suratkeluar);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {

        $suratkeluar = $this->suratkeluar->findOrFail($id);
        if ($request->hasFile('lampiran_surat')) {
            if ($suratkeluar->lampiran) {
                $path = str_replace(url('storage') . '/', '', $suratkeluar->lampiran);
                Storage::delete($path);
            }
            $file = $request->file('lampiran_surat')->store('lampiran');

            $request->merge([
                'lampiran' => $file
            ]);
        }
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

        // if ($jenissurat->kode_surat == "800") {
        //     return $this->cetakSuratPanggilanPegawai($jenissurat, $request);
        // }
        // else if ($databse->hemalsasb) {
        //     # code...
        // }


    }
    protected function cetakSuratUndangan($jenissurat, $suratkeluar, $request)
    {
        $template = new \PhpOffice\PhpWord\TemplateProcessor("./img/dokumen/Surat_Undangan.docx");
        $template->setValues([
            // surat
            'kode_surat' => $jenissurat->kode_surat,
            'kode_sekolah' => $jenissurat->kode_sekolah,
            'tahun_surat' => $jenissurat->tahun_surat,
            //detailsurat
            'perihal' => $suratkeluar->perihal,
            'lampiran' => $suratkeluar->lampiran,
            'tahun_ajaran' => $suratkeluar->tahun_ajaran,
            'nama_kegiatan' => $suratkeluar->nama_kegiatan,
            'kepada' => $suratkeluar->kepada,

            'hari_kegiatan' => $suratkeluar->hari_kegiatan,
            'tanggal_kegiatan' => $suratkeluar->tanggal_kegiatan,
            'waktu_mulai_kegiatan' => $suratkeluar->waktu_mulai_kegiatan,
            'tempat_kegiatan' => $suratkeluar->tempat_kegiatan,

        ]);

        $template->saveAs('arsip/Surat_Undangan.docx');
        return response()->download(public_path('arsip/Surat_Undangan.docx'));
    }

    protected function cetakSuratPanggilanOrangTua($jenissurat, $suratkeluar, $request)
    {
        $template = new \PhpOffice\PhpWord\TemplateProcessor("./img/dokumen/Surat_Panggilan_Orang_Tua.docx");
        $template->setValues([
            'kode_surat' => $jenissurat->kode_surat,
            'kode_sekolah' => $jenissurat->kode_sekolah,
            'tahun_surat' => $jenissurat->tahun_surat,
            //detailsurat
            'tanggal_surat' => $suratkeluar->tanggal_surat,
            'perihal' => $suratkeluar->perihal,
            'lampiran' => $suratkeluar->lampiran,
            'nama_ortu' => $suratkeluar->nama_ortu,
            'kelas_siswa' => $suratkeluar->kelas_siswa,
            'nama_kegiatan' => $suratkeluar->nama_kegiatan,
            'hari_kegiatan' => $suratkeluar->hari_kegiatan,
            'tanggal_kegiatan' => $suratkeluar->tanggal_kegiatan,
            'waktu_mulai_kegiatan' => $suratkeluar->waktu_mulai_kegiatan,
            'tempat_kegiatan' => $suratkeluar->tempat_kegiatan,
            'masalah_kegiatan' => $suratkeluar->masalah_kegiatan

        ]);

        $template->saveAs('arsip/Surat_Panggilan_Orang_Tua.docx');
        return response()->download(public_path('arsip/Surat_Panggilan_Orang_Tua.docx'));
    }

    protected function cetakSuratMonitoring($jenissurat, $suratkeluar, $request)
    {
        $template = new \PhpOffice\PhpWord\TemplateProcessor("./img/dokumen/Surat_Monitoring.docx");
        $template->setValues([
            // surat
            'kode_surat' => $jenissurat->kode_surat,
            'kode_sekolah' => $jenissurat->kode_sekolah,
            'tahun_surat' => $jenissurat->tahun_surat,
            //detailsurat
            'kepada' => $suratkeluar->kepada,
            'nip' => $suratkeluar->nip,
            'jabatan' => $suratkeluar->jabatan,
            'pangkat' => $suratkeluar->pangkat,
            'gol' => $suratkeluar->gol,
            'jurusan' => $suratkeluar->jurusan,
            'tempat_kegiatan' => $suratkeluar->tanggal_kegiatan,
            'nama_industri' => $suratkeluar->nama_industri,
            'alamat_indsutri' => $suratkeluar->alamat_industri


        ]);

        $template->saveAs('arsip/Surat_Monitoring.docx');
        return response()->download(public_path('arsip/Surat_Monitoring.docx'));
    }
    protected function cetakSuratPanggilanPegawai($jenissurat, $suratkeluar, $request)
    {
        $template = new \PhpOffice\PhpWord\TemplateProcessor("./img/dokumen/Surat_Panggilan_pegawai.docx");
        $template->setValues([
            // surat
            'kode_surat' => $jenissurat->kode_surat,
            'kode_sekolah' => $jenissurat->kode_sekolah,
            'tahun_surat' => $jenissurat->tahun_surat,
            //detailsurat
            'kepada' => $suratkeluar->kepada,
            'nip' => $suratkeluar->nip,
            'jabatan' => $suratkeluar->jabatan,
            'hari_kegiatan' => $suratkeluar->hari_kegiatan,
            'tanggal_kegiatan' => $suratkeluar->tanggal_kegiatan,
            'waktu_mulai_kegiatan' => $suratkeluar->waktu_mulai_kegiatan,
            'tempat_kegiatan' => $suratkeluar->tempat_kegiatan,
            'nama_kegiatan' => $suratkeluar->nama_kegiatan


        ]);

        $template->saveAs('arsip/Surat_Panggilan_pegawai.docx');
        return response()->download(public_path('arsip/Surat_Panggilan_pegawai.docx'));
    }
}
