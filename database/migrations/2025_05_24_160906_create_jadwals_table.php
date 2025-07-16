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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->uuid('id_jadwal')->primary();
            $table->dateTime('tanggal_waktu');
            $table->uuid('id_kelompok');
            $table->uuid('id_judul');
            $table->string('slug', 255);
            $table->foreign('id_kelompok')->references('id_kelompok')->on('kelompok')->onDelete('cascade');
            $table->foreign('id_judul')->references('id_judul')->on('judul')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
