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
        Schema::create('tugas_pendahuluan', function (Blueprint $table) {
            $table->uuid('id_tp')->primary();
            $table->text('soal_tp');
            $table->string('slug', 255)->unique();
            $table->uuid('id_judul');
            $table->foreign('id_judul')->references('id_judul')->on('judul')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_pendahuluan');
    }
};
