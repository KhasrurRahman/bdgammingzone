<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOldMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('date');
            $table->string('time');
            $table->integer('entry_fee');
            $table->integer('per_kill');
            $table->integer('winner');
            $table->integer('join')->nullable();
            $table->integer('map');
            $table->integer('type');
            $table->integer('platform');
            $table->string('version');
            $table->string('weapon');
            $table->string('t');
            $table->string('link');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('old_matches');
    }
}
