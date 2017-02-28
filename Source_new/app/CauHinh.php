<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHinh extends Model
{
    protected $table = 'CauHinh';
    public $timestamps = false;

    public function phong(){
    	return $this->hasMany('App\Phong', 'idCauHinh', 'id');
    }
}
