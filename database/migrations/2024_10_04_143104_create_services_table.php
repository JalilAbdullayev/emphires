<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('services', function(Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->json('title')->nullable();
            $table->json('slug')->nullable();
            $table->json('description')->nullable();
            $table->json('text')->nullable();
            $table->json('keywords')->nullable();
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->string('background')->nullable();
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
    public function down(): void {
        Schema::dropIfExists('services');
    }
};
