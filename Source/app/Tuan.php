<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tuan extends Model
{
    protected $table = 'Tuan';
    public $timestamps = false;

   	public function lich(){
   		return $this->hasMany('App\Lich', 'idTuan', 'id');
   	}
}
