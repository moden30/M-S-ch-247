<?php

use App\Models\TheLoai;
use App\Models\User;
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
        Schema::create('saches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(TheLoai::class)
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->string('ten_sach');
            $table->string('anh_bia_sach')->nullable();
            $table->unsignedBigInteger('gia_goc')->default(0);
            $table->text('tom_tat')->nullable();
            $table->date('ngay_dang');
            $table->enum('noi_dung_nguoi_lon', ['co', 'khong']);
            $table->integer('so_luong_da_ban')->default(0);
            $table->enum('kiem_duyet', ['cho_xac_nhan', 'tu_choi', 'duyet','ban_nhap']);
            $table->unsignedBigInteger('gia_khuyen_mai')->nullable()->default(0);
            $table->enum('trang_thai', ['an', 'hien']);
            $table->enum('tinh_trang_cap_nhat', ['da_full', 'tiep_tuc_cap_nhat']);
            $table->unsignedBigInteger('luot_xem')->default(0);
            $table->string('loai_sua')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saches');
    }
};
