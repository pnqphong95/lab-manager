<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoMon extends Model
{
    protected $table = 'BoMon';
    public $timestamps = false;

    public function giaovien(){
    	return $this->hasMany('App\GiaoVien', 'idBoMon', 'id');
    }
}
