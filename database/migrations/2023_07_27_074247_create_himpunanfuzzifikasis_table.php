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
        Schema::create('himpunanfuzzifikasis', function (Blueprint $table) {
            $table->id();
            $table->integer('kriteria_id');
            $table->string('kode_himpunan', 32);
            $table->string('nama_himpunan', 255);
            $table->float('batas_bawah', 10,2);
            $table->float('batas_tengah1', 10,2);
            $table->float('batas_tengah2', 10,2);
            $table->float('batas_atas', 10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('himpunanfuzzifikasis');
    }
};
