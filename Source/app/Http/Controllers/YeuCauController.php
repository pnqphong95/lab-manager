<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VanDe;
use App\Phong;

class YeuCauController extends Controller
{
    public function getDanhSach()
    {
    	$allVanDe = VanDe::all();
        $allPhong = Phong::all();
        return view('admin.yeucau.danhsach',['allVanDe' => $allVanDe, 'allPhong'=>$allPhong]);
        //return view('admin.yeucau.danhsach');
    }
}
