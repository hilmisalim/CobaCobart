<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('rt_id')->unique();
            $table->string('nm_rt',100)->nullable();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->string('kelurahan',50)->nullable();
            $table->string('kecamatan',50)->nullable();
            $table->string('provinsi',50)->nullable();
            $table->string('kota',50)->nullable();
            $table->string('email',100)->nullable();
            $table->string('password',255)->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sessions');
    }
}
