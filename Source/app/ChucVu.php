<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = 'ChucVu';
    public $timestamps = false;

    public function giaovien(){
    	return $this->hasMany('App\GiaoVien', 'idChucVu', 'id');
    }
}
