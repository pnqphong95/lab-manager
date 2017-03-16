<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaoBangVanDe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vande', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idPhong');
            $table->string('tomTatVD');
            $table->string('chiTietVD');
            $table->string('trangThai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vande');
    }
}
