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
use App\Lich_ChoDuyet;
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
        $allTuan = Tuan::all();
        $phong = Phong::all();
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

    public function getLichThucHanh() 
    {
        //Lay hoc ky nien khoa hien tai
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;

        $lich = DB::table('lich')   ->where('idGiaoVien', Auth::user()->id)
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
                                    ->orderBy('idTuan')
                                    ->orderBy('idThu')
                                    ->orderBy('idBuoi')
                                    ->get();
        $allThu = Thu::all();
        $allMonHoc = MonHoc::all();
        $allPhong = Phong::all();
        $allBuoi = Buoi::all();
        $allTuan = Tuan::all();
        return view('user.lichthuchanh', 
                    [
                        'lich' => $lich,
                        'allMonHoc' => $allMonHoc,
                        'allBuoi' => $allBuoi,
                        'allPhong' => $allPhong,
                        'allThu' => $allThu,
                        'allTuan' => $allTuan
                    ]);
    }
}
