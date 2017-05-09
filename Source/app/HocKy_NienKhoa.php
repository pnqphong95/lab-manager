<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocKy_NienKhoa extends Model
{
    protected $table = 'HocKy_NienKhoa';
    public $timestamps = false;

    public function lich(){
    	return $this->hasMany('App\Lich', 'idHocKyNienKhoa', 'id');
    }

    public function lich_choduyet(){
    	return $this->hasMany('App\Lich_ChoDuyet', 'idHocKyNienKhoa', 'id');
    }
}
