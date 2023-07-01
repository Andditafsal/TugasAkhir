<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model
{
    use HasFactory;


    protected $table  = 'arsip_surat';


    protected $fillable = [
        'tanggal_surat',
        'nama',
        'lampiran',
        'perihal',
        'tahun_ajaran',
    ];
}
