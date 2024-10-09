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
            $table->unsignedBigInteger('cong_tac_vien_id'); // Liên kết với bảng cộng tác viên
            $table->decimal('so_tien', 15, 2); // Số tiền yêu cầu rút
            $table->enum('trang_thai', ['dang_xu_ly', 'da_duyet', 'da_huy'])->default('dang_xu_ly'); // Trạng thái của yêu cầu
            $table->timestamp('ngay_yeu_cau')->useCurrent(); // Thời gian yêu cầu
            $table->timestamp('ngay_xu_ly')->nullable(); // Thời gian xử lý yêu cầu
            $table->text('ghi_chu')->nullable(); // Ghi chú nếu có
            // Thiết lập khóa ngoại
            $table->foreign('cong_tac_vien_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps(); // Lưu trữ thời gian tạo và cập nhật bản ghi
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
