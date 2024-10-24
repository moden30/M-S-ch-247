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
        Schema::create('kiem_duyet_cong_tac_viens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('ten_doc_gia')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->string('dia_chi')->nullable();
            $table->date('sinh_nhat')->nullable();
            $table->enum('gioi_tinh',['Nam','Nữ'])->nullable();
            $table->string('cmnd_mat_truoc')->nullable();
            $table->string('cmnd_mat_sau')->nullable();
            $table->enum('trang_thai', ['duyet', 'tu_choi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kiem_duyet_cong_tac_viens');
    }
};
