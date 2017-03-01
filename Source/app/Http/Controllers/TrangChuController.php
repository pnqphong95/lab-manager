<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use DB;

class TrangChuController extends Controller
{
    public function getTrangChu() {
    	$phong = Phong::all();
    	$lich = DB::table('lich')	->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
    								->join('lophocphan', 'idLopHocPhan', '=', 'lophocphan.id')
    								->where('idBuoi', '1')
    								->get();   	
    	return view('pages.trangchu',['phong' => $phong, 'lich' => $lich]);
    }

    public function getUserTrangChu() {
    	$phong = Phong::all();
    	$lich = DB::table('lich')	->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
    								->join('lophocphan', 'idLopHocPhan', '=', 'lophocphan.id')
    								->where('idBuoi', '1')
    								->get();   	
    	return view('user.trangchu',['phong' => $phong, 'lich' => $lich]);
    }
}
