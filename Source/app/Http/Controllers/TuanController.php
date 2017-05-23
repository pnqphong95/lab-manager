<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Tuan;

class TuanController extends Controller
{
    public function getDanhSach()
    {
        $tuan = Tuan::all();
        return view('admin.tuan.danhsach', ['tuan'=>$tuan]);
    }

    public function getThem()
    {
        return view('admin.tuan.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'TenTuan'=>'required|min:2|max:4',
                'TenVietTat'=>'required|min:3|max:4'
            ],
            [
                'TenTuan.required'=>'Bạn chưa nhập tên tuần',
                'TenTuan.min'=>'Tên tuần có ít nhất 2 ký tự và có nhiều nhất 4 ký tự',
                'TenTuan.max'=>'Tên tuần có ít nhất 2 ký tự và có nhiều nhất 4 ký tự',
                'TenVietTat.required'=>'Bạn chưa nhập tên tuần',
                'TenVietTat.min'=>'Tên tuần có ít nhất 3 ký tự và có nhiều nhất 4 ký tự',
                'TenVietTat.max'=>'Tên tuần có ít nhất 3 ký tự và có nhiều nhất 4 ký tự',
            ]);
        
        $tuan = new Tuan;
        $tuan->TenTuan =$request->TenTuan;
        $tuan->TenVietTat =$request->TenVietTat;
        $tuan->save();

        return redirect('admin/tuan/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $id = Crypt::decrypt($id);
        $tuan = Tuan::find($id);
        if(is_null($tuan)) return redirect('admin/tuan/danhsach');
        return view('admin.tuan.sua', ['tuan'=>$tuan]);
    }

    public function postSua(Request $request, $id)
    {
        $tuan = Tuan::find($id);
        $this->validate($request,
            [
                'TenTuan'=>'required|min:2|max:4',
                'TenVietTat'=>'required|min:3|max:4'
            ],
            [
                'TenTuan.required'=>'Bạn chưa nhập tên tuần',
                'TenTuan.min'=>'Tên tuần có ít nhất 2 ký tự và có nhiều nhất 4 ký tự',
                'TenTuan.max'=>'Tên tuần có ít nhất 2 ký tự và có nhiều nhất 4 ký tự',
                'TenVietTat.required'=>'Bạn chưa nhập tên tuần',
                'TenVietTat.min'=>'Tên tuần có ít nhất 3 ký tự và có nhiều nhất 4 ký tự',
                'TenVietTat.max'=>'Tên tuần có ít nhất 3 ký tự và có nhiều nhất 4 ký tự',
            ]);
        $tuan->TenTuan =$request->TenTuan;
        $tuan->TenVietTat =$request->TenVietTat;
        $tuan->save();
        return redirect('admin/tuan/danhsach')->with('thongbao','Sửa tuần thành công');
    }

    public function getXoa($id)
    {
        $id = Crypt::decrypt($id);
        $tuan = Tuan::find($id);
        if(is_null($tuan)) return redirect('admin/tuan/danhsach');
        $tuan->delete();
        return redirect('admin/tuan/danhsach')->with('thongbao','Xóa tuần thành công');
    }
}
