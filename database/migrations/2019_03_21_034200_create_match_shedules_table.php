<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchShedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_shedules', function (Blueprint $table) {
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
            $table->boolean('status')->default(0);
            $table->boolean('end')->default(0);
            $table->text('room_id')->nullable();
            $table->text('room_pass')->nullable();
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
        Schema::dropIfExists('match_shedules');
    }
}
