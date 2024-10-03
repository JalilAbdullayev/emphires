<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('contacts', function(Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->json('work_hours')->nullable();
            $table->text('map')->nullable();
            $table->json('address')->nullable();
            $table->json('title')->nullable();
            $table->json('form_title')->nullable();
            $table->json('form_subtitle')->nullable();
            $table->json('form_description')->nullable();
            $table->boolean('form_status')->default(1);
            $table->json('banner_text')->nullable();
            $table->boolean('banner_status')->default(1);
            $table->string('background')->nullable();
            $table->boolean('bg_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('contacts');
    }
};
