<?php

use App\Models\DanhGia;
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
        Schema::create('phan_hoi_danh_gias', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DanhGia::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->text('noi_dung_phan_hoi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phan_hoi_danh_gias');
    }
};
