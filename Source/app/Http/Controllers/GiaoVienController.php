<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiaoVien;
use DB;
use App\BoMon;
use App\ChucVu;

class GiaoVienController extends Controller
{

    public function getDanhSach()
    {
        $giaovien = GiaoVien::all();
        $bomon = BoMon::all();
        $chucvu = ChucVu::all();
        return view('admin.giaovien.danhsach', ['giaovien'=>$giaovien, 'bomon'=>$bomon, 'chucvu'=>$chucvu]);
    }

    public function getThem()
    {
        $bomon = BoMon::all();
        $chucvu = ChucVu::all();
        $giaovien = GiaoVien::all();
        return view('admin.giaovien.them', ['giaovien'=>$giaovien, 'bomon'=>$bomon, 'chucvu'=>$chucvu]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'MaGV'=>'required|max:255',
                'HoGV'=>'required|max:255',
                'TenGV'=>'required|max:255',
                'SDT'=>'required|max:11|min:10'

            ],
            [
                'MaGV.required'=>'Bạn chưa nhập mã giáo viên',
                'MaGV.max'=>'Mã giáo viên có nhiều nhất 255 ký tự',
                'HoGV.required'=>'Bạn chưa nhập họ giáo viên',
                'HoGV.max'=>'Họ giáo viên có nhiều nhất 255 ký tự',
                'TenGV.required'=>'Bạn chưa nhập tên giáo viên',
                'TenGV.max'=>'Tên giáo viên có nhiều nhất 255 ký tự',
                'SDT.required'=>'Bạn chưa nhập số điện thoại',
                'SDT.max'=>'Số điện thoại có nhiều nhất 11 chữ số',
                'SDT.min'=>'Số điện thoại có ít nhất 10 chữ số'
            ]);

        $giaovien = new GiaoVien;
        $giaovien->MaGV = $request->MaGV;
        $giaovien->HoGV = $request->HoGV;
        $giaovien->TenGV = $request->TenGV;
        $giaovien->NgaySinh = $request->NgaySinh;
        $giaovien->GioiTinh = $request->GioiTinh;
        $giaovien->SDT = $request->SDT;
        $giaovien->idBoMon = $request->idBoMon;
        $pw = password_hash("password", PASSWORD_DEFAULT);
        $giaovien->password = $pw;
        $giaovien->idChucVu = $request->idChucVu;
        $giaovien->KichHoat = $request->KichHoat;
        $giaovien->remember_token = '';
        $giaovien->save();

        return redirect('admin/giaovien/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $giaovien = GiaoVien::find($id);
        $chucvu = ChucVu::all();
        $bomon = BoMon::all();
        return view('admin.giaovien.sua', ['giaovien'=>$giaovien,'chucvu'=>$chucvu,'bomon'=>$bomon]);
    }

    public function postSua(Request $request, $id)
    {
        $giaovien = GiaoVien::find($id);
        $chucvu = ChucVu::all();
        $this->validate($request,
            [
                'MaGV'=>'required|max:255'
            ],
            [
                'MaGV.required'=>'Bạn chưa nhập mã giáo viên',
                'MaGV.max'=>'Mã giáo viên có nhiều nhất 255 ký tự'
            ]);
        $this->validate($request,
            [
                'HoGV'=>'required|max:255'
            ],
            [
                'HoGV.required'=>'Bạn chưa nhập họ giáo viên',
                'HoGV.max'=>'Họ giáo viên có nhiều nhất 255 ký tự',
            ]);
        $this->validate($request,
            [
                'TenGV'=>'required|max:255'
            ],
            [
                'TenGV.required'=>'Bạn chưa nhập tên giáo viên',
                'TenGV.max'=>'Tên giáo viên có nhiều nhất 255 ký tự',
            ]);
        $this->validate($request,
            [
                'SDT'=>'required|max:11|min:10'
            ],
            [
                'SDT.required'=>'Bạn chưa nhập số điện thoại',
                'SDT.max'=>'Số điện thoại có nhiều nhất 11 chữ số',
                'SDT.min'=>'Số điện thoại có ít nhất 10 chữ số'
            ]);

        $giaovien->MaGV =$request->MaGV;
        $giaovien->HoGV =$request->HoGV;
        $giaovien->TenGV =$request->TenGV;
        $giaovien->NgaySinh =$request->NgaySinh;
        $giaovien->GioiTinh =$request->GioiTinh;
        $giaovien->SDT =$request->SDT;
        $giaovien->idBoMon =$request->idBoMon;
        $pw = password_hash("password", PASSWORD_DEFAULT);
        $giaovien->password =$pw;
        $giaovien->idChucVu =$request->idChucVu;
        $giaovien->KichHoat =$request->KichHoat;
        // $giaovien->remember_token = '';
        $giaovien->save();

        return redirect('admin/giaovien/sua/'.$id)->with('thongbao','Sửa thành công');
    }

}
