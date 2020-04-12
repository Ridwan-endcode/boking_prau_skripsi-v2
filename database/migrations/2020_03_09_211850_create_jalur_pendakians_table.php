<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJalurPendakiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalur_pendakians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jalur');
            $table->string('tgl_jadwal');
            $table->integer('harga')->length(20);
            $table->integer('kuota')->length(20);
            $table->integer('status_jadwal');
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
        Schema::dropIfExists('jalur_pendakians');
    }
}
