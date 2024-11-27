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
        Schema::create('contributor_commission_earnings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('id_don_hang')->constrained('don_hangs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->decimal('commission_amount', 15, 2); // Số tiền hoa hồng
            $table->decimal('commission_rate', 5, 2); // Tỷ lệ hoa hồng tại thời điểm
            $table->decimal('admin_earnings', 15, 2)->nullable(); // Tiền admin nhận
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributor_commission_earnings');
    }
};
