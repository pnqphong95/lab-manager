<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaoBangHopThu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('hopthu');
        Schema::create('hopthu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TieuDe');
            $table->text('NoiDung');
            $table->integer('NguoiGui')->unsigned();
            $table->integer('NguoiNhan')->unsigned();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hopthu');
    }
}
