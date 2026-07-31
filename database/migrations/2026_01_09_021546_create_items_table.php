<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Kode Barang (misal: BRG-001)
            $table->string('name');           // Nama Barang
            $table->text('description')->nullable();
            $table->integer('stock')->default(0);
            $table->string('jenis_lab');      // <-- Request Khusus Anda
            $table->string('location')->nullable(); // Lokasi penyimpanan (opsional)
            $table->enum('type', ['barang', 'bahan'])->default('barang');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
