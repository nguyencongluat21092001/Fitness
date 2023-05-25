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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('code_cp')->nullable(); // Mã cổ phiếu
            $table->string('code_category')->nullable(); // Nhóm ngành
            $table->string('percent_of_assets')->nullable(); // Phần trăm tài sản
            $table->string('price')->nullable(); // Giá mua
            $table->string('price_range')->nullable(); // Vùng giá mục tiêu
            $table->string('current_price')->nullable(); // Giá hiện tại
            $table->string('profit_and_loss')->nullable(); // Lãi và lỗ
            $table->text('act')->nullable(); // Khuyến nghị hành động
            $table->string('stop_loss')->nullable(); // Dừng lỗ
            $table->string('closing_percentage')->nullable(); // Phần trăm chốt
            $table->text('note')->nullable(); // Ghi chú
            $table->tinyInteger('status')->nullable(); // Trạng thái
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
