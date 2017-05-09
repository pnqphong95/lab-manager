<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

use App\Phong;
use App\MonHoc;
use App\Tuan;
use App\Buoi;
use App\Thu;
use App\Lich;
use App\VanDe;
use App\BoMon;
use App\Lich_ChoDuyet;
use DB;

class TrangChuController extends Controller
{
    public function getTrangChu() {
    	$allTuan = Tuan::all();
        $allBM = BoMon::all();
        $phong = Phong::all();
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;
        $dateBD = date_create($lastHKNK->NgayBD);
        $dateForDisp = date_create($lastHKNK->NgayBD);
        $lich = DB::table('lich')   ->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
                                    ->join('monhoc', 'idMonHoc', '=', 'monhoc.id')
                                    ->where('idTuan', '1')
                                    ->where('idBuoi', '1')
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
                                    ->get();   
        $lichChieu = DB::table('lich')   ->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
                                    ->join('monhoc', 'idMonHoc', '=', 'monhoc.id')
                                    ->where('idTuan', '1')
                                    ->where('idBuoi', '2')
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
                                    ->get();
                                    //$datetime = date_create('2000-01-01');

//echo date_format($date, 'd');
        return view('user.trangchu',   [
                                            'phong' => $phong, 
                                            'lich' => $lich, 
                                            'allTuan' => $allTuan,
                                            'lichChieu' => $lichChieu,
                                            'allBM' => $allBM,
                                            'HKNK' => $lastHKNK,
                                            'dateBD' => $dateBD,
                                            'dateForDisp' => $dateForDisp
                                        ]);
    }

    public function getUserTrangChu() {

        $allTuan = Tuan::all();
        $allBM = BoMon::all();
        $phong = Phong::all();
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;
        $dateBD = date_create($lastHKNK->NgayBD);
        $dateForDisp = date_create($lastHKNK->NgayBD);
    	$lich = DB::table('lich')	->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
                                    ->join('monhoc', 'idMonHoc', '=', 'monhoc.id')
                                    ->where('idTuan', '1')
                                    ->where('idBuoi', '1')
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
                                    ->get();   
        $lichChieu = DB::table('lich')   ->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
                                    ->join('monhoc', 'idMonHoc', '=', 'monhoc.id')
                                    ->where('idTuan', '1')
                                    ->where('idBuoi', '2')
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
                                    ->get();
                                    //$datetime = date_create('2000-01-01');

//echo date_format($date, 'd');
    	return view('user.trangchu',   [
                                            'phong' => $phong, 
                                            'lich' => $lich, 
                                            'allTuan' => $allTuan,
                                            'lichChieu' => $lichChieu,
                                            'allBM' => $allBM,
                                            'HKNK' => $lastHKNK,
                                            'dateBD' => $dateBD,
                                            'dateForDisp' => $dateForDisp
                                        ]);
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

    public function getTrangChuAdmin() 
    {
        return view('user.trangchu');
    }     

}
