<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    protected $fillable = [

        'kode_surat',
        'kode_sekolah',
        'tahun_surat',

    ];
    // public function getDokumenAttribute($dokumen)
    // {
    //     return asset('storage/' . $dokumen);
    // }
}
