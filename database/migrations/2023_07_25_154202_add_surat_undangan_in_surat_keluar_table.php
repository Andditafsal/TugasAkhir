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
            $table->string('nama_kegiatan')->nullable()->after('lampiran');
            $table->string('hari_kegiatan')->nullable()->after('nama_kegiatan');
            $table->string('tanggal_kegiatan')->nullable()->after('hari_kegiatan');
            $table->string('waktu_mulai_kegiatan')->nullable()->after('tanggal_kegiatan');
            $table->string('waktu_selesai_kegiatan')->nullable()->after('waktu_mulai_kegiatan');
            $table->string('tempat_kegiatan')->nullable()->after('waktu_selesai_kegiatan');
            $table->string('catatan_kegiatan')->nullable()->after('tempat_kegiatan');
            $table->string('masalah_kegiatan')->nullable()->after('catatan_kegiatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surat_keluar', function (Blueprint $table) {

            $table->dropColumn('nama_kegiatan');
            $table->dropColumn('hari_kegiatan');
            $table->dropColumn('tanggal_kegiatan');
            $table->dropColumn('waktu_mulai_kegiatan');
            $table->dropColumn('waktu_selesai_kegiatan');
            $table->dropColumn('tempat_kegiatan');
            $table->dropColumn('catatan_kegiatan');
            $table->dropColumn('masalah_kegiatan');
        });
    }
};
