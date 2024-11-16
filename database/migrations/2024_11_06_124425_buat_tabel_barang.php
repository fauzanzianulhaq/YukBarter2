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
    Schema::create('barang', function (Blueprint $table) {
        $table->id();
        $table->string('nama_barang');
        $table->string('nomor_wa'); // Ubah dari integer ke string
        $table->text('deskripsi');
        $table->string('foto');
        $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending'); // Tetap enum
        $table->timestamps();
        
        // Foreign key untuk user
        $table->unsignedBigInteger('user_id')->nullable();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Tetap cascade
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
