<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lich extends Model
{
    protected $table = 'Lich';
    public $timestamps = false;

    public function giaovien(){
    	return $this->belongsTo('App\Lich', 'idGiaoVien', 'id');
    }

    public function lophocphan(){
    	return $this->belongsTo('App\Lich', 'idLopHocPhan', 'id');
    }

    public function thu(){
    	return $this->belongsTo('App\Lich', 'idThu', 'id');
    }

    public function phong(){
    	return $this->belongsTo('App\Lich', 'idPhong', 'id');
    }

    public function buoi() {
        return $this->belongsTo('App\Lich', 'idBuoi', 'id');
    }
}
