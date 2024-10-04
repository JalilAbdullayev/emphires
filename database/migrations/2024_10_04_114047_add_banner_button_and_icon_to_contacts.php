<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('contacts', function(Blueprint $table) {
            $table->json('banner_button')->after('banner_text')->nullable();
            $table->string('banner_icon')->after('banner_button')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('contacts', function(Blueprint $table) {
            $table->dropColumn(['banner_button', 'banner_icon']);
        });
    }
};
