<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VanDe;
use DB;

class AjaxController extends Controller
{
    public function getLich ($buoi, $tuan) 
    {
    	$idHocKyNienKhoa = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
	    $lich = DB::table('lich')		->join('monhoc','monhoc.id', '=', 'idMonHoc')
	    								->join('giaovien','giaovien.id', '=', 'idGiaoVien')
	    								->where('idBuoi', $buoi)
	    								->where('idTuan', $tuan)
	    								->where('idHocKyNienKhoa', $idHocKyNienKhoa->id)
	    								->get();
	    return json_encode($lich);
	}

	public function suaLoi ($id)
	{
		$vande = VanDe::find($id);
		$vande->trangThai = 1;
		$vande->save();
		return ['status' => '200'];
	}
}
