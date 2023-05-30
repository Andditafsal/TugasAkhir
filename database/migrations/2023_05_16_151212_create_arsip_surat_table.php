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
        Schema::create('arsip_surat', function (Blueprint $table) {
            $table->id();

            //Surat
            $table->date('tanggal_surat')->nullable();
            $table->string('nama')->nullable();
            $table->integer('lampiran')->nullable();
            $table->string('perihal')->nullable();
            $table->string('tahun_ajaran')->nullable();

            // //Kegiatan
            // $table->string('nama_kegiatan');
            // $table->string('hari_kegiatan');
            // $table->date('tanggal_kegiatan');
            // $table->time('waktu_kegitan');
            // $table->string('tempat_kegiatan');
            // $table->text('keterangan_kegiatan');
            // $table->integer('jml_peserta');
            // $table->text('masalah');

            // //ttd
            // $table->string('jabatan');
            // $table->string('position');
            // $table->integer('nip');
            // $table->string('pangkat');
            // $table->string('gol');

            // //form  siswa
            // $table->string('tempat_lahir ');
            // $table->date('tanggal_lahir');
            // $table->integer('nisn');
            // $table->string('nama_ortu');
            // $table->string('kelas_siswa');
            // $table->text('alamat_siswa');
            // $table->string('jenis_kelamin');
            // $table->string('jurusan');
            // $table->string('nama_industri');
            // $table->text('alamat_industri');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip_surat');
    }
};
