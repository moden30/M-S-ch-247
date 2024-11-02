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
            $table->string('but_danh')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('so_dien_thoai')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->string('dia_chi')->nullable();
            $table->date('sinh_nhat')->nullable();
            $table->enum('gioi_tinh',['Nam','Nữ'])->nullable();
            $table->enum('trang_thai', ['khoa', 'hoat_dong'])->default('hoat_dong');
            $table->decimal('so_du', 15, 2)->default(0);
            $table->softDeletes();
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
