<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichSu_ChoDuyet extends Model
{
    protected $table = 'LichSu_ChoDuyet';
    public $timestamps = false;

    public function lich_choduyet(){
    	return $this->belongsTo('App\Lich_ChoDuyet', 'idChoDuyet', 'id');
    }
}
