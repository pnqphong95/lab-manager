<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanMem extends Model
{
    protected $table = 'PhanMem';
    public $timestamps = false;

    public function phong_phanmem(){
    	return $this->hasMany('App\Phong_PhanMem', 'idPhanMem', 'id');
    }

    public function monhoc_phanmem(){
    	return $this->hasMany('App\MonHoc_PhanMem', 'idPhanMem', 'id');
    }
}
