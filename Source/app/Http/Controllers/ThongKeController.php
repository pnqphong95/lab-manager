<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lich;
use App\Phong;
use App\BoMon;
use App\Tuan;
use DB;
use App\HocKy_NienKhoa;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;


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
        $sosanhPhong = [];
        $last = HocKy_NienKhoa::orderBy('id','desc')->first();
        $phongBD = $phongBD->id;
        $phongKT = $phongKT->id;
        $tuanBD = $tuanBD->id;
        $tuanKT = $tuanKT->id;
        $allPhong = Phong::all();
        $allTuan = Tuan::all();
        $tong = DB::table('lich')->where('idHocKyNienKhoa',$last->id)->count('id');

        foreach ($allPhong as $p) {
            $solan = DB::table('lich') 
                                        ->select('idPhong', DB::raw('count(*) as SoLan'))
                                        ->where('idHocKyNienKhoa',$last->id)
                                        ->where('idTuan', '<=', $tuanKT)
                                        ->where('idTuan', '>=', $tuanBD)
                                        ->where('idPhong',$p->id)
                                        ->groupBy('idPhong')
                                        ->first();
            if (!is_null ($solan))
            {
                array_push($sosanhPhong, $solan);
                //$tong  = $solan->SoLan + $tong;
            }
            else
            {
                $obj = (object) array('idPhong' => $p->id, 'SoLan' => 0);
                array_push($sosanhPhong, $obj);
            } 
            
        }
        

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
        $tong=0;
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
                $tong  = $solan->SoLan + $tong;
            }
            else
            {
                $obj = (object) array('idPhong' => $id, 'SoLan' => 0);
                array_push($sosanhPhong, $obj);
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
        $sosanhBoMon = [];
        $allTuan = Tuan::all();
        $tuanBD = DB::table('tuan')->select('id')->first();
        $tuanKT = Tuan::select('id')->orderBy('id','desc')->first();
        $allHocKy = HocKy_NienKhoa::all();
        $last = HocKy_NienKhoa::orderBy('id','desc')->first();
        $tuanBD = 1;
        $tuanKT = 20;
        $tong = DB::table('lich')->where('idHocKyNienKhoa',$last->id)->count('id');
        foreach ($allBoMon as $bm) 
        {
            $solan = DB::table('lich')  ->join('phong', 'idPhong', '=', 'phong.id')
                                        ->select('idBoMon', DB::raw('count(*) as SoLan'))
                                        ->where('idHocKyNienKhoa',$last->id)
                                        ->where('idTuan', '<=', $tuanKT)
                                        ->where('idTuan', '>=', $tuanBD)
                                        ->where('idBoMon',$bm->id)
                                        ->groupBy('idBoMon')
                                        ->first();
            if (!is_null ($solan))
            {
                array_push($sosanhBoMon, $solan);
        
            }
            else
            {
                $obj = (object) array('idBoMon' => $bm->id, 'SoLan' => 0);
                array_push($sosanhBoMon, $obj);
            }   
            
            //print_r($solan);
        }

        return view ('user.thongke.sosanhbomon', ['sosanhBoMon' => $sosanhBoMon, 
                                                    'allBoMon' => $allBoMon,
                                                    'allTuan'=>$allTuan,
                                                    'allHocKy'=>$allHocKy,
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
        $allHocKy = HocKy_NienKhoa::all();
        $tuanBD = $request->tuanBD;
        $tuanKT = $request->tuanKT;
        $last = HocKy_NienKhoa::orderBy('id','desc')->first();
        $tong=0;
        foreach ($request->idBoMon as $id) 
        {
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
                $tong  = $solan->SoLan + $tong;
            }
            else
            {
                $obj = (object) array('idBoMon' => $id, 'SoLan' => 0);
                array_push($sosanhBoMon, $obj);
            }   
            
            //print_r($solan);
        }
        //print_r($sosanhBoMon);
        return view ('user.thongke.sosanhbomon', ['sosanhBoMon' => $sosanhBoMon, 
                                                    'allBoMon' => $allBoMon,
                                                    'allTuan' => $allTuan,
                                                    'allHocKy'=>$allHocKy,
                                                    'tuanBD' => $tuanBD,
                                                    'tuanKT' =>$tuanKT,
                                                    'last'=>$last,
                                                    'tong'=>$tong
                                                    ]);
    }

    public function getSoSanhHocKy ()
    {
        $allHocKy = HocKy_NienKhoa::all();
        $sosanhHocKy = [];
        $tong = DB::table('lich')->count('id');
        foreach ($allHocKy as $hk) {
            $solan = DB::table('lich')  ->select('idHocKyNienKhoa', DB::raw('count(*) as SoLan'))
                                        ->where('idHocKyNienKhoa',$hk->id)
                                        ->groupBy('idHocKyNienKhoa')
                                        ->first();
            if (!is_null ($solan))
            {
                array_push($sosanhHocKy, $solan);
                //$tong  = $solan->SoLan + $tong;
            }
            else
            {
                $obj = (object) array('idHocKyNienKhoa' => $hk->id, 'SoLan' => 0);
                array_push($sosanhHocKy, $obj);
            } 
        }

        return view ('user.thongke.sosanhhocky',   ['sosanhHocKy' => $sosanhHocKy,
                                                    'allHocKy'=>$allHocKy,
                                                    'tong'=>$tong]);

    }

    public function postSoSanhHocKy (Request $request)
    {
        $tong=0;
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
                $tong  = $solan->SoLan + $tong;
            }
            else
            {
                $obj = (object) array('idHocKyNienKhoa' => $id, 'SoLan' => 0);
                array_push($sosanhHocKy, $obj);
            } 
        }

        return view ('user.thongke.sosanhhocky', ['sosanhHocKy' => $sosanhHocKy,
                                                    'allHocKy' => $allHocKy,
                                                    'tong'=>$tong
                                                    ]);
    }

    public function exportBoMon ()
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

        Excel::create('thongkeBoMon', function($excel){
            $excel->sheet('thongkeBoMon',function($sheet){
                $sheet->loadView('user.thongke.exportBoMon');
            });
        })->export('xlsx');
    }

}
