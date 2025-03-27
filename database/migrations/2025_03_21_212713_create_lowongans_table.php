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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->text('deskripsi');
            $table->text('kualifikasi');
            $table->decimal('gaji', 10, 2);
            $table->date('tanggal_ditutup');
            $table->string('poster')->nullable();
            $table->enum('status', ['dibuka', 'ditutup']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
