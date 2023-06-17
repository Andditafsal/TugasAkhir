<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'table_surat_masuk';

    protected  $fillable = [
        'tanggal',
        'alamat_surat',
        'perihal_masuk',
        'tanggal_surat',
        'nomor_masuk',
        'dokumen',
        'status',
    ];
    public function getDokumenAttribute($dokumen)
    {
        return asset('storage/' . $dokumen);
    }
}
