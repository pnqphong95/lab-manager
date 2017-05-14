<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lich;
use App\Phong;
use App\BoMon;
use App\Tuan;
use DB;
use App\HocKy_NienKhoa;

class ThongKeController extends Controller
{
    // public function getXemBieuDo ()
    // {
    //     $allBoMon = BoMon::all();
    //     $allPhong = Phong::all();
    //     $allHKNK = HocKy_NienKhoa::all();
    //     $allTuan = Tuan::all();
    //     $bomon = DB::table('lich')     ->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
    //                                     ->select('idBoMon', DB::raw('count(*) as SoLan'))
    //                                     ->groupBy('idBoMon')
    //                                     ->get();

    //     $phong = DB::table('lich')     ->select('idPhong', DB::raw('count(*) as SoLan'))
    //                                     ->groupBy('idPhong')
    //                                     ->get();

    //     $hocky = DB::table('lich')     ->join('hocky_nienkhoa', 'idHocKyNienKhoa', '=', 'hocky_nienkhoa.id')
    //                                     ->select('HocKy', DB::raw('count(HocKy) as SoLan'))
    //                                     ->groupBy('HocKy')
    //                                     ->get();


    //     return view ('admin.thongke.xembieudo',['bomon' => $bomon,
    //                                             'allBoMon' => $allBoMon, 
    //                                             'phong'=>$phong, 
    //                                             'allPhong'=>$allPhong, 
    //                                             'allHKNK'=>$allHKNK,
    //                                             'hocky'=>$hocky,
    //                                             'allTuan'=>$allTuan
    //                                             ]);
    //     // print_r($toanHK);
    // }

    // public function getXemBieuDoCot ()
    // {
    //     $allBoMon = BoMon::all();
    //     $allPhong = Phong::all();
    //     $allHKNK = HocKy_NienKhoa::all();
    //     $allTuan = Tuan::all();
    //     $bomon = DB::table('lich')     ->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
    //                                     ->select('idBoMon', DB::raw('count(*) as SoLan'))
    //                                     ->groupBy('idBoMon')
    //                                     ->get();

    //     $phong = DB::table('lich')     ->select('idPhong', DB::raw('count(*) as SoLan'))
    //                                     ->groupBy('idPhong')
    //                                     ->get();

    //     $hocky = DB::table('lich')     ->join('hocky_nienkhoa', 'idHocKyNienKhoa', '=', 'hocky_nienkhoa.id')
    //                                     ->select('HocKy', DB::raw('count(HocKy) as SoLan'))
    //                                     ->groupBy('HocKy')
    //                                     ->get();


    //     return view ('admin.thongke.xembieudocot',['bomon' => $bomon,
    //                                             'allBoMon' => $allBoMon, 
    //                                             'phong'=>$phong, 
    //                                             'allPhong'=>$allPhong, 
    //                                             'allHKNK'=>$allHKNK,
    //                                             'hocky'=>$hocky,
    //                                             'allTuan'=>$allTuan
    //                                             ]);
    // }

    // public function getSoSanh ()
    // {
    //     $c = Phong::select('TenPhong')->first();
    //     $d = Phong::select('TenPhong')->orderBy('id','desc')->first();

    //     $a = Tuan::select('id')->first();
    //     $b = Tuan::select('id')->orderBy('id','desc')->first();
    //     $last = HocKy_NienKhoa::select('id')->orderBy('id','desc')->first();

    //     $sosanhPhong = DB::table('lich') ->select('idPhong', DB::raw('count(*) as SoLan'))
    //                                     ->where('idHocKyNienKhoa',$last->id)
    //                                     ->groupBy('idPhong')
    //                                     ->get();
    //     $sosanhTuan = DB::table('lich')   ->select('idTuan', DB::raw('count(*) as SoLan'))
    //                                     ->where('idHocKyNienKhoa',$last->id)
    //                                     ->groupBy('idTuan')
    //                                     ->get();
    //     $sosanhBoMon = DB::table('lich')->join('phong', 'idBoMon', '=', 'phong.idBoMon')
    //                                     ->select('idBoMon','idPhong', DB::raw('count(*) as SoLan'))
    //                                     ->where('idHocKyNienKhoa',$last->id)
    //                                     ->groupBy('idBoMon','idPhong')
    //                                     ->get();
    //     $allPhong = Phong::all();
    //     $allTuan = Tuan::all();
    //     $allBoMon = BoMon::all();
    //     return view ('admin.thongke.bieudotron.sosanh', ['sosanhPhong' => $sosanhPhong,
    //                                                     'sosanhTuan' => $sosanhTuan,
    //                                                     'sosanhBoMon'=>$sosanhBoMon,
    //                                                     'allPhong'=>$allPhong,
    //                                                     'allTuan'=>$allTuan,
    //                                                     'allBoMon'=>$allBoMon,
    //                                                     'c'=>$c,
    //                                                     'd'=>$d,
    //                                                     'a'=>$a,
    //                                                     'b'=>$b
    //                                                     ]);
    // }
    
    // public function postSoSanh (Request $request)
    // {
    //     $allPhong = Phong::all();
    //     $allTuan = Tuan::all();
    //     $allBoMon = BoMon::all();
    //     $phongBD = $request->phongBD;
    //     $phongKT = $request->phongKT;
    //     $tuanBD = $request->tuanBD;
    //     $tuanKT = $request->tuanKT;
    //     $BoMon = $request->BoMon;

    //     $c = $request->phongBD;
    //     $d = $request->phongKT;
    //     $a = $request->tuanBD;
    //     $b = $request->tuanKT;
    //     $last = HocKy_NienKhoa::select('id')->orderBy('id','desc')->first();

    //     $sosanhPhong = DB::table('lich')->select('idPhong', DB::raw('count(*) as SoLan'))
    //                                     ->where('idPhong', '<=', $phongKT)
    //                                     ->where('idPhong', '>=', $phongBD)
    //                                     ->where('idTuan', '<=', $tuanKT)
    //                                     ->where('idTuan', '>=', $tuanBD)
    //                                     ->where('idHocKyNienKhoa',$last->id)
    //                                     ->groupBy('idPhong')
    //                                     ->get();

    //     $sosanhTuan = DB::table('lich')    ->select('idTuan',DB::raw('count(*) as SoLan'))
    //                                     ->where('idPhong', '<=', $phongKT)
    //                                     ->where('idPhong', '>=', $phongBD)
    //                                     ->where('idTuan', '<=', $tuanKT)
    //                                     ->where('idTuan', '>=', $tuanBD)
    //                                     ->where('idHocKyNienKhoa',$last->id)
    //                                     ->groupBy('idTuan')
    //                                     ->get();
    //     $sosanhBoMon = DB::table('lich')->join('phong', 'idPhong', '=', 'phong.id')
    //                                     ->select('idPhong','idBoMon',DB::raw('count(*) as SoLan'))
    //                                     ->where('idTuan', '<=', $tuanKT)
    //                                     ->where('idTuan', '>=', $tuanBD)
    //                                     ->where('idBoMon',$BoMon)
    //                                     ->where('idHocKyNienKhoa',$last->id)
    //                                     ->groupBy('idPhong','idBoMon')
    //                                     ->get();

    //     return view('admin.thongke.bieudotron.sosanh', ['sosanhPhong'=>$sosanhPhong,
    //                                                     'sosanhTuan'=>$sosanhTuan,
    //                                                     'sosanhBoMon'=>$sosanhBoMon, 
    //                                                     'allTuan'=>$allTuan, 
    //                                                     'allPhong'=>$allPhong,
    //                                                     'allBoMon'=>$allBoMon,
    //                                                     'a'=>$tuanBD,'b'=>$tuanKT,
    //                                                     'c'=>$phongBD,'d'=>$phongKT
    //                                                     ]);
         
    // }


    // public function getChart()
    // {
    //     $allPhong = Phong::all();
    //     $allTuan = Tuan::all();
    //     $toanHK = DB::table('lich')     ->select('idPhong', DB::raw('count(*) as total'))
    //                                     ->groupBy('idPhong')
    //                                     ->get();

    //     return view('admin.thongke.danhsach', ['toanHK'=>$toanHK,'allPhong'=>$allPhong,'allTuan'=>$allTuan]);
    // }

    // public function getTuan()
    // {
    //     $allPhong = Phong::all();
    //     $allTuan = Tuan::all();

    //     $tuan = DB::table('lich')       ->select('idTuan', DB::raw('count(*) as total'))
    //                                     ->groupBy('idTuan')
    //                                     ->get();

    //     return view('admin.thongke.tuan', ['allTuan'=>$allTuan,'tuan'=>$tuan,'allPhong'=>$allPhong]);
    // }
    
    // public function postXemThongKe (Request $request)
    // {
    //     $allPhong = Phong::all();
    //     $allTuan = Tuan::all();
    //     $tuanBD = $request->tuanBD;
    //     $tuanKT = $request->tuanKT;
    //     $xemThongKe = DB::table('lich')    ->select('idTuan','idPhong', DB::raw('count(*) as total'))
    //                                         ->where('idTuan', '<=', $tuanKT)
    //                                         ->where('idTuan', '>=', $tuanBD)
    //                                         ->groupBy('idTuan','idPhong')
    //                                         ->get();
    //     return view('admin.thongke.xemthongke', ['xemThongKe'=>$xemThongKe, 
    //                                             'allTuan'=>$allTuan, 'allPhong'=>$allPhong,
    //                                             'a'=>$tuanBD,'b'=>$tuanKT]);     
    // }

    public function getSoSanhPhong ()
    {
        $phongBD = Phong::select('id','TenPhong')->first();
        $phongKT = Phong::select('id','TenPhong')->orderBy('id','desc')->first();
        $tuanBD = DB::table('tuan')->select('id')->first();
        $tuanKT = Tuan::select('id')->orderBy('id','desc')->first();

        $last = HocKy_NienKhoa::orderBy('id','desc')->first();
        $phongBD = $phongBD->id;
        $phongKT = $phongKT->id;
        $tuanBD = $tuanBD->id;
        $tuanKT = $tuanKT->id;
        $tong = DB::table('lich')->where('idHocKyNienKhoa',$last->id)->count('id');

        $sosanhPhong = DB::table('lich')    ->select('idPhong', DB::raw('count(*) as SoLan'))
                                            ->where('idHocKyNienKhoa',$last->id)
                                            ->groupBy('idPhong')
                                            ->get();
        $allPhong = Phong::all();
        $allTuan = Tuan::all();

        return view ('user.thongke.sosanhphong', ['sosanhPhong' => $sosanhPhong,
                                                    'allPhong'=>$allPhong,
                                                    'allTuan'=>$allTuan,
                                                    'phongBD'=>$phongBD,
                                                    'phongKT'=>$phongKT,
                                                    'tuanBD'=>$tuanBD,
                                                    'tuanKT'=>$tuanKT,
                                                    'last'=>$last,
                                                    'tong'=>$tong
                                                    ]);  
    }

    public function postSoSanhPhong (Request $request)
    {   
        $sosanhPhong = array();
        $allPhong = Phong::all();
        $allTuan = Tuan::all();

        $tuanBD = $request->tuanBD;
        $tuanKT = $request->tuanKT;

        $last = HocKy_NienKhoa::orderBy('id','desc')->first();
        $tong = DB::table('lich')   ->where('idHocKyNienKhoa',$last->id)
                                    ->where('idTuan', '<=', $tuanKT)
                                    ->where('idTuan', '>=', $tuanBD)
                                    ->count('id');

        foreach ($request->idPhong as $id) {
            $solan = DB::table('lich') 
                                        ->select('idPhong', DB::raw('count(*) as SoLan'))
                                        ->where('idHocKyNienKhoa',$last->id)
                                        ->where('idTuan', '<=', $tuanKT)
                                        ->where('idTuan', '>=', $tuanBD)
                                        ->where('idPhong',$id)
                                        ->groupBy('idPhong')
                                        ->first();
            if (!is_null ($solan))
            {
                array_push($sosanhPhong, $solan);
            }
            else
            {
                array_push($sosanhPhong, '{"idPhong":"'.$id.'", "SoLan": "0"}');
            } 
        }

        return view('user.thongke.sosanhphong', ['sosanhPhong'=>$sosanhPhong, 
                                                    'allTuan'=>$allTuan, 
                                                    'allPhong'=>$allPhong,
                                                    'tuanBD'=>$tuanBD,'tuanKT'=>$tuanKT,
                                                    'last'=>$last,
                                                    'tong'=>$tong
                                                    ]);
    }

    public function getSoSanhBoMon ()
    {
        $allBoMon = BoMon::all();
        $allTuan = Tuan::all();
        $tuanBD = DB::table('tuan')->select('id')->first();
        $tuanKT = Tuan::select('id')->orderBy('id','desc')->first();

        $last = HocKy_NienKhoa::orderBy('id','desc')->first();
        $tuanBD = 1;
        $tuanKT = 20;
        $tong = DB::table('lich')->where('idHocKyNienKhoa',$last->id)->count('id');
        $sosanhBoMon = DB::table('lich')->join('phong', 'idPhong', '=', 'phong.id')
                                        ->select('idBoMon', DB::raw('count(*) as SoLan'))
                                        ->where('idHocKyNienKhoa',$last->id)
                                        ->groupBy('idBoMon')
                                        ->get();

        return view ('user.thongke.sosanhbomon', ['sosanhBoMon' => $sosanhBoMon, 
                                                    'allBoMon' => $allBoMon,
                                                    'allTuan'=>$allTuan,
                                                    'tuanBD'=>$tuanBD,
                                                    'tuanKT'=>$tuanKT,
                                                    'last'=>$last,
                                                    'tong'=>$tong
                                                    ]);
    }

    public function postSoSanhBoMon (Request $request)
    {
        $sosanhBoMon = array();
        $allBoMon = BoMon::all();
        $allTuan = Tuan::all();
        $tuanBD = $request->tuanBD;
        $tuanKT = $request->tuanKT;
        $last = HocKy_NienKhoa::orderBy('id','desc')->first();
        $tong = DB::table('lich')   ->where('idHocKyNienKhoa',$last->id)
                                    ->where('idTuan', '<=', $tuanKT)
                                    ->where('idTuan', '>=', $tuanBD)
                                    ->count('id');

        foreach ($request->idBoMon as $id) {
            $solan = DB::table('lich')  ->join('phong', 'idPhong', '=', 'phong.id')
                                        ->select('idBoMon', DB::raw('count(*) as SoLan'))
                                        ->where('idHocKyNienKhoa',$last->id)
                                        ->where('idTuan', '<=', $tuanKT)
                                        ->where('idTuan', '>=', $tuanBD)
                                        ->where('idBoMon',$id)
                                        ->groupBy('idBoMon')
                                        ->first();
            if (!is_null ($solan))
            {
                array_push($sosanhBoMon, $solan);
            }
            else
            {
                array_push($sosanhBoMon, '{"idBoMon":"'.$id.'", "SoLan": "0"}');
            }   
        }

        return view ('user.thongke.sosanhbomon', ['sosanhBoMon' => $sosanhBoMon, 
                                                    'allBoMon' => $allBoMon,
                                                    'allTuan' => $allTuan,
                                                    'tuanBD' => $tuanBD,
                                                    'tuanKT' =>$tuanKT,
                                                    'last'=>$last,
                                                    'tong'=>$tong
                                                    ]);
    }

    public function getSoSanhHocKy ()
    {
        $allHocKy = HocKy_NienKhoa::all();
        $tong = DB::table('lich')->count('id');
        $sosanhHocKy = DB::table('lich')
                                        ->select('idHocKyNienKhoa', DB::raw('count(*) as SoLan'))
                                        ->groupBy('idHocKyNienKhoa')
                                        ->get();

        return view ('user.thongke.sosanhhocky',   ['sosanhHocKy' => $sosanhHocKy,
                                                    'allHocKy'=>$allHocKy,
                                                    'tong'=>$tong]);

    }

    public function postSoSanhHocKy (Request $request)
    {
        $sosanhHocKy = array();
        $allHocKy = HocKy_NienKhoa::all();
        foreach ($request->idHocKy as $id) {
            $solan = DB::table('lich')  ->select('idHocKyNienKhoa', DB::raw('count(*) as SoLan'))
                                        ->where('idHocKyNienKhoa',$id)
                                        ->groupBy('idHocKyNienKhoa')
                                        ->first();
            if (!is_null ($solan))
            {
                array_push($sosanhHocKy, $solan);
            }
            else
            {
                array_push($sosanhHocKy, '{"idHocKyNienKhoa":"'.$id.'", "SoLan": "0"}');
            }   
        }
        $tong = DB::table('lich')->count('id');

        return view ('user.thongke.sosanhhocky', ['sosanhHocKy' => $sosanhHocKy,
                                                    'allHocKy' => $allHocKy,
                                                    'tong'=>$tong
                                                    ]);
    }
}
