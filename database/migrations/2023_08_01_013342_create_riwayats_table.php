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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->integer('pasien_id');
            $table->integer('no_aturan');
            $table->string('h1');
            $table->string('h2');
            $table->string('h3');
            $table->string('h4');
            $table->string('h5');
            $table->string('hasil_diagnosis');
            $table->string('akurasi_hasil_diagnosis');
            $table->text('solusi');
            $table->string('diagnosa_lain');
            $table->string('akurasi_diagnosa_lain');
            $table->text('solusi_diagnosa_lain');
            $table->dateTime('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};
