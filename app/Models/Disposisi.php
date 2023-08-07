<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;
    protected $table = 'disposisi';

    protected $fillable = [

        'catatan',
        'user_id',
        'surat_masuk_id',

    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function suratmasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }
}
