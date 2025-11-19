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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->nullable()->constrained('agents')->onDelete('set null');
            $table->foreignId('unit_type_id')->nullable()->constrained('unit_types')->onDelete('set null');
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('sqm', 8, 2);
            $table->decimal('price', 15, 2);
            $table->enum('price_status', ['fixed', 'monthly'])->default('fixed');
            $table->enum('status', ['for_sale', 'for_rent', 'for_lease'])->default('for_sale');
            $table->text('location_embedded')->nullable();
            $table->foreignId('unit_location_id')->nullable()->constrained('unit_locations')->onDelete('set null');
            $table->string('barangay', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
