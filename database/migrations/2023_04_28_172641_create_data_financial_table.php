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
        Schema::create('data_financial', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('code_cp'); // mã cp
            $table->string('exchange'); //sàn gao dịch
            $table->string('code_category'); //nhóm ngành HĐKD
            $table->string('ratings_TA'); // xếp hạng TA
            $table->string('identify_trend'); //nhận định TA -xu hướng CP
            $table->string('act'); //Hành động
            $table->string('trading_price_range'); // Vùng giá giao dịch
            $table->string('stop_loss_price_zone');// Vùng giá cắt lỗ
            $table->string('ratings_FA'); // xếp hạng FA
            $table->string('url_link'); // phân tích DN FA
            $table->string('status'); // trạng thái
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_financial');
    }
};
