<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'orders',
            function (Blueprint $table) {
                $table->increments('id')->unique();
                $table->string('customer_name', 32);
                $table->string('customer_phone');
                $table->integer('article');
                $table->integer('quantity');
                $table->bigInteger('order_number')->nullable(); //Возможно сдеть integer и вывод по формату
                $table->bigInteger('shipment_num')->nullable();
                $table->string('status')->default("заказать");
                $table->bigInteger('inner_order')->nullable();
                $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->text('note')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
