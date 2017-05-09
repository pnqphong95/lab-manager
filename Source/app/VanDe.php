<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VanDe extends Model
{
    protected $table = 'vande';
    public $timestamps = false;

    public function lichsu_vande(){
   		return $this->hasMany('App\LichSu_VanDe', 'idVanDe', 'id');
   	}
}
