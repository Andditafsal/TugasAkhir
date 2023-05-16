<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model

{

    protected $table  = 'jenis_surat';
    public function suratmasuks()
    {
        return $this->hasMany(SuratMasuk::class);
    }

    protected $fillable = [
        'nama',
        'nomor_surat'
    ];
}
