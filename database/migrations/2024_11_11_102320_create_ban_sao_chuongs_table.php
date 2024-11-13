<?php

use App\Models\Sach;
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
        Schema::create('ban_sao_chuongs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sach_id')->constrained('saches')->onDelete('cascade');
            $table->foreignId('chuong_id')->constrained('chuongs')->onDelete('cascade');
            $table->integer('so_phien_ban');
            $table->string('tieu_de');
            $table->text('noi_dung');
            $table->string('so_chuong');
            $table->date('ngay_len_song');
            $table->enum('trang_thai',['an','hien']);
            $table->enum('kiem_duyet', ['cho_xac_nhan', 'tu_choi', 'duyet','ban_nhap']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ban_sao_chuongs');
    }
};
