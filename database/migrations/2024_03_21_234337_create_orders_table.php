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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('order_date');
            $table->string('invoice_num');
            $table->enum('status', ['pending', 'processing', 'completed'])->default('pending');
            $table->decimal('total_price', 10, 2)->nullable();
            $table->integer('qty');
            $table->decimal('international_fee', 10, 2)->nullable();
            $table->decimal('custom_fee', 10, 2)->nullable();
            $table->decimal('order_price', 10, 2)->nullable();
            $table->integer('return_days')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
