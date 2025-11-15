<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unit_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Optional: seed initial types
        DB::table('unit_types')->insert([
            ['name' => 'House & Lot'],
            ['name' => 'Condominium'],
            ['name' => 'Office Space'],
            ['name' => 'Resort Villa'],
            ['name' => 'Apartment'],
            ['name' => 'Townhouse'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_types');
    }
};
