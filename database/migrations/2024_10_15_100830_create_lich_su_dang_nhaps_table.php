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
        Schema::create('lich_su_dang_nhaps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tai_khoan_id')->constrained('users')->onDelete('cascade');
            $table->string('ten_thiet_bi');
            $table->string('dia_chi_ip')->nullable();
            $table->string('trinh_duyet')->nullable();
            $table->string('he_dieu_hanh')->nullable();
            $table->timestamp('login_time');
            $table->timestamp('logout_time')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('dia_diem')->nullable();
            $table->string('loai_thiet_bi')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_su_dang_nhaps');
    }
};
