<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = 'ChucVu';
    public $timestamps = false;

    public function giaovien_chucvu(){
    	return $this->hasMany('App\GiaoVien_ChucVu', 'idChucVu', 'id');
    }
}
