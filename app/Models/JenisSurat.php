<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model

{

    protected $table  = 'jenis_surat';


    // public function suratKeluar()
    // {
    //     return $this->hasMany(SuratKeluar::class);
    // }
    // public function suratmasuks()
    // {
    //     return $this->hasMany(SuratMasuk::class);
    // }

    protected $fillable = [
        'kode_surat',
        'kode_sekolah',
        'tahun_surat',
        'name',
        'id_jenis_surat',

    ];
}
