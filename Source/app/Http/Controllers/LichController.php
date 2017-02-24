<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lich;

class LichController extends Controller
{
    //
    public function getThem()
    {
    	$lich = Lich::all();
    	return view('admin.lich.them', ['lich'=>$lich]);
    }

    public function postThem(Request $request)
    {
    	$lich = new Lich;
    	$lich->idGiaoVien =$request->idGiaoVien;

    	$lich->save();

    	return redirect('admin/lich/them')->with('thongbao','Thêm thành công');
    }

    public function getSua()
    {
    	// $theloai = TheLoai::all();
    	// return view('admin.theloai.sua', ['theloai'=>$theloai]);
    }
}
