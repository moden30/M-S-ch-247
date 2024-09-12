<?php

use App\Models\KhuyenMai;
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
        Schema::create('khuyen_mai_saches', function (Blueprint $table) {
            $table->foreignIdFor(KhuyenMai::class)->constrained();
            $table->foreignIdFor(Sach::class)->constrained();
            $table->primary('sach_id','khuyen_mai_id');
            $table->bigInteger('gia_sau_khuyen_mai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khuyen_mai_saches');
    }
};
