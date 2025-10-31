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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('matakuliah_id')->constrained('matakuliah')->onUpdate('cascade')->onDelete('restrict');
            $table->date('tanggal_absensi');
            $table->enum('status_absen', ['A', 'H', 'I', 'S']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_tables');
    }
};
