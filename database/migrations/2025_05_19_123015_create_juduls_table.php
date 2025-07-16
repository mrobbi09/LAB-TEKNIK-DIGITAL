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
        Schema::create('judul', function (Blueprint $table) {
            $table->uuid('id_judul')->primary();
            $table->string('nama_judul', 255);
            $table->string('slug', 255)->unique();
            $table->string('modul', 255);
            $table->uuid('id_praktikum');
            $table->foreign('id_praktikum')->references('id_praktikum')->on('praktikum')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('judul');
    }
};
