<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('teams', function(Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->json('position')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedTinyInteger('order')->default(1);
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('teams');
    }
};
