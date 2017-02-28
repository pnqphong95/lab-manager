<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonHoc;

class MonHocController extends Controller
{
    //
    public function getDanhSach()
    {
    	$monhoc = MonHoc::all();
    	return view('admin.monhoc.danhsach', ['monhoc'=>$monhoc]);
    }

    public function getThem()
    {
    	return view('admin.monhoc.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'TenMH'=>'required|min:3|max:50'
    		],
    		[
    			'TenMH.required'=>'Bạn chưa nhập tên môn học',
    			'TenMH.min'=>'Tên môn học có ít nhất 3 ký tự',
    			'TenMH.max'=>'Tên môn học có nhiều nhất 50 ký tự'
    		]);
    	$this->validate($request,
    		[
    			'MaMH'=>'required|min:5|max:5'
    		],
    		[
    			'MaMH.required'=>'Bạn chưa nhập mã môn học',
    			'MaMH.min'=>'Mã môn học có ít nhất 5 ký tự',
    		]);
    	$this->validate($request,
    		[
    			'SoTinChi'=>'required|max:10'
    			// |number
    		],
    		[
    			'SoTinChi.required'=>'Bạn chưa nhập số tín chỉ',
    			//'SoTinChi.number'=>'Bạn phải nhập số',
    			'SoTinChi.max'=>'Số tín chỉ không quá 10'
    		]);
    	$monhoc = new MonHoc;
        $monhoc->MaMH =$request->MaMH;
        $monhoc->TenMH =$request->TenMH;
    	$monhoc->SoTinChi =$request->SoTinChi;
    	$monhoc->save();

    	return redirect('admin/monhoc/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
    	$monhoc = MonHoc::find($id);
    	return view('admin.monhoc.sua', ['monhoc'=>$monhoc]);
    }

    public function postSua(Request $request, $id)
    {
    	$monhoc = MonHoc::find($id);
    	$this->validate($request,
    		[
    			'TenMH'=>'required|min:3|max:50'
    		],
    		[
    			'TenMH.required'=>'Bạn chưa nhập tên môn học',
    			'TenMH.min'=>'Tên môn học có ít nhất 3 ký tự',
    			'TenMH.max'=>'Tên môn học có nhiều nhất 50 ký tự'
    		]);
    	$this->validate($request,
    		[
    			'MaMH'=>'required|min:5|max:5'
    		],
    		[
    			'MaMH.required'=>'Bạn chưa nhập mã môn học',
    			'MaMH.min'=>'Mã môn học có ít nhất 5 ký tự',
    		]);
    	$this->validate($request,
    		[
    			'SoTinChi'=>'required|max:10'
    			// |number
    		],
    		[
    			'SoTinChi.required'=>'Bạn chưa nhập số tín chỉ',
    			// 'SoTinChi.number'=>'Bạn phải nhập số',
    			'SoTinChi.max'=>'Số tín chỉ không quá 10'
    		]);
    	//$this->validate($request,)

    	$monhoc->MaMH = $request->MaMH;
    	$monhoc->TenMH = $request->TenMH;
    	$monhoc->SoTinChi = $request->SoTinChi;
		$monhoc->save();    	

		return redirect('admin/monhoc/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $monhoc = MonHoc::find($id);
        $monhoc->delete();

        return redirect('admin/monhoc/danhsach')->with('thongbao','Xóa thành công');
    }
}
