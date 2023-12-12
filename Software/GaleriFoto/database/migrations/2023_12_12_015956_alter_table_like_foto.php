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
        Schema::table('like_fotos', function (Blueprint $table) {
            $table->foreign('foto_id')->references('id')->on('fotos')->onDelete('cascade'); 
            $table->unsignedBigInteger('foto_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->unsignedBigInteger('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('like_fotos', function (Blueprint $table) {
            $table->dropColumn('foto_id');
            $table->dropColumn('user_id');
        });
    }
};
