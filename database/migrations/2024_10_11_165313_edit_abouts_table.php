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
        Schema::table('abouts', function (Blueprint $table) {
            $table->unsignedSmallInteger('year')->nullable()->after('bg_status');
            $table->boolean('testimonials_img_card_status')->default(1)->after('testimonials_img');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn(['year', 'testimonials_img_card_status']);
        });
    }
};
