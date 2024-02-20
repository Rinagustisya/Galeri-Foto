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
        Schema::table('komentar_fotos', function (Blueprint $table) {
            $table->unsignedBigInteger('reply_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('komentar_fotos', function (Blueprint $table) {
            $table->dropColumn('reply_to');
        });
    }
};
