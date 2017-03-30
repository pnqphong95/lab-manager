<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $table = 'MonHoc';
    public $timestamps = false;


    public function lich(){
    	return $this->hasMany('App\Lich', 'idMonHoc', 'id');
    }

    public function monhoc_phanmem(){
    	return $this->hasMany('App\MonHoc_PhanMem', 'idMonHoc', 'id');
    }
}
