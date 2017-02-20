<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phong_PhanMem extends Model
{
    protected $table = 'Phong_PhanMem';
    public $timestamps = false;

    public function phong(){
    	return $this->belongsTo('App\Phong_PhanMem', 'idPhong', 'id');
    }

    public function phanmem(){
    	return $this->belongsTo('App\Phong_PhanMem', 'idPhanMem', 'id');
    }
}
