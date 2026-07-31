<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('loan_details', function (Blueprint $table) {
            $table->id();

            // Relasi ke loan
            $table->foreignId('loan_id')->constrained()->onDelete('cascade');

            // Relasi ke item
            $table->foreignId('item_id')->constrained()->onDelete('cascade');

            $table->integer('jumlah')->default(1);
            $table->enum('kondisi_item', ['Baik', 'Rusak Ringan', 'Rusak Berat'])->default('Baik');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loan_details');
    }
};
