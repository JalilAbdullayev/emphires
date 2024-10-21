<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('home_sections', function(Blueprint $table) {
            $table->json('phone_title')->nullable()->after('contact_banner');
            $table->json('contact_title')->nullable()->after('phone_title');
            $table->json('contact_subtitle')->nullable()->after('contact_title');
            $table->boolean('who_us_img_card_status')->default(1)->after('who_us_img');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('home_sections', function(Blueprint $table) {
            $table->dropColumn(['phone_title', 'contact_title', 'contact_subtitle', 'who_us_img_card_status']);
        });
    }
};
