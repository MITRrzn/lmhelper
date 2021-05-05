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
                $table->integer('article')->unsigned();
                $table->integer('quantity')->unsigned();
                $table->bigInteger('order_number')->nullable()->unsigned();
                $table->bigInteger('shipment_num')->nullable()->unsigned();
                $table->tinyInteger('status')->unsigned()->default(1);
                $table->bigInteger('inner_order')->unsigned();
                $table->string('created_by', 32)->nullable();
                $table->integer("departmentID")->nullable()->unsigned();
                $table->boolean('is_show')->default(1)->unsigned();
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
