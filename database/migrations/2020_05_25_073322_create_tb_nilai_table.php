<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_nilai', function (Blueprint $table) {
            $table->bigIncrements('id_nilai');
            $table->unsignedBigInteger('id_mhs');
            $table->unsignedBigInteger('id_dsn');
            $table->unsignedBigInteger('jadwal_id');
            $table->string('nilai1');
            $table->string('nilai2');
            $table->string('nilai3');
            $table->string('nilai4');
            $table->timestamps();
        });
        Schema::table('tb_nilai', function (Blueprint $table) {
            $table->softDeletes(); 
        });
        Schema::table('tb_nilai', function (Blueprint $table) {
            $table->foreign('id_mhs')->references('id_mahasiswa')->on('tb_mhs')->onDelete('cascade');
        });
        Schema::table('tb_nilai', function (Blueprint $table) {
            $table->foreign('id_dsn')->references('id_dosen')->on('tb_dsn')->onDelete('cascade');
        });
        Schema::table('tb_nilai', function (Blueprint $table) {
            $table->foreign('jadwal_id')->references('id_jadwal')->on('tb_jadwal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_nilai', function (Blueprint $table) {
            $table->dropForeign(['id_mhs']);
        });
        Schema::table('tb_nilai', function (Blueprint $table) {
            $table->dropForeign(['id_dsn']);
        });
        Schema::table('tb_nilai', function (Blueprint $table) {
            $table->dropForeign(['jadwal_id']);
        });
        Schema::dropIfExists('tb_nilai');
    }
}
