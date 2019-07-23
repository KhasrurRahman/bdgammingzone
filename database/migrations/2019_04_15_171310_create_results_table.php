<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('participants_id')->unsigned();
            $table->bigInteger('match_id')->unsigned();
            $table->integer('k1')->default(0);
            $table->integer('k2')->default(0);
            $table->integer('k3')->default(0);
            $table->integer('k4')->default(0);
            $table->integer('w1')->default(0);
            $table->integer('w2')->default(0);
            $table->integer('w3')->default(0);
            $table->integer('w4')->default(0);
            $table->integer('total_kill')->default(0);
            $table->integer('total_win')->default(0);
            $table->integer('edited')->default(0);
            $table->foreign('participants_id')
                ->references('id')->on('participants')
                ->onDelete('cascade');
            $table->foreign('match_id')
                ->references('id')->on('match_shedules')
                ->onDelete('cascade');

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
        Schema::dropIfExists('results');
    }
}
