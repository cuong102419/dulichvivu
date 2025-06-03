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
            
            $table->string('title');
            $table->string('time');
            $table->text('description');
            $table->integer('quantity');
            $table->double('price_adult');
            $table->double('price_child');
            $table->string('destination');
            $table->enum('domain', ['northern', 'central','southern']);
            $table->boolean('availability');
            $table->string('reviews')->nullable();
            $table->date('start_date');
            $table->date('end_date');

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
