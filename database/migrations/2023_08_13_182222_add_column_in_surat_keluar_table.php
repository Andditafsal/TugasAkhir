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
            $table->string('nama_pengaju')->nullable()->after('wali_murid');
            $table->string('nip_pengaju')->nullable()->after('nama_pengaju');
            $table->string('jabatan_pengaju')->nullable()->after('nip_pengaju');
            $table->string('kontak_pengaju')->nullable()->after('jabatan_pengaju');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surat_keluar', function (Blueprint $table) {
            $table->dropColumn('nama_pengaju');
            $table->dropColumn('nip_pengaju');
            $table->dropColumn('jabatan_pengaju');
            $table->dropColumn('kontak_pengaju');
        });
    }
};
