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
        Schema::create('paypal_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');
            $table->string('trans_id')->unique()->nullable();
            $table->string('payer_id');
            $table->string('payer_email');
            $table->string('payer_name')->nullable();
            $table->string('country_code', 2)->nullable();
            $table->string('status');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 5)->default('USD');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paypal_transactions');
    }
};
