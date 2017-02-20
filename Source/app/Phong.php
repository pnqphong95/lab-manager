<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    protected $table = 'Phong';
    public $timestamps = false;

    public function phong_phanmem(){
    	return $this->hasMany('App\Phong_PhanMem', 'idPhong', 'id');
    }

    public function lich(){
    	return $this->hasMany('App\Lich', 'idPhong', 'id');
    }
}
