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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->float('total');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('cupom_id')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('products');
            $table->foreign('cupom_id')->references('id')->on('cupoms');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
