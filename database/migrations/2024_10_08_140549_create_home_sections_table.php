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
        Schema::create('home_sections', function (Blueprint $table) {
            $table->id();
            $table->boolean('slider')->default(1);
            $table->json('quote')->nullable();
            $table->json('quote_author')->nullable();
            $table->json('second_section_text')->nullable();
            $table->boolean('second_section')->default(1);
            $table->boolean('second_section_services')->default(1);
            $table->json('who_us_title')->nullable();
            $table->json('who_us_subtitle')->nullable();
            $table->json('who_us_text')->nullable();
            $table->unsignedTinyInteger('who_us_percent')->default(0);
            $table->json('who_us_percent_title')->nullable();
            $table->json('who_us_foot')->nullable();
            $table->json('who_us_link_title')->nullable();
            $table->boolean('who_us')->default(1);
            $table->string('who_us_img')->nullable();
            $table->json('services_title')->nullable();
            $table->json('services_subtitle')->nullable();
            $table->json('services_text')->nullable();
            $table->json('services_link_text')->nullable();
            $table->json('services_foot_text')->nullable();
            $table->json('services_foot_link_text')->nullable();
            $table->boolean('services')->default(1);
            $table->json('video_text')->nullable();
            $table->string('video_link')->nullable();
            $table->string('video_bg')->nullable();
            $table->boolean('video')->default(1);
            $table->string('skills_img')->nullable();
            $table->json('skills_text')->nullable();
            $table->boolean('skills')->default(1);
            $table->boolean('contact_form')->default(1);
            $table->json('qualities_title')->nullable();
            $table->json('qualities_subtitle')->nullable();
            $table->json('qualities_text')->nullable();
            $table->boolean('qualities_status')->default(1);
            $table->json('testimonials_title')->nullable();
            $table->json('testimonials_subtitle')->nullable();
            $table->json('testimonials_text')->nullable();
            $table->json('testimonials_link_text')->nullable();
            $table->boolean('testimonials')->default(1);
            $table->boolean('clients')->default(1);
            $table->json('courses_title')->nullable();
            $table->json('courses_subtitle')->nullable();
            $table->boolean('courses')->default(1);
            $table->boolean('contact_banner')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_sections');
    }
};
