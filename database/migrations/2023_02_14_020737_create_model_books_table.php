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
        Schema::create('book', function (Blueprint $table) {
            $table->increments(column:'id');
            $table->integer(column:'id_user')->unsigned();
            $table->foreign(column:'id_user')->references(column:'id')->on(table:'users')->onDelete(action:'cascade')->onUpdate(action:'cascade');
            $table->string(column:'title');
            $table->integer(column:'pages');
            $table->double(column: 'price', total: 10, places: 2);
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
        Schema::dropIfExists('book');
    }
};
