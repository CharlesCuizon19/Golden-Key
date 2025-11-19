<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unit_locations', function (Blueprint $table) {
            $table->id();
            $table->string('province', 100); // limit length to 100 chars
            $table->string('city', 100);
            $table->string('zip_code', 10); // enough for most zip codes
            $table->string('image')->nullable(); // nullable in case no image
            $table->timestamps();

            // Indexes for faster searching
            $table->index('province');
            $table->index('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_locations');
    }
};
