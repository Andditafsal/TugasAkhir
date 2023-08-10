<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisSurat;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisSurat::create([
            'kode_surat' => '005',
            'kode_sekolah' => 'SMKN2-CadisdikWil.IXSMKN2-CadisdikWil.IX',
            'tahun_surat' => '2023',
            'name' => 'Surat Undangan Persiapan Audit Internal ',

        ]);
        JenisSurat::create([
            'kode_surat' => '005',
            'kode_sekolah' => 'SMKN2-CadisdikWil.IXSMKN2-CadisdikWil.IX',
            'tahun_surat' => '2023',
            'name' => 'Surat panggilan Orang Tua ',
        ]);
        JenisSurat::create([
            'kode_surat' => '488',
            'kode_sekolah' => 'SMKN2-CadisdikWil.IXSMKN2-CadisdikWil.IX',
            'tahun_surat' => '2023',
            'name' => 'Surat Tugas Monitoring ',
        ]);
        JenisSurat::create([
            'kode_surat' => '800',
            'kode_sekolah' => 'SMKN2-CadisdikWil.IXSMKN2-CadisdikWil.IX',
            'tahun_surat' => '2023',
            'name' => 'Surat Panggilan Pegawai ',
        ]);
    }
}
