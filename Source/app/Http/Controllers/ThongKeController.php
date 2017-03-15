<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lich;
use App\Phong;
use App\BoMon;
use App\ThongKe;

class ThongKeController extends Controller
{
    //
    public function getDanhSach()
    {
        $lich = Lich::all();
        $phong = Phong::all();
        $bomon = BoMon::all();
        return view('admin.thongke.danhsach', ['lich'=>$lich, 'phong'=>$phong, 'bomon'=>$bomon]);
    }

    public function chartjs()
    {
        $viewer = View::select(DB::raw("SUM(numberofview) as count"))
            ->orderBy("created_at")
            ->groupBy(DB::raw("year(created_at)"))
            ->get()->toArray();
        $viewer = array_column($viewer, 'count');
        
        $click = Click::select(DB::raw("SUM(numberofclick) as count"))
            ->orderBy("created_at")
            ->groupBy(DB::raw("year(created_at)"))
            ->get()->toArray();
        $click = array_column($click, 'count');
        
        return view('chartjs')
                ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
                ->with('click',json_encode($click,JSON_NUMERIC_CHECK));
    }

}
