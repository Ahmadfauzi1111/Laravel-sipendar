<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mhs', function (Blueprint $table) {
            $table->bigIncrements('id_mahasiswa');
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->string('nim')->unique();
            $table->char('Angkatan')->nullable();
            $table->char('semester')->nullable();
            $table->year('tahun')->nullable();
            $table->string('email')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pembimbing1')->nullable();
            $table->string('pembimbing2')->nullable();
            $table->string('pembimbingakademik')->nullable();
            $table->string('judulta')->nullable();
            $table->string('file1')->nullable();
            $table->string('file2')->nullable();
            $table->string('tahap')->nullable();
            $table->string('alasan')->nullable();
            $table->timestamps();
        });
        Schema::table('tb_mhs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_mhs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('tb_mhs');
    }
}
