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
