<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('surat_keluar', function (Blueprint $table) {
            $table->string('nama_industri')->nullable()->after('masalah_kegiatan');
            $table->string('alamat_industri')->nullable()->after('nama_industri');
            $table->string('kelas_siswa')->nullable()->after('alamat_industri');
            $table->string('jurusan_siswa')->nullable()->after('kelas_siswa');
            $table->string('tahun_ajaran')->nullable()->after('jurusan_siswa');
            $table->string('nip')->nullable()->after('tahun_ajaran');
            $table->string('pangkat')->nullable()->after('nip');
            $table->string('jabatan')->nullable()->after('pangkat');
            $table->string('gol')->nullable()->after('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surat_keluar', function (Blueprint $table) {
            //
        });
    }
};
