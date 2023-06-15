<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_tour_mulai');
            $table->date('tgl_tour_selesai');
            $table->date('tgl_berangkat');
            $table->dateTime('jam_datang');
            $table->string('lokasi_penjemputan', 200)->require();
            $table->integer('jml_penumpang')->require();
            $table->binary('bukti_dp');
            $table->enum('status_pemesanan', ['diterima', 'batal']);
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
        Schema::dropIfExists('pemesanans');
    }
};
