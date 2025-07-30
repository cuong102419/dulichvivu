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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            
            $table->string('code')->unique();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('duration');
            $table->text('description');
            $table->text('rules');
            $table->integer('total_day');
            $table->string('destination');
            $table->string('departure_location');
            $table->string('area');
            $table->string('reviews')->nullable();
            $table->string('type');
            $table->enum('status', ['pending', 'active', 'inactive'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
