<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TaiKhoan extends Model
{
    protected $table = 'TaiKhoan';
    public $timestamps = false;

    public static function find($taikhoan){
    	$tk = new TaiKhoan();
    	$tk = DB::table('TaiKhoan')->where('MaGV', $taikhoan)->first();
    	return $tk;
    }

    public static function add($taikhoan){
    	$tk = new TaiKhoan();
    	$tk->MaGV = $taikhoan;
    	$tk->MatKhau = password_hash('000000', PASSWORD_DEFAULT);
    	$tk->KichHoat = 0;
    	$tk->save();
    }

    public static function xoa($taikhoan){
    	DB::table('TaiKhoan')->where('MaGV', $taikhoan)->delete();
    }

    public static function kichhoat(){
    	
    }
}
