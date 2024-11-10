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
        Schema::create('ban_sao_saches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sach_id')->constrained('saches')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('the_loai_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('so_phien_ban');
            $table->string('ten_sach');
            $table->string('anh_bia_sach')->nullable();
            $table->unsignedBigInteger('gia_goc')->default(0);
            $table->unsignedBigInteger('gia_khuyen_mai')->default(0);
            $table->text('tom_tat')->nullable();
            $table->enum('noi_dung_nguoi_lon', ['co', 'khong']);
            $table->enum('tinh_trang_cap_nhat', ['da_full', 'tiep_tuc_cap_nhat']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ban_sao_saches');
    }
};
