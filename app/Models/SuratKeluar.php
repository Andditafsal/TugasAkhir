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
        'nama_kegiatan',
        'hari_kegiatan',
        'tanggal_kegiatan',
        'waktu_mulai_kegiatan',
        'waktu_selesai_kegiatan',
        'tempat_kegiatan',
        'catatan_kegiatan',
        'masalah_kegiatan',
        'nama_industri',
        'alamat_industri',
        'kelas_siswa',
        'jurusan_siswa',
        'tahun_ajaran',
        'nip',
        'pangkat',
        'jabatan',
        'gol',
        'nama_pegawai',
        'wali_murid',
        'status',
        // 'nama_ortu',
        'nama_pengaju',
        'nip_pengaju',
        'jabatan_pengaju',
        'kontak_pengaju',
        'no_surat',
        'keterangan_surat'
    ];
}
