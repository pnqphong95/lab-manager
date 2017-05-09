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
    public function getLanTheoBM ()
    {
        //SELECT idBoMon, COUNT(*) as SoLan FROM `lich`,`giaovien` WHERE lich.idGiaoVien = giaovien.id GROUP BY idBoMon
        $toanHK = DB::table('lich')     ->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
                                        ->select('idBoMon', DB::raw('count(*) as SoLan'))
                                        ->groupBy('idBoMon')
                                        ->get();
        //$a = DB::table('lich')->join()
        $allBM = BoMon::all();
        return view ('admin.thongke.soLanTheoBM', ['data' => $toanHK, 'allPhong' => $allBM]);
    }

    public function getLanSDHK ()
    {
        $toanHK = DB::table('lich')     ->select('idPhong', DB::raw('count(*) as SoLan'))
                                        ->groupBy('idPhong')
                                        ->get();
        $allPhong = Phong::all();
        return view ('admin.thongke.solanHK', ['data' => $toanHK, 'allPhong' => $allPhong]);
    }

    public function postSoSanhPhong (Request $req)
    {
        $data = array();
        $allPhong = Phong::all();

        foreach ($req->idPhong as $id) {
            $solan = DB::table('lich')  ->select('idPhong', DB::raw('count(*) as SoLan'))
                                        ->groupBy('idPhong')
                                        ->where ('idPhong', $id)
                                        ->first();
            if (!is_null ($solan))
            {
                array_push($data, $solan);
            }
            else
            {
                array_push($data, '{"idPhong":"'.$id.'", "SoLan": "0"}');
            }
            
        }
        //echo $data[0]->idPhong. 'so lan'. $data[0]->SoLan;
        //echo $data[0];
        return view ('admin.thongke.postSSP', ['data' => $data, 'allPhong' => $allPhong]);
    }

    public function getSoSanhPhong ()
    {
        $toanHK = DB::table('lich')     ->select('idPhong', DB::raw('count(*) as SoLan'))
                                        ->groupBy('idPhong')
                                        ->get();
        $allPhong = Phong::all();
        return view ('admin.thongke.sosanhphong', ['data' => $toanHK, 'allPhong' => $allPhong]);
    }
    //
    public function getChart()
    {
        $allPhong = Phong::all();
        $allTuan = Tuan::all();
        $toanHK = DB::table('lich')     ->select('idPhong', DB::raw('count(*) as total'))
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
