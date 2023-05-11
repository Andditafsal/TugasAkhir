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
        Schema::create('jenis_surat', function (Blueprint $table) {
            //Surat
            $table->id();
            $table->integer('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('nama');
            $table->integer('lampiran');
            $table->string('perial');

            //Kegiatan
            $table->string('nama_kegiatan');
            $table->string('hari_kegiatan');
            $table->date('tanggal_kegiatan');
            $table->time('waktu_kegitan');
            $table->string('tempat_kegiatan');
            $table->text('keterangan_kegiatan');
            //ttd
            $table->string('jabatan');
            $table->string('position');
            $table->integer('nip');
            //form  siswa





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_surat');
    }
};
