<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItmistakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itmistakes', function (Blueprint $table) {
            $table->increments('it_id');
            $table->date('date');
            $table->string('mistake');
            $table->string('notice')->nullable();
            $table->string('add_id');
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
        Schema::dropIfExists('itmistakes');
    }
}
