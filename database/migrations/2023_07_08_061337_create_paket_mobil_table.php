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
        Schema::create('paket_mobil', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paket');
            $table->unsignedBigInteger('id_mobil');
            $table->boolean('konfirmasi')->default(false);
            $table->timestamps();

            $table->foreign('id_paket')->references('id')->on('pakets')->onDelete('cascade');
            $table->foreign('id_mobil')->references('id')->on('mobils')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paket_mobil', function (Blueprint $table) {
            $table->dropForeign(['id_paket']);
            $table->dropForeign(['id_mobil']);
        });
        Schema::dropIfExists('paket_mobil');
    }
};
