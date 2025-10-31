<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('swipes', function (Blueprint $table) {
            $table->id();
            $table->integer('swiper_id'); // For simplicity, we'll use user_id = 1
            $table->foreignId('person_id')->constrained('people');
            $table->enum('type', ['like', 'dislike']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('swipes');
    }
};