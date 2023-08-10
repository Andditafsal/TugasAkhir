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
        Schema::table('table_surat_masuk', function (Blueprint $table) {
            $table->string('nomor_surat')->after('tanggal');
            $table->string('perihal')->after('nomor_surat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_surat_masuk', function (Blueprint $table) {
            //
        });
    }
};
