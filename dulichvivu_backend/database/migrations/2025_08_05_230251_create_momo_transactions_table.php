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
        Schema::create('momo_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->string('request_id')->unique();
            $table->string('trans_id')->nullable();
            $table->string('order_type')->nullable();
            $table->string('pay_type')->nullable();
            $table->bigInteger('amount');
            $table->string('result_code');
            $table->string('message')->nullable();
            $table->string('signature')->nullable();
            $table->timestamp('response_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('momo_transactions');
    }
};
