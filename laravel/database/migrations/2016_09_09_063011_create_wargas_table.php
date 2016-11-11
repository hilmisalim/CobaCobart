<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->string('nik_warga',11);
            $table->string('rt_id',10)->nullable();
            $table->string('no_kk',11)->nullable();
            $table->string('nm_lengkap',50)->nullable();
            $table->string('nm_ayah',50)->nullable();
            $table->string('nm_ibu',50)->nullable();
            $table->string('jns_kelamin',10)->nullable();
            $table->string('tmp_lahir',50)->nullable();
            $table->date('tgl_lahir')->nullable()->default(null);
            $table->string('agama',50)->nullable();
            $table->string('pendidikan',50)->nullable();
            $table->string('pekerjaan',100)->nullable();
            $table->string('sts_perkawinan',20)->nullable();
            $table->string('sts_dlm_keluarga',20)->nullable();
            $table->string('kewarganegaraan',50)->nullable();
            $table->string('no_paspor',50)->nullable();
            $table->string('no_kitas',50)->nullable();
            $table->string('alm_sekarang',100)->nullable();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->string('kd_pos',10)->nullable()->default(null);
            $table->string('kelurahan',20)->nullable();
            $table->string('kecamatan',20)->nullable();
            $table->string('kota',50)->nullable();
            $table->string('provinsi',50)->nullable();
            $table->string('alm_asal',100)->nullable();
            $table->string('email',50)->nullable();
            $table->string('no_hp')->nullable()->default(null);
            $table->string('sts_kependudukan',20)->nullable();
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
        Schema::dropIfExists('wargas');
    }
}
