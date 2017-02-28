<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoVien_ChucVu extends Model
{
    protected $table = 'GiaoVien_ChucVu';
    public $timestamps = false;

    public function giaovien(){
    	return $this->belongsTo('App\GiaoVien_ChucVu', 'idGiaoVien', 'id');
    }

    public function chucvu(){
    	return $this->belongsTo('App\GiaoVien_ChucVu', 'idChucVu', 'id');
    }
}
