<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jadwal');
            $table->integer('id_jalur');
            $table->integer('id_pendaki');
            $table->string('tgl_turun');
            $table->integer('harga');
            $table->integer('status_bayar');
            $table->string('nama_kelompok');
            $table->string('token_pendakian');
            $table->string('session_id');
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
        Schema::dropIfExists('orders');
    }
}
