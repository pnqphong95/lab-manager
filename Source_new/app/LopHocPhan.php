<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LopHocPhan extends Model
{
    protected $table = 'LopHocPhan';
    public $timestamps = false;

    public function lich(){
    	return $this->hasMany('App\Lich', 'idLopHocPhan', 'id');
    }

    public function monhoc(){
    	return $this->belongsTo('App\MonHoc', 'idLopHocPhan', 'id');
    }
}
