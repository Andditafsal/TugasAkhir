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
            $table->string('perihal')->after('jenis_surat_id');
            $table->string('kepada')->after('perihal');
            $table->string('tanggal_surat')->after('kepada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surat_keluar', function (Blueprint $table) {
            $table->dropColumn('perihal');
            $table->dropColumn('kepada');
            $table->dropColumn('tanggal_surat');
        });
    }
};
