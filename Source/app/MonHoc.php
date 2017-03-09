<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $table = 'MonHoc';
    public $timestamps = false;

    public function lophocphan(){
    	return $this->hasMany('App\LopHocPhan', 'idMonHoc', 'id');
    }

    public function lich(){
    	return $this->hasMany('App\Lich', 'idMonHoc', 'id');
    }
}
