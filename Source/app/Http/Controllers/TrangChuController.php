<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use App\MonHoc;
use App\Tuan;
use App\Buoi;
use App\Thu;
use App\Lich;
use DB;

class TrangChuController extends Controller
{
    public function getTrangChu() {
    	$phong = Phong::all();
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;
    	$lich = DB::table('lich')	->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
    								->join('monhoc', 'idMonHoc', '=', 'monhoc.id')
                                    ->where('idTuan', '1')
    								->where('idBuoi', '1')
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
    								->get();   	
    	return view('pages.trangchu',['phong' => $phong, 'lich' => $lich, 'hknk' => $lastHKNK]);
    }

    public function getUserTrangChu() {
    	$phong = Phong::all();
        $allTuan = Tuan::all();
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;
    	$lich = DB::table('lich')	->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
                                    ->join('monhoc', 'idMonHoc', '=', 'monhoc.id')
                                    ->where('idTuan', '1')
                                    ->where('idBuoi', '1')
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
                                    ->get();   	
    	return view('user.trangchu',['phong' => $phong, 'lich' => $lich, 'allTuan' => $allTuan]);
    }

    public function getDangKyPhong() {
        $phong = Phong::all();
        $allMonHoc = MonHoc::all();
        $allTuan = Tuan::all();
        $allBuoi = Buoi::all();
        $allThu = Thu::all();
        return view('user.dangkyphong', 
            [   'phong' => $phong,
                'allMonHoc' => $allMonHoc, 
                'allTuan' => $allTuan,
                'allThu' => $allThu,
                'allBuoi' => $allBuoi
            ]
        );
    }

    public function postDangKyPhong(Request $request) {
        $this->validate($request,
            [
                'idTuan'=>'required',
                'idThu' => 'required',
                'idBuoi' => 'required',
                'idPhong' => 'required',
                'nhom' => 'required'
            ],
            [
                'TenMH.required'=>'Bạn chưa nhập tên môn học',
                'TenMH.min'=>'Tên môn học có ít nhất 3 ký tự',
                'TenMH.max'=>'Tên môn học có nhiều nhất 50 ký tự',
                'idTuan.required' => 'Bạn chưa chọn Tuần',
                'idThu.required' => 'Bạn chưa chọn Thứ',
                'idBuoi.required' => 'Bạn chưa chọn Buổi',
                'idPhong.required' => 'Bạn chưa chọn Phòng',
                'nhom.required' => 'Bạn chưa nhập nhóm'
            ]);
        
        $lich = new Lich;
        $lich->idGiaoVien =$request->idGiaoVien;
        $lich->idPhong =$request->idPhong;
        $lich->idMonHoc =$request->idMonHoc;
        $lich->nhom = $request->nhom;
        $lich->idThu = $request->idThu;
        $lich->idBuoi = $request->idBuoi;
        $lich->idTuan = $request->idTuan;
        $lich->idHocKyNienKhoa = 2;
        $lich->save();

        return redirect('user/dangkyphong')->with('thongbao','Đăng ký phòng thành công');
    }

    public function getVanDe() {
        $phong = Phong::all();
        return view('user.vande');
    }
}
