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
        Schema::create('rut_tiens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cong_tac_vien_id');
            $table->string('ma_yeu_cau')->unique();
            $table->decimal('so_tien', 15, 2);
            $table->enum('trang_thai', ['dang_xu_ly', 'da_duyet', 'da_huy'])->default('dang_xu_ly');
            $table->text('ghi_chu')->nullable();
            $table->string('ten_ngan_hang');
            $table->string('so_tai_khoan');
            $table->string('ten_chu_tai_khoan');
            $table->string('anh_qr')->nullable();
            $table->string('anh_ket_qua')->nullable();
            $table->text('ly_do_tu_choi')->nullable();
            $table->foreign('cong_tac_vien_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rut_tiens');
    }
};
