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
        'perihal',
        'id_jenis_surat',
        'dittutju',
        'status'
    ];
}
