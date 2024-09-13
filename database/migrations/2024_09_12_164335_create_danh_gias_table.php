<?php

use App\Models\Sach;
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
        Schema::create('danh_gias', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sach::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->text('noi_dung');
            $table->date('ngay_danh_gia');
            $table->enum('muc_do_hai_long',['Rất hay','Hay','Trung bình','Tệ','Rất tệ']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gias');
    }
};
