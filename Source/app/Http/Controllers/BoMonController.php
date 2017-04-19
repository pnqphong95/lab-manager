<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\BoMon;

class BoMonController extends Controller
{
    public function getDanhSach()
    {
        $bomon = BoMon::all();
        return view('admin.bomon.danhsach', ['bomon'=>$bomon]);
    }

    public function getThem()
    {
        return view('admin.bomon.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'TenBM'=>'required|min:5|max:255'
            ],
            [
                'TenBM.required'=>'Bạn chưa nhập tên bộ môn',
                'TenBM.min'=>'Tên bộ môn có ít nhất 5 ký tự và có nhiều nhất 255 ký tự',
                'TenBM.max'=>'Tên bộ môn có ít nhất 5 ký tự và có nhiều nhất 255 ký tự'
            ]);
        
        $bomon = new BoMon;
        $bomon->TenBM =$request->TenBM;
        $bomon->save();

        return redirect('admin/bomon/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $id = Crypt::decrypt($id);
        $bomon = BoMon::find($id);
        if(is_null($bomon)) return redirect('admin/bomon/danhsach');
        return view('admin.bomon.sua', ['bomon'=>$bomon]);
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
        $bomon = BoMon::find($id);
        if(is_null($bomon)) return redirect('admin/bomon/danhsach');
        $bomon->delete();
        return redirect('admin/bomon/danhsach')->with('thongbao','Xóa thành công');
    }
}
