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
        Schema::create('user_saches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->foreignIdFor(\App\Models\Sach::class)
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->foreignIdFor(\App\Models\Chuong::class)
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->unsignedInteger('so_chuong_da_doc')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_saches');
    }
};
