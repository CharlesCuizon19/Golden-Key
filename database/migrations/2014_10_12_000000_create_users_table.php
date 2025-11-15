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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->nullable(); // role_id column
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // Foreign key to user_roles table
            $table->foreign('role_id')
                ->references('id')
                ->on('user_roles')
                ->nullOnDelete(); // if role is deleted → set null
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
