<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PHPExcel; 
use PHPExcel_IOFactory;
use App\LopHocPhan;
use App\HocKy_NienKhoa;

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

    public function getThemExcel ()
    {
    	return view('admin.lophocphan.themexcel');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'MaCB'=>'required|min:4|max:6',
                'MaHP'=>'required|min:5|max:10',
                'Nhom'=>'required',
                'SoSV'=>'required'
            ],
            [
                'MaCB.required'=>'Bạn chưa nhập mã cán bộ',
                'MaCB.min'=>'Mã cán bộ có ít nhất 4 ký tự',
                'MaCB.max'=>'Mã cán bộ có nhiều nhất 6 ký tự',
                'MaHP.required'=>'Bạn chưa nhập mã học phần',
                'MaHP.min'=>'Mã cán bộ có ít nhất 4 ký tự',
                'MaHP.max'=>'Mã cán bộ có nhiều nhất 10 ký tự',
                'Nhom.required'=>'Bạn chưa nhập nhóm',
                'SoSV.required'=>'Bạn chưa nhập số sinh viênlophocphan'
            ]);
        $lastHKNK = HocKy_NienKhoa::orderBy('id','desc')->first();

        $lophocphan = new LopHocPhan;
        $lophocphan->MaCB =$request->MaCB;
        $lophocphan->MaHP =$request->MaHP;
        $lophocphan->Nhom =$request->Nhom;
        $lophocphan->SoSV =$request->SoSV;
        $lophocphan->idHocKyNienKhoa = $lastHKNK->id;
        $lophocphan->save();

        return redirect('admin/lophocphan/danhsach')->with('thongbao','Thêm lớp học phần thành công');
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
                'MaCB'=>'required|min:4|max:6',
                'MaHP'=>'required|min:5|max:10',
                'Nhom'=>'required',
                'SoSV'=>'required'
            ],
            [
                'MaCB.required'=>'Bạn chưa nhập mã cán bộ',
                'MaCB.min'=>'Mã cán bộ có ít nhất 4 ký tự',
                'MaCB.max'=>'Mã cán bộ có nhiều nhất 6 ký tự',
                'MaHP.required'=>'Bạn chưa nhập mã học phần',
                'MaHP.min'=>'Mã cán bộ có ít nhất 4 ký tự',
                'MaHP.max'=>'Mã cán bộ có nhiều nhất 10 ký tự',
                'Nhom.required'=>'Bạn chưa nhập nhóm',
                'SoSV.required'=>'Bạn chưa nhập số sinh viênlophocphan'
            ]);
        $lastHKNK = HocKy_NienKhoa::orderBy('id','desc')->first();

        $lophocphan->MaCB =$request->MaCB;
        $lophocphan->MaHP =$request->MaHP;
        $lophocphan->Nhom =$request->Nhom;
        $lophocphan->SoSV =$request->SoSV;
        $lophocphan->idHocKyNienKhoa = $lastHKNK->id;
        $lophocphan->save();        

        return redirect('admin/lophocphan/sua/'.$id)->with('thongbao','Sửa học phần thành công');
    }

    public function getXoa($id)
    {
        $lophocphan = LopHocPhan::find($id);
        $lophocphan->delete();
        
        return redirect('admin/lophocphan/danhsach')->with('thongbao','Xóa lớp học phần thành công');
    }

	public function getIPLopHocPham ()
	{
		return view('im');
	}	

    public function importExcel()
	{
		$i = 0;
		if(Input::hasFile('import_file'))
		{
			$path = Input::file('import_file')->getRealPath();
			$inputFileType = 'Excel5';
			$inputFileName = $path;
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcelReader = $objReader->load($inputFileName);

			$loadedSheetNames = $objPHPExcelReader->getSheetNames();

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcelReader, 'CSV');

			foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) 
			{
			    $objWriter->setSheetIndex($sheetIndex);
			    $objWriter->save($loadedSheetName.'.csv');
			}

			$i=1;
			$filename=$loadedSheetName.'.csv';
			$file = fopen($filename, "r");

			while(($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
			{
	    		if ($emapData[1] == "" || $emapData[1] == "Mã CB")
	    		{}
	    		else
	    		{
	    			$hocphan = new LopHocPhan();
	    			$hocphan->MaCB = substr($emapData[1], 1);
	    			$hocphan->MaHP = $emapData[3];
	    			$hocphan->Nhom = substr($emapData[5], 1);
	    			$hocphan->SoSV = $emapData[6];
	    			$hocphan->idHocKyNienKhoa = 2;
	    			$hocphan->save();
	    		}
			}
			fclose($file);
			unlink ($filename);
		}
		return back()->with('thongbao', 'Đã nhập thành công!');
	}
}
