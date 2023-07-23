<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }

    protected $fillable = [
        'jenis_surat_id',
        'perihal',
        'lampiran',
        'kepada',
        'hari_kegiatan',
        'tanggal_kegiatan',
        'waktu_kegiatan',
        'tempat_kegiatan',
    ];
}
