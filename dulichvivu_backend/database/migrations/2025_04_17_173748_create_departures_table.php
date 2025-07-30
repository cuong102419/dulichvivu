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
        Schema::create('departures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained();

            $table->date('start_date');
            $table->date('end_date');
            $table->time('departure_time')->nullable();
            $table->double('price_adult');
            $table->double('price_child');
            $table->integer('capacity');
            $table->integer('booked')->default(0);
            $table->enum('status', ['open', 'closed', 'cancelled'])->default('open');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departures');
    }
};
