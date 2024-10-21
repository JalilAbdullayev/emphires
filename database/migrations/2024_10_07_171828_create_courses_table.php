<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('slug')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('author_id')->constrained('users');
            $table->json('description')->nullable();
            $table->json('text')->nullable();
            $table->json('keywords')->nullable();
            $table->string('image')->nullable();
            $table->string('background')->nullable();
            $table->string('video_link')->nullable();
            $table->boolean('bg_status')->default(1);
            $table->boolean('status')->default(1);
            $table->unsignedTinyInteger('order')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
