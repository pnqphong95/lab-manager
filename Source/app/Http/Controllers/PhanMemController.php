<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonHoc;
use App\MonHoc_PhanMem;
use App\PhanMem;

class PhanMemController extends Controller
{
        public function getDanhSach()
    {
        $phanmem = PhanMem::all();
        return view('admin.phanmem.danhsach', ['phanmem'=>$phanmem]);
    }

	public function getThem()
    {
        return view('admin.phanmem.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'TenPM'=>'required|min:3|max:255',
                'PhienBan'=>'required|min:3|max:255'
            ],
            [
                'TenPM.required'=>'Bạn chưa nhập tên môn học',
                'TenPM.min'=>'Tên môn học có ít nhất 3 ký tự',
                'TenPM.max'=>'Tên môn học có nhiều nhất 255 ký tự',
                'PhienBan.required'=>'Bạn chưa nhập tên môn học',
                'PhienBan.min'=>'Tên môn học có ít nhất 3 ký tự',
                'PhienBan.max'=>'Tên môn học có nhiều nhất 255 ký tự'

            ]);
       
        $phanmem = new PhanMem;
        $phanmem->TenPM =$request->TenPM;
        $phanmem->PhienBan =$request->PhienBan;
        $phanmem->save();

        return redirect('admin/phanmem/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $phanmem = PhanMem::find($id);
        return view('admin.phanmem.sua', ['phanmem'=>$phanmem]);
    }

    public function postSua(Request $request, $id)
    {
        $phanmem = PhanMem::find($id);
        $this->validate($request,
            [
                'TenPM'=>'required|min:3|max:255',
                'PhienBan'=>'required|min:3|max:255'
            ],
            [
                'TenPM.required'=>'Bạn chưa nhập tên môn học',
                'TenPM.min'=>'Tên môn học có ít nhất 3 ký tự',
                'TenPM.max'=>'Tên môn học có nhiều nhất 255 ký tự',
                'PhienBan.required'=>'Bạn chưa nhập tên môn học',
                'PhienBan.min'=>'Tên môn học có ít nhất 3 ký tự',
                'PhienBan.max'=>'Tên môn học có nhiều nhất 255 ký tự'

            ]);

        $phanmem->TenPM = $request->TenPM;
        $phanmem->PhienBan = $request->PhienBan;
        $phanmem->save();        

        return redirect('admin/phanmem/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $phanmem = PhanMem::find($id);
        $phanmem->delete();
        
        return redirect('admin/phanmem/danhsach')->with('thongbao','Xóa thành công');
    }
 
}
