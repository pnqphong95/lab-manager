<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use DB;
use App\CauHinh;

class PhongController extends Controller
{
    public function getDanhSach()
    {
    	$phong = DB::table('phong')	->join('bomon', 'idBoMon', '=', 'bomon.id')
    								->get();
    	return view('admin.phong.danhsach', ['phong'=>$phong]);
    }

    public function getChiTiet($id){
    	$phong = Phong::find($id);
    	$cauhinh = CauHinh::find($phong->idCauHinh);
    	return view('admin.phong.chitiet', ['phong'=>$phong, 'cauhinh' => $cauhinh]);
    }

    public function getSuaCauHinh($id){
    	$phong = Phong::find($id);
    	$cauhinh = CauHinh::find($phong->idCauHinh);
    	return view('admin.phong.suacauhinh', ['phong'=>$phong, 'cauhinh' => $cauhinh]);
    }

    public function postSuaCauHinh(Request $request, $id)
    {
    	$phong = Phong::find($id);
    	$cauhinh = CauHinh::find($phong->idCauHinh);
    	// 

    	$cauhinh->DLRam = $request->DLRam;
    	$cauhinh->DLOCung = $request->DLOcung;
    	$cauhinh->CPU = $request->CPU;
    	$cauhinh->GPU = $request->GPU;
		$cauhinh->save();    	

		return redirect('admin/phong/suacauhinh/'.$idCauHinh)->with('thongbao','Sửa thành công');
    }

}
