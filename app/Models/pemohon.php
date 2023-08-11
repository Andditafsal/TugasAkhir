<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemohon extends Model
{
    use HasFactory;
    protected $table  = 'pemohon';

    protected $fillable = [
        'nama_lengkap_pemohon',
        'nip_pemohon',
        'jabatan_pemohon',
        'nohp_pemohon',

    ];
}
