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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ten_doc_gia');
            $table->string('email')->unique();
            $table->string('mat_khau');
            $table->string('so_dien_thoai');
            $table->string('hinh_anh')->nullable();
            $table->string('dia_chi');
            $table->date('sinh_nhat');
            $table->enum('gioi_tinh',['Nam','Nữ']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
