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
        Schema::create('pemesanan_batal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemesanan');
            $table->text('keterangan');
            $table->timestamps();
        
            $table->foreign('id_pemesanan')->references('id')->on('pemesanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemesanan_batal', function (Blueprint $table) {
            $table->dropForeign(['id_pemesanan']);
        });
        
        Schema::dropIfExists('pemesanan_batal');
    }
};
