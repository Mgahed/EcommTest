<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            // unit price
            $table->decimal('unit_price', 8, 2);
            // quantity
            $table->integer('quantity');
            // discount
            $table->decimal('discount', 8, 2);
            // order
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade');
            // product
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
