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
            $table->string('diajukan')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_surat_masuk', function (Blueprint $table) {
            $table->dropColumn('diajukan');
        });
    }
};
