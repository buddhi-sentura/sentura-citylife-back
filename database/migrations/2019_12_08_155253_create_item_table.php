<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_code');
            $table->string('item_name');
            $table->double('item_price',15,2);
            $table->integer('item_qty');
            $table->string('item_description');
            $table->double('discount',15,2);
            $table->boolean('active_flag');
            $table->date('current_date');
            $table->integer('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade');
            $table->integer('sub_category_id');
            $table->foreign('sub_category_id')
                ->references('id')
                ->on('sub_category')
                ->onDelete('cascade');
//            $table->integer('size_id');
//            $table->foreign('size_id')
//                ->references('id')
//                ->on('size')
//                ->onDelete('cascade');
//            $table->integer('color_id');
//            $table->foreign('color_id')
//                ->references('id')
//                ->on('colors')
//                ->onDelete('cascade');
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
        Schema::dropIfExists('item');
    }
}
