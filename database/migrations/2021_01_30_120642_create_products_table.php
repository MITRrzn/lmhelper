<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'products',
            function (Blueprint $table) {
                $table->increments('id')->unique();
                $table->integer('article')->unique()->unsigned();
                $table->string('name');
                $table->bigInteger('EAN')->unsigned();
                $table->bigInteger('plant_id')->unsigned();
                $table->string('plant_name');
                $table->integer('product_id')->unsigned();
                $table->integer('departmentID')->unsigned();
                $table->foreign('product_id')->references('id')->on('orders');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
