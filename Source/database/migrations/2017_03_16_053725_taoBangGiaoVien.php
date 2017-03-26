<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaoBangGiaoVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giaovien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MaGV');
            $table->string('HoGV');
            $table->string('TenGV');
            $table->date('NgaySinh');
            $table->boolean('GioiTinh');
            $table->string('SDT');
            $table->integer('idBoMon')->unsigned();
            $table->string('password');
            $table->boolean('KichHoat');
            $table->integer('idChucVu')->unsigned();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giaovien');
    }
}
