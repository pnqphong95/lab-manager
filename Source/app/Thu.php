<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thu extends Model
{
	protected $table = 'Thu';
    public $timestamps = false;

   	public function lich(){
   		return $this->hasMany('App\Lich', 'idThu', 'id');
   	}
}
