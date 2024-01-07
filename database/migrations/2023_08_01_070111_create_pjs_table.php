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
        Schema::create('pjs', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 64);
            $table->string('paraf')->nullable();
            $table->string('jabatan', 64);
            $table->date('periode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pjs');
    }
};
