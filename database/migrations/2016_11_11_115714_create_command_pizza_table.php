<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandPizzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('command_pizza', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
           $table->text('componente');
           $table->integer('id_user');
           $table->decimal('price');
          $table->boolean("stare")->default(0); // 0-nefinisat ; 1-finisat
          
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
