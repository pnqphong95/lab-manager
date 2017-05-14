<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\HocKy_NienKhoa;

class HocKy_NienKhoaController extends Controller
{
    public function getDanhSach()
    {
        $hocky = HocKy_NienKhoa::all();
        return view('admin.hocky.danhsach', ['hocky'=>$hocky]);
    }

    public function getThem()
    {
        return view('admin.hocky.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'HocKy'=>'required',
                'NienKhoa'=>'required',
                'NgayBD'=>'required'
            ],
            [
                'HocKy.required'=>'Bạn chưa nhập tên bộ môn',
                'NienKhoa.required'=>'Bạn chưa nhập niên khóa',
                'NgayBD.required'=>'Bạn chưa nhập ngày bắt đầu học kỳ'
            ]);
        
        $hocky = new HocKy_NienKhoa();
        $hocky->HocKy =$request->HocKy;
        $hocky->NienKhoa =$request->NienKhoa;
        $hocky->NgayBD =$request->NgayBD;
        $hocky->save();

        return redirect('admin/hocky/danhsach')->with('thongbao','Thêm học kỳ {{$hocky->HocKy}}/{{$hocky->NienKhoa}} thành công');
    }

    public function getSua($id)
    {
        $id = Crypt::decrypt($id);
        $hocky = HocKy_NienKhoa::find($id);
        if(is_null($hocky)) return redirect('admin/hocky/danhsach');
        return view('admin.hocky.sua', ['hocky'=>$hocky]);
    }

    public function postSua(Request $request, $id)
    {
        $bomon = BoMon::find($id);
        $this->validate($request,
            [
                'TenBM'=>'required|min:3|max:50'
            ],
            [
                'TenBM.required'=>'Bạn chưa nhập tên bộ môn',
                'TenBM.min'=>'Tên bộ môn có ít nhất 3 ký tự',
                'TenBM.max'=>'Tên bộ môn có nhiều nhất 50 ký tự'
            ]);
        $bomon->TenBM =$request->TenBM;
        $bomon->save();
        return redirect('admin/bomon/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $id = Crypt::decrypt($id);
        $hocky = HocKy_NienKhoa::find($id);
        if(is_null($hocky)) return redirect('admin/hocky/danhsach');
        $hocky->delete();
        return redirect('admin/hocky/danhsach')->with('thongbao','Xóa học kỳ thành công');
    }
}
