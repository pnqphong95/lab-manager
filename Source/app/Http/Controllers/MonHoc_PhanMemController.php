<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonHoc;
use App\PhanMem;
use App\MonHoc_PhanMem;
use App\Phong;
use DB;

class MonHoc_PhanMemController extends Controller
{
    public function getPhanMem($id)
    {
        $monhoc = MonHoc::all();
        $phanmem = PhanMem::all();
        $monhoc_phanmem = DB::table('monhoc_phanmem')
        					->join('phanmem', 'idPhanMem', '=', 'phanmem.id')
        					->join('monhoc', 'idMonHoc', '=', 'monhoc.id')
        					->where('idMonHoc', $id)->get();
        
        return view('admin.monhoc.monhoc_phanmem', ['monhoc'=>$monhoc, 'phanmem'=>$phanmem, 'monhoc_phanmem'=>$monhoc_phanmem]);
    }
}
