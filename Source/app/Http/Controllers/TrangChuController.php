<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use DB;

class TrangChuController extends Controller
{
    public function getTrangChu() {
    	$phong = Phong::all();
    	$lich = DB::table('lich')->where('idBuoi', '1')->get();   	
    	return view('trangchu',['phong' => $phong, 'lich' => $lich]);
    }


}
