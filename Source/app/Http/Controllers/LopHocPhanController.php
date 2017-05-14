<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PHPExcel; 
use PHPExcel_IOFactory;
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

    public function getThemExcel ()
    {
    	return view('admin.lophocphan.themexcel');
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
                'PhienBan.required'=>'Bạn chưa nhập phiên bản',
                'PhienBan.min'=>'Thông tin phiên bản có ít nhất 3 ký tự',
                'PhienBan.max'=>'Thông tin phiên bản có nhiều nhất 255 ký tự'

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
                'PhienBan.required'=>'Bạn chưa nhập phiên bản',
                'PhienBan.min'=>'Thông tin phiên bản có ít nhất 3 ký tự',
                'PhienBan.max'=>'Thông tin phiên bản có nhiều nhất 255 ký tự'
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
