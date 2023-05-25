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
        Schema::create('effectiveness', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('code_cp')->nullable(); // Mã cổ phiếu
            $table->string('code_category')->nullable(); // Nhóm ngành
            $table->string('percent_of_assets')->nullable(); // Phần trăm tài sản
            $table->string('closing_percentage')->nullable(); // Phần trăm chốt
            $table->string('price')->nullable(); // Giá mua
            $table->dateTime('date_close')->nullable(); // Ngày chốt
            $table->string('price_close')->nullable(); // Giá chốt
            $table->string('profit_and_loss')->nullable(); // Lãi và lỗ
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
        Schema::dropIfExists('effectiveness');
    }
};
