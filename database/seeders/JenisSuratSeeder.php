<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        JenisSurat::create([
            'nama' => 'Surat_Panggilan_Orang_Tua',
            'nomor_surat' => '005/001/SMKN2-CadisdikWil.IX/2023'

        ]);
        JenisSurat::create([
            'nama' => 'Surat_Panggilan_Pegawai',
            'nomor_surat' => '800/001/SMKN2-CadisdikWil.IX/2023'
        ]);
        JenisSurat::create([
            'nama' => 'Surat_Tugas_Monitoring',
            'nomor_surat' => '488/001/SMKN2-CadisdikWil.IX/2023'
        ]);
        JenisSurat::create([
            'nama' => 'Surat_Pengantar_Prakerin',
            'nomor_surat' => '488/001/SMKN2-CadisdikWil.IX/2023'
        ]);
        JenisSurat::create([
            'nama' => 'Surat_Permohonan_Prakerin',
            'nomor_surat' => '488/001/SMKN2-CadisdikWil.IX/2023'
        ]);
        JenisSurat::create([
            'nama' => 'Surat_Dispensasi',
            'nomor_surat' => '421.7/001/SMKN2-CadisdikWil.IX/2023'

        ]);
        JenisSurat::create([
            'nama' => 'Surat_Diterima',
            'nomor_surat' => '421.7/001/SMKN2-CadisdikWil.IX/2023'
        ]);
        JenisSurat::create([
            'nama' => 'Surat_Rapat_Koordinasi',
            'nomor_surat' => '005/001/SMKN2-CadisdikWil.IX/2023'
        ]);
        JenisSurat::create([
            'nama' => 'Surat_Undangan_Brefing',
            'nomor_surat' => '005/001/SMKN2-CadisdikWil.IX/2023'
        ]);
        JenisSurat::create([
            'nama' => 'Surat_Undangan_Raport',
            'nomor_surat' => '005/001/SMKN2-CadisdikWil.IX/2023'
        ]);
        JenisSurat::create([
            'nama' => 'Surat_Undangan_Persiapan_Audit',
            'nomor_surat' => '005/001/SMKN2-CadisdikWil.IX/2023'
        ]);
        JenisSurat::create([
            'nama' => 'Surat_Undangan_Rapat',
            'nomor_surat' => '005/001/SMKN2-CadisdikWil.IX/2023'
        ]);
        JenisSurat::create([
            'nama' => 'Surat_Undangan_Sosialisasi',
            'nomor_surat' => '005/001/SMKN2-CadisdikWil.IX/2023'
        ]);
        JenisSurat::create([
            'nama' => 'Surat_Undangan_Kurikulum',
            'nomor_surat' => '005/001/SMKN2-CadisdikWil.IX/2023'
        ]);
        JenisSurat::create([
            'nama' => 'Surat_Undangan_Pembinaan',
            'nomor_surat' => '005/001/SMKN2-CadisdikWil.IX/2023'
        ]);
    }
}
