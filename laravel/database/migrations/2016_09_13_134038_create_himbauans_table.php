<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHimbauansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('himbauans', function (Blueprint $table) {
            $table->increments('id_himbauan');
            $table->text('rt_id')->nullable();
            $table->string('nm_himbauan',50)->nullable();
            $table->date('tanggal')->nullable();
            $table->integer('jam')->nullable();
            $table->string('catatan')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('himbauans');
    }
}
