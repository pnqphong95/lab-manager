<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonHoc_PhanMem extends Model
{
    protected $table = 'MonHoc_PhanMem';
    public $timestamps = false;

    public function monhoc(){
    	return $this->belongsTo('App\MonHoc_PhanMem', 'idMonHoc', 'id');
    }

    public function phanmem(){
    	return $this->belongsTo('App\MonHoc_PhanMem', 'idPhanMem', 'id');
    }

}
