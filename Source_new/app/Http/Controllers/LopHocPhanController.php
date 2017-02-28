<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LopHocPhan;

class LopHocPhanController extends Controller
{
    public function getDanhSach()
    {
    	$lophocphan = LopHocPhan::all();
    	return view('admin.lophocphan.danhsach', ['lophocphan'=>$lophocphan]);
    }

    public function getThem()
    {
    	return view('admin.lophocphan.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'MaLop'=>'required|max:255'
    		],
    		[
    			'MaLop.required'=>'Bạn chưa nhập mã môn học',
    			'MaLop.max'=>'Mã môn học có nhiều nhất 255 ký tự',
    		]);
    	$this->validate($request,
    		[
    			'TenLop'=>'required|max:255'
    		],
    		[
    			'TenLop.required'=>'Bạn chưa nhập tên lớp',
    			//'SoTinChi.number'=>'Bạn phải nhập số',
    			'TenLop.max'=>'Tên lớp không quá 255 ký tự'
    		]);
    	$lophocphan = new LopHocPhan;
        $lophocphan->idMonHoc =$request->idMonHoc;
        $lophocphan->MaLop =$request->MaLop;
    	$lophocphan->TenLop =$request->TenLop;
    	$lophocphan->SiSo =$request->SiSo;
    	$lophocphan->save();

    	return redirect('admin/lophocphan/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
    	$lophocphan = LopHocPhan::find($id);
    	return view('admin.lophocphan.sua', ['lophocphan'=>$lophocphan]);
    }

    public function postSua(Request $request, $id)
    {
    	$lophocphan = LopHocPhan::find($id);
    	$this->validate($request,
    		[
    			'TenLop'=>'required|min:3|max:255'
    		],
    		[
    			'TenLop.required'=>'Bạn chưa nhập tên lớp',
    			'TenLop.min'=>'Tên lớp có ít nhất 3 ký tự',
    			'TenLop.max'=>'Tên lớp có nhiều nhất 255 ký tự'
    		]);
    	$this->validate($request,
    		[
    			'MaLop'=>'required|min:5|max:255'
    		],
    		[
    			'MaLop.required'=>'Bạn chưa nhập mã lớp',
    			'MaLop.min'=>'Mã lớp có ít nhất 255 ký tự',
    		]);
    	$this->validate($request,
    		[
    			'SiSo'=>'required'
    			// |number
    		],
    		[
    			'SiSo.required'=>'Bạn chưa nhập sỉ số'
    		]);
    	//$this->validate($request,)

    	$lophocphan->idMonHoc = $request->idMonHoc;
    	$lophocphan->MaLop = $request->MaLop;
    	$lophocphan->TenLop = $request->TenLop;
    	$lophocphan->SiSo = $request->SiSo;
		$lophocphan->save();    	

		return redirect('admin/lophocphan/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $monhoc = MonHoc::find($id);
        $monhoc->delete();

        return redirect('admin/monhoc/danhsach')->with('thongbao','Xóa thành công');
    }
}
