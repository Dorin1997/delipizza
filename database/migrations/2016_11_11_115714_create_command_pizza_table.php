<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandPizzaTable extends Migration
{
    /**
     * Run the migrations.
     * shoping cart table
     * @return void
     */
    public function up()
    {
       Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('product_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('cantitate')->default(1);
            $table->char('marime',10);
            $table->char('blat',10);
            $table->longText('description');
            $table->integer('stare')->default(0);
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
        //
    }
}
