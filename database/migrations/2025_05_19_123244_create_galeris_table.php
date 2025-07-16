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
        Schema::create('galeri', function (Blueprint $table) {
            $table->uuid('id_galeri')->primary();
            $table->string('judul', 255);
            $table->string('deskripsi', 255);
            $table->string('slug', 255)->unique();
            $table->string('url_gambar', 255);
            $table->uuid('id_user');
            $table->uuid('id_praktikum');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_praktikum')->references('id_praktikum')->on('praktikum')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};
