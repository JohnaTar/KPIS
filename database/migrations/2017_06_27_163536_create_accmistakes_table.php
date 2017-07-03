<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccmistakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accmistakes', function (Blueprint $table) {
            $table->increments('acc_id');
            $table->date('date');
            $table->string('mistake');
            $table->string('notice')->nullable();
            $table->string('mis_id');
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
        Schema::dropIfExists('accmistakes');
    }
}
