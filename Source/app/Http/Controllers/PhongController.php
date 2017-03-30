<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use App\BoMon;
use DB;
use App\CauHinh;

class PhongController extends Controller
{
    public function getDanhSach()
    {
    	$phong = Phong::all();
        $bomon = BoMon::all();
        return view('admin.phong.danhsach', ['phong'=>$phong, 'bomon'=>$bomon]);
    }

    public function getChiTiet($id){
    	$phong = Phong::find($id);
    	return view('admin.phong.chitiet', ['phong'=>$phong]);
    }

    public function getSuaCauHinh($id){
    	$phong = Phong::find($id);
    	return view('admin.phong.suacauhinh', ['phong'=>$phong]);
    }

    public function postSuaCauHinh(Request $request, $id)
    {
    	$phong = Phong::find($id);

    	$phong->DLRam = $request->DLRam;
    	$phong->DLOCung = $request->DLOCung;
    	$phong->CPU = $request->CPU;
    	$phong->GPU = $request->GPU;
		$phong->save();    	

		return redirect('admin/phong/suacauhinh/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getThem()
    {
        $allBoMon = BoMon::all();
        return view('admin.phong.them', ['allBoMon' => $allBoMon]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'TenPhong'=>'required|max:255',
                'TenPhong' => 'unique:phong,TenPhong',
                'DLRam'=>'required',
                'DLOCung'=>'required',
                'CPU'=>'required|max:255',
                'GPU'=>'required|max:255'
            ],
            [
                'TenPhong.required'=>'Bạn chưa nhập tên phòng',
                'TenPhong.max'=>'Tên phòng có nhiều nhất 255 ký tự',
                'DLRam.required'=>'Bạn chưa nhập dung lượng ram',
                'DLOCung.required'=>'Bạn chưa nhập dung lượng ổ cứng',
                'CPU.required'=>'Bạn chưa nhập thông tin CPU',
                'CPU.max'=>'Thông tin CPU có nhiều nhất 255 ký tự',
                'GPU.required'=>'Bạn chưa nhập thông tin GPU',
                'GPU.max'=>'Thông tin GPU có nhiều nhất 255 ký tự',
                'TenPhong.unique' => 'Tên phòng đã tồn tại'
            ]);

        $phong = new Phong;
        $phong->TenPhong =$request->TenPhong;
        $phong->idBoMon = $request->idBoMon;
        $phong->DLRam =$request->DLRam;
        $phong->DLOCung =$request->DLOCung;
        $phong->CPU =$request->CPU;
        $phong->GPU =$request->GPU;

        $phong->save();

        return redirect('admin/phong/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $phong = Phong::find($id);
        $bomon = BoMon::all();
        return view('admin.phong.sua', ['phong'=>$phong, 'bomon'=>$bomon]);
    }

    public function postSua(Request $request, $id)
    {
        $phong = Phong::find($id);
        $bomon = BoMon::all();

        $this->validate($request,
            [
                'TenPhong'=>'required|max:255',
                //'TenPhong' => 'unique:phong,TenPhong,',
                'DLRam'=>'required',
                'DLOCung'=>'required',
                'CPU'=>'required|max:255',
                'GPU'=>'required|max:255'
            ],
            [
                'TenPhong.required'=>'Bạn chưa nhập tên phòng',
                'TenPhong.max'=>'Tên phòng có nhiều nhất 255 ký tự',
                'DLRam.required'=>'Bạn chưa nhập dung lượng ram',
                'DLOCung.required'=>'Bạn chưa nhập dung lượng ổ cứng',
                'CPU.required'=>'Bạn chưa nhập thông tin CPU',
                'CPU.max'=>'Thông tin CPU có nhiều nhất 255 ký tự',
                'GPU.required'=>'Bạn chưa nhập thông tin GPU',
                'GPU.max'=>'Thông tin GPU có nhiều nhất 255 ký tự'
            ]);

        $phong->TenPhong = $request->TenPhong;
        $phong->idBoMon = $request->idBoMon;
        $phong->DLRam = $request->DLRam;
        $phong->DLOCung = $request->DLOCung;
        $phong->CPU = $request->CPU;
        $phong->GPU = $request->GPU;

        $phong->save();

        return redirect('admin/phong/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    
    public function getXoa($id)
    {
        $phong = Phong::find($id);
        $phong->delete();

        return redirect('admin/phong/danhsach')->with('thongbao','Xóa thành công');
    }
}
