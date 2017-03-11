<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Phong;
use App\MonHoc;
use App\Tuan;
use App\Buoi;
use App\Thu;
use App\Lich;
use App\VanDe;
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
    	$phong = DB::table('phong')     ->where('idBoMon', Auth::user()->idBoMon)
                                        ->get();
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
        $phong = DB::table('phong')     ->where('idBoMon', Auth::user()->idBoMon)
                                        ->get();
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

    public function getDKphongBMkhac(){
        $phong = DB::table('phong')     ->where('idBoMon', '!=', Auth::user()->idBoMon)
                                        ->get();
        $allMonHoc = MonHoc::all();
        $allTuan = Tuan::all();
        $allBuoi = Buoi::all();
        $allThu = Thu::all();
        return view('user.DKphongBMkhac', 
            [   'phong' => $phong,
                'allMonHoc' => $allMonHoc, 
                'allTuan' => $allTuan,
                'allThu' => $allThu,
                'allBuoi' => $allBuoi
            ]
        );
        
    }

    public function getVanDe() {
        $allPhong = Phong::all();
        return view('user.vande',['allPhong' => $allPhong]);
    }

    public function postVanDe(Request $request) {
        $this->validate( $request,
            [
                'idPhong' => 'required',
                'tomTatVD' => 'required|max:50',
                'chiTietVD' => 'required|max:255'
            ],
            [
                'idPhong.required' => 'Phòng không được bỏ trống!',
                'tomTatVD.required' => 'Tóm tắt vấn đề không được bỏ trống!',
                'tomTatVD.max' => 'Tóm tăt vấn đề tối đa 50 kí tự!',
                'chiTietVD.required' => 'Chi tiết vấn đề không được bỏ trống!',
                'chiTietVD.max' => 'Chi tiết vấn đề tối đa 255 kí tự!'
            ]
            );
        $vande = new VanDe();
        $vande->idPhong = $request->idPhong;
        $vande->TomTatVD = $request->tomTatVD;
        $vande->ChiTietVD = $request->chiTietVD;
        $vande->NguoiTao = Auth::user()->id;
        $vande->save();
        return redirect('user/vande')->with('thongbao','Vấn đề đã gửi!');
    }
}
