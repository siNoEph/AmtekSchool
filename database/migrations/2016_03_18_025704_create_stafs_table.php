<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStafsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stafs', function (Blueprint $table){
            $table->increments('id');
            $table->string('nama');
            $table->string('foto');
            $table->string('nip');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->tinyInteger('jenis_kelamin');
            $table->string('jabatan');
            $table->string('tugas_pokok');
            $table->string('agama');
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
        Schema::drop('stafs');
    }
}
