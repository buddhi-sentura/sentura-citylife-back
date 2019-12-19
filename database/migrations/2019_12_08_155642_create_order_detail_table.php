<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('order_detail', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->bigInteger('order_id')->unsigned();
//            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');
//            $table->string('item_code')->unsigned();
//            $table->foreign('item_code')->references('item_code')->on('item')->onDelete('cascade');
//            $table->integer('qty');
//            $table->timestamps();
//        });

        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('order_id');
//            $table->primary(['order_id','item_code']);
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');

            $table->string('item_code');
            $table->foreign('item_code')
                ->references('item_code')
                ->on('item')
                ->onDelete('cascade');
            $table->integer('qty');

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
        Schema::dropIfExists('order_detail');
    }
}
