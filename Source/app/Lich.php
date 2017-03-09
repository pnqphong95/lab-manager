<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lich extends Model
{
    protected $table = 'Lich';
    public $timestamps = false;

    public function giaovien(){
    	return $this->belongsTo('App\GiaoVien', 'idGiaoVien', 'id');
    }

    public function monhoc(){
    	return $this->belongsTo('App\MonHoc', 'idMonHoc', 'id');
    }

    public function thu(){
    	return $this->belongsTo('App\Thu', 'idThu', 'id');
    }

    public function tuan(){
        return $this->belongsTo('App\Tuan', 'idTuan', 'id');
    }

    public function phong(){
    	return $this->belongsTo('App\Phong', 'idPhong', 'id');
    }

    public function buoi() {
        return $this->belongsTo('App\Buoi', 'idBuoi', 'id');
    }
}
