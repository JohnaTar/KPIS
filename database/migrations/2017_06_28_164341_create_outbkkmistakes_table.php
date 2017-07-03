<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutbkkmistakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outbkkmistakes', function (Blueprint $table) {
            $table->increments('bkk_id');
            $table->date('date');
            $table->string('mistake');
            $table->string('notice')->nullable();
            $table->string('mis_id');
            $table->string('user_id');
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
        Schema::dropIfExists('outbkkmistakes');
    }
}
