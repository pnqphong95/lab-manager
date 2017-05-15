<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonHoc;
use App\MonHoc_PhanMem;
use DB;
use App\PhanMem;

class MonHocController extends Controller
{
    //
    public function getDanhSach()
    {
        $monhoc = MonHoc::all();
        $ycpm = MonHoc_PhanMem::all();
        $pm = PhanMem::all();
        return view('admin.monhoc.danhsach', ['monhoc'=>$monhoc, 'ycpm' => $ycpm, 'pms' => $pm]);
    }

    public function getThem()
    {
        return view('admin.monhoc.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'TenMH'=>'required|min:3|max:255',
                'MaMH'=>'required|min:5|max:5',
                //'MaMH'=>'unique: monhoc, MaMH',
                'SoTinChi'=>'required'
            ],
            [
                'TenMH.required'=>'Bạn chưa nhập tên môn học',
                'TenMH.min'=>'Tên môn học có ít nhất 3 ký tự',
                'TenMH.max'=>'Tên môn học có nhiều nhất 255 ký tự',
                'MaMH.required'=>'Bạn chưa nhập mã môn học',
                'MaMH.min'=>'Mã môn học có độ dài 5 ký tự',
                'MaMH.max'=>'Mã môn học có độ dài 5 ký tự',
                //'MaMH.unique'=>'Mã môn học không được trùng',
                'SoTinChi.required'=>'Bạn chưa nhập số tín chỉ'
            ]);

        $monhoc = new MonHoc();
        $monhoc->MaMH =$request->MaMH;
        $monhoc->TenMH =$request->TenMH;
        $monhoc->SoTinChi =$request->SoTinChi;
        $monhoc->save();

        $last= MonHoc::orderBy('id','desc')->first();

        return redirect('admin/monhoc/sua/'.$last->id)->with('thongbao','Thêm thành công');        
    }

    public function getSua($id)
    {
        $monhoc = MonHoc::find($id);
        $monhoc_phanmem = DB::table('monhoc_phanmem')
                            ->join('phanmem','monhoc_phanmem.idPhanMem','phanmem.id')
                            ->where('idMonHoc',$id)->get();
        $a = DB::table('monhoc_phanmem')->select('idPhanMem')->where('idMonHoc',$id);
        $phanmem = DB::table('phanmem')->whereNotIn('id',$a)->get();

        return view('admin.monhoc.sua', ['monhoc'=>$monhoc,
                                        'phanmem'=>$phanmem,
                                        'monhoc_phanmem'=>$monhoc_phanmem
                                        ]);
    }

    public function postSua(Request $request, $id)
    {
        $monhoc = MonHoc::find($id);
        $this->validate($request,
            [
                'TenMH'=>'required|min:3|max:255',
                'MaMH'=>'required|min:5|max:5',
                'MaMH'=>'unique: monhoc, MaMH',
                'SoTinChi'=>'required'
            ],
            [
                'TenMH.required'=>'Bạn chưa nhập tên môn học',
                'TenMH.min'=>'Tên môn học có ít nhất 3 ký tự',
                'TenMH.max'=>'Tên môn học có nhiều nhất 255 ký tự',
                'MaMH.required'=>'Bạn chưa nhập mã môn học',
                'MaMH.min'=>'Mã môn học có độ dài 5 ký tự',
                'MaMH.max'=>'Mã môn học có độ dài 5 ký tự',
                'MaMH.unique'=>'Mã môn học không được trùng',
                'SoTinChi.required'=>'Bạn chưa nhập số tín chỉ'
            ]);

        $monhoc->MaMH = $request->MaMH;
        $monhoc->TenMH = $request->TenMH;
        $monhoc->SoTinChi = $request->SoTinChi;
        $monhoc->save();        

        return redirect('admin/monhoc/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $mhpm = DB::table('monhoc_phanmem')->where('idMonHoc',$id)->get();
        foreach ($mhpm as $mhpm) {
            unset($mhpm);
        }
        $monhoc = MonHoc::find($id);
        $monhoc->delete();
        
        return redirect('admin/monhoc/danhsach')->with('thongbao','Xóa thành công');
    }

    public function getChiTiet($id)
    {
        $monhoc = MonHoc::find($id);
        $allPhanMem = PhanMem::all();
        $a = DB::table('monhoc_phanmem')->select('idPhanMem')->where('idMonHoc',$id);
        $phanmem = DB::table('phanmem')->whereNotIn('id',$a)->get();

        return view('admin.monhoc.chitiet', ['monhoc'=>$monhoc,
                                            'phanmem'=>$phanmem,
                                            'allPhanMem'=>$allPhanMem
                                            ]);
    }

    public function postThemPM(Request $request,$id)
    {
        $monhoc_phanmem = new MonHoc_PhanMem();
        $monhoc_phanmem->idMonHoc =$request->idMonHoc;
        $monhoc_phanmem->idPhanMem =$request->idPhanMem;
        $monhoc_phanmem->save();

        return redirect('admin/monhoc/chitiet/'.$id)->with('thongbao','Thêm thành công');        
    }

    public function postSuaPM(Request $request,$id)
    {
        $monhoc_phanmem = new MonHoc_PhanMem();
        $monhoc_phanmem->idMonHoc =$request->idMonHoc;
        $monhoc_phanmem->idPhanMem =$request->idPhanMem;
        $monhoc_phanmem->save();

        return redirect('admin/monhoc/sua/'.$id)->with('thongbao','Thêm thành công');        
    }

    public function getXoaPM($idPM, $idMonHoc)
    {
        $monhoc_phanmem = MonHoc_PhanMem::where('idMonHoc',$idMonHoc)->where('idPhanMem',$idPM)->first();
        $monhoc_phanmem->delete();
        
        return redirect('admin/monhoc/sua/'.$idMonHoc)->with('thongbao','Xóa thành công');
    }
}
