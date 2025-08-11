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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained();
            $table->foreignId('departure_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('admin_id')->nullable()->constrained();

            $table->string('code')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('number_adults');
            $table->integer('number_children')->default(0);
            $table->decimal('price_adult');
            $table->decimal('price_child')->default(0);
            $table->decimal('total_price');
            $table->string('payment_method');
            $table->string('payment_status')->default('unpaid');
            $table->string('status')->default('pending');
            $table->string('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
