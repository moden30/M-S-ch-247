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
        Schema::create('luu_vi_tri_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('sach_id')->constrained('saches')->onDelete('cascade');
            $table->foreignId('chuong_id')->constrained('chuongs')->onDelete('cascade');
            $table->integer('position')->default(0);
            $table->string('highlight_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luu_vi_tri_docs');
    }
};
