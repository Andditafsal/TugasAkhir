<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CetakSurat extends Model
{
    use HasFactory;
    protected $table  = 'cetak_surat';


    protected $fillable = [

        'nama',

    ];
}
