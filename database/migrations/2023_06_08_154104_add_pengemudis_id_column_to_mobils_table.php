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
        Schema::table('mobils', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pengemudi')->required()->after('id');
            $table->foreign('id_pengemudi')->references('id')->on('pengemudis')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->dropForeign(['id_pengemudi']);
            $table->dropColumn('id_pengemudi');
        });
    }
};
