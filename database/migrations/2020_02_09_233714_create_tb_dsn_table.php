<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDsnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_dsn', function (Blueprint $table) {
            $table->bigIncrements('id_dosen');
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('email');
            $table->string('status');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->timestamps();
        });
        Schema::table('tb_dsn', function (Blueprint $table) {
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
        Schema::table('tb_dsn', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('tb_dsn');
    }
}
