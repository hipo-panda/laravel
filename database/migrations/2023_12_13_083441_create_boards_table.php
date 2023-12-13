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
        Schema::create('boards', function (Blueprint $table) {
            $table->id('board_id');
            $table->string('name');
            $table->string('board_title');
            $table->longText('board_content');
            $table->longText('board_ingredients');
            $table->longText('board_cooking_orders');
            $table->string('board_category'); // 카테고리
            $table->string('board_tags')->nullable(); // 태그
            $table->string('board_image')->nullable(); // 대표 사진
            $table->timestamp('created_at');
            $table->timestamp('updated_at');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boards');
    }
};
