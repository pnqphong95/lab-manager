<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    function lichTheoBuoi ($buoiLich) {
    	$lich = DB::table('lich')	->join('lophocphan','lophocphan.id', '=', 'idLopHocPhan')
    								->join('giaovien','giaovien.id', '=', 'idGiaoVien')
    								->where('idBuoi', $buoiLich)->get();
    return json_encode($lich);
	}
}
