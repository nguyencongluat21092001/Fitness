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
        Schema::create('buy_signal', function (Blueprint $table) {
            $table->uuid('id')->primary(); // ví dụ : B8692034-8AF0-4FBA-A13A-0B85D98850BA
            $table->uuid('user_id'); // người thêm  
            $table->string('title')->nullable(); // -  ví dụ MUA XXX 20% NAV (tài sản)
            $table->string('type')->nullable(); // (có 2 loại 1.Mua (code category = MUA và BAN )) - ví dụ : Mua
            $table->string('target')->nullable(); // mục tiêu (vachar) - ví dụ (60 - 62 - 64)
            $table->string('stop_loss')->nullable(); // dừng lỗ -  ví dụ (  54-55.6)
            $table->integer('order')->nullable(); // thu tu
            $table->string('status')->nullable(); // trạng thai (on off)
            $table->timestamps(); //  ngày thêm , sửa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_signal');
    }
};
