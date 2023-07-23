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
            $table->string('perihal');
            $table->string('kepada');
            $table->string('hari_kegiatan');
            $table->date('tanggal_kegiatan');
            $table->string('waktu_kegiatan');
            $table->string('tempat_kegiatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surat_keluar', function (Blueprint $table) {
        });
    }
};
