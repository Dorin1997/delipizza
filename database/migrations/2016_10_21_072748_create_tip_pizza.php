<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipPizza extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tip_pizza', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
           $table->text('ingrediente');
           $table->decimal('price');
          $table->boolean("stare")->default(0); // 0-nefinisat ; 1-finisat
           $table->string('image')->nullable();
            });
    }

   
    public function down()
    {
         Schema::drop('tip_pizza');
    }
}
