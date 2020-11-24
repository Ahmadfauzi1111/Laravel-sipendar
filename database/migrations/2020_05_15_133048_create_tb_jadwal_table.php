<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jadwal', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal');
            $table->unsignedBigInteger('id_mhs');
            $table->unsignedBigInteger('id_dsn1')->nullable();
            $table->unsignedBigInteger('id_dsn2')->nullable();
            $table->unsignedBigInteger('id_dsn3')->nullable();
            $table->unsignedBigInteger('id_dsn4')->nullable();
            $table->string('shiftmulai');
            $table->string('shiftselesai');
            $table->string('ruang');
            $table->date('tanggal');
            $table->string('nosurat');
            $table->unsignedBigInteger('kajur')->nullable();
            $table->string('tahap')->nullable();
            $table->timestamps();
        });
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->softDeletes(); 
        });
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->foreign('id_mhs')->references('id_mahasiswa')->on('tb_mhs')->onDelete('cascade');
        });
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->foreign('id_dsn1')->references('id_dosen')->on('tb_dsn')->onDelete('cascade');
        });
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->foreign('id_dsn2')->references('id_dosen')->on('tb_dsn')->onDelete('cascade');
        });
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->foreign('id_dsn3')->references('id_dosen')->on('tb_dsn')->onDelete('cascade');
        });
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->foreign('id_dsn4')->references('id_dosen')->on('tb_dsn')->onDelete('cascade');
        });
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->foreign('kajur')->references('id_dosen')->on('tb_dsn')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->dropForeign(['id_mhs']);
        });
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->dropForeign(['id_dsn1']);
        });
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->dropForeign(['id_dsn2']);
        });
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->dropForeign(['id_dsn3']);
        });
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->dropForeign(['id_dsn4']);
        });
        Schema::dropIfExists('tb_jadwal');
    }
}
