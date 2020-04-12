<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendakisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendakis', function (Blueprint $table) {
            $table->id();
            $table->integer('status_kelompok');
            $table->integer('id_order');
            $table->string('nama');
            $table->string('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('janis_identitas');
            $table->string('no_identitas');
            $table->string('alamat');
            $table->string('kota_asal');
            $table->string('no_hp');
            $table->string('no_hp_lain');
            $table->string('email');
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
        Schema::dropIfExists('pendakis');
    }
}
