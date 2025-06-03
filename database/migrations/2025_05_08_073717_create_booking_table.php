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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->date('booking_date');
            $table->integer('number_adults');
            $table->integer('number_children');
            $table->double('total_price');
            $table->string('booking_status');
            $table->string('special_requests')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
