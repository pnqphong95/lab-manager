<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lich;
use App\Phong;
use App\BoMon;
use App\Tuan;
use DB;

class ThongKeController extends Controller
{
    //
    public function getChart()
    {
        $allPhong = Phong::all();
        $allTuan = Tuan::all();
        $toanHK = DB::table('lich')     ->select('idPhong', DB::raw('count(*) as total'))
                                        ->groupBy('idPhong')
                                        ->get();
        $thang1 = DB::table('lich')     ->select('idPhong', DB::raw('count(*) as total'))
                                        ->where('idTuan', '<=',10)->where('idTuan', '>=',4)
                                        ->groupBy('idPhong')
                                        ->get();

        return view('admin.thongke.danhsach', ['toanHK'=>$toanHK,'thang1'=>$thang1,'allPhong'=>$allPhong,'allTuan'=>$allTuan]);
    }

    public function getTuan()
    {
        $allPhong = Phong::all();
        $allTuan = Tuan::all();

        $tuan = DB::table('lich')       ->select('idTuan', DB::raw('count(*) as total'))
                                        ->groupBy('idTuan')
                                        ->get();

        return view('admin.thongke.tuan', ['allTuan'=>$allTuan,'tuan'=>$tuan,'allPhong'=>$allPhong]);
    }
    
    public function postXemThongKe (Request $request)
    {
        $allPhong = Phong::all();
        $allTuan = Tuan::all();
        $tuanBD = $request->tuanBD;
        $tuanKT = $request->tuanKT;
        $xemThongKe = DB::table('lich')    ->select('idTuan','idPhong', DB::raw('count(*) as total'))
                                            ->where('idTuan', '<=', $tuanKT)
                                            ->where('idTuan', '>=', $tuanBD)
                                            ->groupBy('idTuan','idPhong')
                                            ->get();
        return view('admin.thongke.xemthongke', ['xemThongKe'=>$xemThongKe, 
                                                'allTuan'=>$allTuan, 'allPhong'=>$allPhong,
                                                'a'=>$tuanBD,'b'=>$tuanKT]);     
    }


}
