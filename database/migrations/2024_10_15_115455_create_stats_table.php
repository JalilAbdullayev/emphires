<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('stats', function(Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->unsignedSmallInteger('count')->default(1);
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
        Schema::dropIfExists('stats');
    }
};
