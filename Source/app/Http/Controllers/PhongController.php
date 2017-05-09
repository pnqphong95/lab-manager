<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use App\BoMon;
use App\PhanMem;
use App\Phong_PhanMem;
use DB;
use App\CauHinh;

class PhongController extends Controller
{
    public function getDanhSach()
    {
        $phong = Phong::all();
        $bomon = BoMon::all();
        $phong_phanmem = DB::table('phong_phanmem')->join('phanmem','phong_phanmem.idPhanMem','phanmem.id')->get();
        return view('admin.phong.danhsach', ['phong'=>$phong, 'bomon'=>$bomon,'phong_phanmem'=>$phong_phanmem]);
    }

    public function getChiTiet($id){
        $phong = Phong::find($id);
        $allBoMon = BoMon::all();
        $phong_phanmem = DB::table('phong_phanmem')
                            ->join('phanmem','phong_phanmem.idPhanMem','phanmem.id')
                            ->where('idPhong',$id)->get();
        $allPhanMem = PhanMem::all();
        $a = DB::table('phong_phanmem')->select('idPhanMem')->where('idPhong',$id);
        $phanmem = DB::table('phanmem')->whereNotIn('id',$a)->get();

        return view('admin.phong.chitiet', compact('phong','allBoMon','phong_phanmem','allPhanMem','phanmem'));
    }

    public function postThemPM(Request $request,$id)
    {
        $phong_phanmem = new Phong_PhanMem();
        $phong_phanmem->idPhong =$request->idPhong;
        $phong_phanmem->idPhanMem =$request->idPhanMem;
        $phong_phanmem->save();

        return redirect('admin/phong/chitiet/'.$id)->with('thongbao','Thêm thành công');        
    }

    public function getThem()
    {
        $allBoMon = BoMon::all();
        $phanmem = PhanMem::all();
        return view('admin.phong.them', ['allBoMon' => $allBoMon, 'phanmem'=>$phanmem]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'TenPhong'=>'required|max:255',
                'TenPhong' => 'unique:phong,TenPhong',
                'DLRam'=>'required',
                'DLOCung'=>'required',
                'CPU'=>'required|max:255',
                'GPU'=>'required|max:255'
            ],
            [
                'TenPhong.required'=>'Bạn chưa nhập tên phòng',
                'TenPhong.max'=>'Tên phòng có nhiều nhất 255 ký tự',
                'DLRam.required'=>'Bạn chưa nhập dung lượng ram',
                'DLOCung.required'=>'Bạn chưa nhập dung lượng ổ cứng',
                'CPU.required'=>'Bạn chưa nhập thông tin CPU',
                'CPU.max'=>'Thông tin CPU có nhiều nhất 255 ký tự',
                'GPU.required'=>'Bạn chưa nhập thông tin GPU',
                'GPU.max'=>'Thông tin GPU có nhiều nhất 255 ký tự',
                'TenPhong.unique' => 'Tên phòng đã tồn tại'
            ]);

        $phong = new Phong;
        $phong->TenPhong =$request->TenPhong;
        $phong->idBoMon = $request->idBoMon;
        $phong->DLRam =$request->DLRam;
        $phong->DLOCung =$request->DLOCung;
        $phong->CPU =$request->CPU;
        $phong->GPU =$request->GPU;

        $phong->save();

        $a = $phong->id;
        return redirect('admin/phong/chitiet/'.$a)->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $phong = Phong::find($id);
        $bomon = BoMon::all();
        $phong_phanmem = DB::table('phong_phanmem')
                            ->join('phanmem','phong_phanmem.idPhanMem','phanmem.id')
                            ->where('idPhong',$id)->get();
        $a = DB::table('phong_phanmem')->select('idPhanMem')->where('idPhong',$id);
        $phanmem = DB::table('phanmem')->whereNotIn('id',$a)->get();
        return view('admin.phong.sua', compact('phong','bomon','phong_phanmem','phanmem'));
    }

    public function postSua(Request $request, $id)
    {
        $phong = Phong::find($id);
        $bomon = BoMon::all();
        $phong_phanmem = DB::table('phong_phanmem')
                            ->join('phanmem','phong_phanmem.idPhanMem','phanmem.id')
                            ->where('idPhong',$id)->get();
        $a = DB::table('phong_phanmem')->select('idPhanMem')->where('idPhong',$id);
        $phanmem = DB::table('phanmem')->whereNotIn('id',$a)->get();
        
        $phong->TenPhong = $request->TenPhong;
        $phong->idBoMon = $request->idBoMon;
        $phong->DLRam = $request->DLRam;
        $phong->DLOCung = $request->DLOCung;
        $phong->CPU = $request->CPU;
        $phong->GPU = $request->GPU;
        $phong->save();

        return redirect('admin/phong/chitiet/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $phong = Phong::find($id);
        $phong->delete();

        return redirect('admin/phong/danhsach')->with('thongbao','Xóa thành công');
    }

    public function getXoaPM($idPM, $idPhong)
    {
        $phong_phanmem = Phong_PhanMem::where('idPhong',$idPhong)->where('idPhanMem',$idPM)->first();
        $phong_phanmem->delete();
        
        return redirect('admin/phong/sua/'.$idPhong)->with('thongbao','Xóa thành công');
    }
}
