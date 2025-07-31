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
        Schema::create('pending_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained();
            $table->foreignId('departure_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->date('start_date');
            $table->date('end_date');
            $table->integer('number_adults');
            $table->integer('number_children')->default(0);
            $table->decimal('price_adult');
            $table->decimal('price_child')->default(0);
            $table->double('total_price');
            $table->string('payment_method');
            $table->string('note');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_bookings');
    }
};
