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
    public function getDanhSach()
    {

    }

    public function getChart()
    {
    	$allPhong = Phong::all();
    	$allTuan = Tuan::all();
        $toanHK = DB::table('lich')	 	->select('idPhong', DB::raw('count(*) as total'))
						                ->groupBy('idPhong')
						                ->get();
		$thang1 = DB::table('lich')	 	->select('idPhong', DB::raw('count(*) as total'))
										->where('idTuan', '<=',10)->where('idTuan', '>=',4)
						                ->groupBy('idPhong')
						                ->get();

        return view('admin.thongke.danhsach', ['toanHK'=>$toanHK,'thang1'=>$thang1,'allPhong'=>$allPhong,'allTuan'=>$allTuan]);
    }

    public function getThang1()
    {
    	$allPhong = Phong::all();
    	$allTuan = Tuan::all();

        $toanHK = DB::table('lich')	 	->select('idPhong', DB::raw('count(*) as total'))
						                ->groupBy('idPhong')
						                ->get();
		$thang1 = DB::table('lich')	 	->select('idPhong', DB::raw('count(*) as total'))
										->where('idTuan', '<=',4)->where('idTuan', '>=',1)
						                ->groupBy('idPhong')
						                ->get();

        return view('admin.thongke.thang1', ['toanHK'=>$toanHK,'thang1'=>$thang1,'allPhong'=>$allPhong,'allTuan'=>$allTuan]);
    }

    public function getThang2()
    {
    	$allPhong = Phong::all();
        $toanHK = DB::table('lich')	 	->select('idPhong', DB::raw('count(*) as total'))
						                ->groupBy('idPhong')
						                ->get();
		$thang2 = DB::table('lich')	 	->select('idPhong', DB::raw('count(*) as total'))
										->where('idTuan', '<=',8)->where('idTuan', '>=',5)
						                ->groupBy('idPhong')
						                ->get();

        return view('admin.thongke.thang2', ['toanHK'=>$toanHK,'thang2'=>$thang2,'allPhong'=>$allPhong]);
    }

    public function getTuan()
    {
    	$allPhong = Phong::all();
        $allTuan = Tuan::all();

		$tuan = DB::table('lich')	 	->select('idTuan', DB::raw('count(*) as total'))
						                ->groupBy('idTuan')
						                ->get();

        return view('admin.thongke.tuan', ['allTuan'=>$allTuan,'tuan'=>$tuan,'allPhong'=>$allPhong]);
    }


}
