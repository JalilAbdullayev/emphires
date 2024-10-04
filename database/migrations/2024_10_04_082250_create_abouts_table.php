<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('abouts', function(Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->boolean('services_status')->default(1);
            $table->json('services_title')->nullable();
            $table->json('services_subtitle')->nullable();
            $table->json('services_description')->nullable();
            $table->json('specialties_title')->nullable();
            $table->json('specialties_subtitle')->nullable();
            $table->json('specialties_button')->nullable();
            $table->json('specialties_card')->nullable();
            $table->string('specialties_bg')->nullable();
            $table->boolean('specialties_status')->default(1);
            $table->boolean('team_status')->default(1);
            $table->json('team_title')->nullable();
            $table->json('team_subtitle')->nullable();
            $table->json('banner_text')->nullable();
            $table->json('banner_button')->nullable();
            $table->boolean('banner_status')->default(1);
            $table->string('banner_bg')->nullable();
            $table->boolean('testimonials_status')->default(1);
            $table->json('testimonials_title')->nullable();
            $table->json('testimonials_subtitle')->nullable();
            $table->string('testimonials_img')->nullable();
            $table->integer('testimonials_number')->default(0);
            $table->json('testimonials_img_title')->nullable();
            $table->boolean('contact_banner_status')->default(1);
            $table->string('background')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('bg_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('abouts');
    }
};
