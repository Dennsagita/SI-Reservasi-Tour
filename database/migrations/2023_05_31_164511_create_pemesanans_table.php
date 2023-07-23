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
            $table->time('jam_datang');
            $table->string('lokasi_penjemputan');
            $table->binary('bukti_dp');
            $table->enum('status_pemesanan', ['diterima', 'batal', 'baru', 'selesai', 'pergantian-pengemudi']);
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
