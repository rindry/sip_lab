<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('item_id')->constrained()->cascadeOnDelete();
            $table->integer('amount');
            $table->string('purpose');

            // PASTIKAN ADA ->nullable() DI KEDUA BARIS INI
            $table->date('borrow_date')->nullable();
            $table->date('return_date')->nullable();

            $table->date('return_date_actual')->nullable();
            $table->enum('status', ['pending', 'validated', 'approved', 'rejected', 'returned'])->default('pending');
            $table->text('admin_note')->nullable();
            $table->text('head_note')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->date('borrow_date')->nullable(false)->change();
            $table->date('return_date')->nullable(false)->change();
        });
    }
};
