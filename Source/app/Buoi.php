<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buoi extends Model
{
    protected $table = 'Buoi';
    public $timestamps = false;

    public function lich(){
    	return $this->hasMany('App\Lich', 'idBuoi', 'id');
    }

}
