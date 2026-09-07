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
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->string('id_fasilitas', 10)->primary();
            $table->string('id_pariwisata', 10);
            $table->string('nama_fasilitas', 250);
            $table->text('lokasi')->nullable();
            $table->enum('jenis', ['Hotel', 'restoran', 'Oleh-oleh', 'tempat ibadah']);
            $table->text('deskripsi')->nullable();
            $table->string('latitude', 100)->nullable();
            $table->string('longitude', 100)->nullable();
            $table->timestamps();
        
            // Foreign key constraint
            $table->foreign('id_pariwisata')->references('id_pariwisata')->on('pariwisata')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};
