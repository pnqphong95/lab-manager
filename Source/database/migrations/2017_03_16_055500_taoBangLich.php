<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaoBangLich extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idGiaoVien')->unsigned();
            $table->integer('idPhong')->unsigned();
            $table->integer('idMonHoc')->unsigned();
            $table->integer('idThu')->unsigned();       
            $table->integer('idBuoi')->unsigned();
            $table->integer('idTuan')->unsigned(); 
            $table->integer('idHocKyNienKhoa')->unsigned();
            $table->string('Nhom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lich');
    }
}
