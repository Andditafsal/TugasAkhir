<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'table_surat_masuk';

    public function suratMasuks()
    {
        return $this->hasMany(SuratMasuk::class);
    }

    public function disposisi()
    {
        return $this->hasOne(Disposisi::class, "surat_masuk_id");
    }

    protected  $fillable = [
        'tanggal',
        'alamat_surat',
        'perihal_masuk',
        'tanggal_surat',
        'nomor_masuk',
        'dokumen',
        'diajukan',
        'status',
    ];
    public function getDokumenAttribute($dokumen)
    {
        return asset('storage/' . $dokumen);
    }
}
