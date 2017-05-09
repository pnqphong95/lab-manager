<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichSu_VanDe extends Model
{
    protected $table = 'lichsu_vande';
    public $timestamps = false;

    public function vande(){
    	return $this->belongsTo('App\VanDe', 'idVanDe', 'id');
    }
}
