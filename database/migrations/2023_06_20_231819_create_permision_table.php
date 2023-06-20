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
        Schema::create('permision', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name_permision');
            $table->string('cate_code');
            $table->string('CV_ADMIN');
            $table->string('CV_PRO');
            $table->string('CV_BASIC');
            $table->string('SALE_ADMIN');
            $table->string('SALE_BASIC');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permision');
    }
};
