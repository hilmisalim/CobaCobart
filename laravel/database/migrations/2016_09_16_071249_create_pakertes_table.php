<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePakertesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakertes', function (Blueprint $table) {
            $table->increments('rt_id');
            $table->string('nm_rt',100)->nullable();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->string('kelurahan',50)->nullable();
            $table->string('kecamatan',50)->nullable();
            $table->string('provinsi',50)->nullable();
            $table->string('kota',50)->nullable();
            $table->string('email',100)->nullable();
            $table->string('password',255)->nullable();
            $table->string('remember_token',100)->nullable();
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
        Schema::dropIfExists('pakertes');
    }
}
