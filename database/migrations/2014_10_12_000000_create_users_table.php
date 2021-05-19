<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'users',
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('usergroup')->default("ven");
                $table->integer('LDAP')->unsigned(); // LDAP пользователя
                $table->integer('departmentID')->unsigned(); // номер отдела
                $table->tinyInteger('shopID')->unsigned(); // Номер магазина
                $table->tinyInteger('regionID')->unsigned(); //Номер региона
                $table->integer('order_id')->unsigned()->nullable();
                $table->foreign('order_id')->references('id')->on('orders');
                $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
