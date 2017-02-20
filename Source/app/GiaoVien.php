<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoVien extends Model
{
    protected $table = 'GiaoVien';
    public $timestamps = false;

    public function bomon(){
    	return $this->belongsTo('App\GiaoVien', 'idBoMon', 'id');
    }

    public function giaovien_chucvu(){
    	return $this->hasMany('App\GiaoVien_ChucVu', 'idGiaoVien', 'id');
    }

    public function lich(){
    	return $this->hasMany('App\Lich', 'idGiaoVien', 'id');
    }
}
