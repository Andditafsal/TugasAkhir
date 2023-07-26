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
        'tanggal_surat',
        'hari_kegiatan',
        'tanggal_kegiatan',
        'waktu_mulai_kegiatan',
        'waktu_selesai_kegiatan',
        'tempat_kegiatan',
        'catatan_kegiatan',
        'masalah_kegiatan',
    ];
}
