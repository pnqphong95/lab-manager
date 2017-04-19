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
    public function getDanhSachPM($id)
    {
        $monhoc = MonHoc::find($id);
        $phanmem = PhanMem::all();
        
        $monhoc_phanmem = DB::table('monhoc_phanmem')->where('idMonHoc',$id)->get();

        return view('admin.monhoc.monhoc_phanmem', ['monhoc'=>$monhoc, 'phanmem'=>$phanmem, 'monhoc_phanmem'=>$monhoc_phanmem]);
    }

    public function getXoaPM($id)
    {
        $mhpm = MonHoc_PhanMem::find($id);
        $monhoc = DB::table('monhoc_phanmem')->select('idMonHoc')
                                            ->where('id', $id);
        settype($monhoc, "integer");

        $mhpm->delete();
        
        return redirect('admin/monhoc/monhoc_phanmem/'.$monhoc)->with('thongbao','Xóa thành công');
    }

    public function getThemPM($id)
    {
        $monhoc = MonHoc::find($id);
        $a = DB::table('monhoc_phanmem')->select('idPhanMem')->where('idMonHoc',$id);
        $phanmem = DB::table('phanmem')->whereNotIn('id',$a)->get();
        
        return view('admin.monhoc.themphanmem', ['monhoc'=>$monhoc,'phanmem'=>$phanmem]);
    }

    public function postThemPM(Request $request,$id)
    {
        $monhoc_phanmem = new MonHoc_PhanMem();
        $monhoc_phanmem->idMonHoc =$request->idMonHoc;
        $monhoc_phanmem->idPhanMem =$request->idPhanMem;
        $monhoc_phanmem->save();

        return redirect('admin/monhoc/monhoc_phanmem/'.$id)->with('thongbao','Thêm thành công');        
    }
}
