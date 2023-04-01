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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_product');
            $table->foreignId('id_user');
            $table->foreignId('id_order');
            $table->float('price');
            $table->integer('quantity');
            $table->float("total_price");
            $table->dateTime("date");
            $table->enum("status", ["processing", "ready", "send"])->default("processing");
            $table->timestamps();

            $table->foreign('id_product')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('id_user')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('id_order')->references('id')->on('orders')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
