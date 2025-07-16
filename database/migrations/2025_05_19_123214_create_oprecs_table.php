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
        Schema::create('oprec', function (Blueprint $table) {
            $table->uuid('id_oprec')->primary();
            $table->string('nama', 40);
            $table->string('slug', 255)->unique();
            $table->string('kelas', 10);
            $table->string('angkatan', 10);
            $table->string('cv', 255);
            $table->string('transkrip', 255);
            $table->string('foto', 255);
            $table->string('ktm', 255);
            $table->uuid('id_user')->unique();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oprec');
    }
};
