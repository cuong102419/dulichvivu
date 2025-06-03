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
            $table->string('google_id')->nullable();
            $table->string('email')->unique();
            $table->string('name', 50);
            $table->string('password', 60);
            $table->string('phone_number', 15)->nullable();
            $table->string('address')->nullable();
            $table->string('ip_address', 50);
            $table->enum('is_active', ['yes', 'no'])->default('no');
            $table->enum('status', ['deleted', 'banned'])->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
