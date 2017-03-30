<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class VaiTroController extends Controller
{
    public function getDanhSach()
    {
        $roles = Role::all();
        return view('admin.vaitro.danhsach', ['roles'=>$roles]);
    }

    public function getThem()
    {
        return view('admin.vaitro.them');
    }

    public function postThem(Request $request)
    {
        $role = new Role;
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;       
        $role->save();
        return redirect('admin/vaitro/them')->with('thongbao','Thêm thành công');
    }

    // public function getSua($id)
    // {
    //     $giaovien = GiaoVien::find($id);
    //     $chucvu = ChucVu::all();
    //     $bomon = BoMon::all();
    //     return view('admin.giaovien.sua', ['giaovien'=>$giaovien,'chucvu'=>$chucvu,'bomon'=>$bomon]);
    // }

    // public function postSua(Request $request, $id)
    // {
    //     $giaovien = GiaoVien::find($id);
    //     $chucvu = ChucVu::all();
    //     $this->validate($request,
    //         [
    //             'MaGV'=>'required|max:255'
    //         ],
    //         [
    //             'MaGV.required'=>'Bạn chưa nhập mã giáo viên',
    //             'MaGV.max'=>'Mã giáo viên có nhiều nhất 255 ký tự'
    //         ]);
    //     $this->validate($request,
    //         [
    //             'HoGV'=>'required|max:255'
    //         ],
    //         [
    //             'HoGV.required'=>'Bạn chưa nhập họ giáo viên',
    //             'HoGV.max'=>'Họ giáo viên có nhiều nhất 255 ký tự',
    //         ]);
    //     $this->validate($request,
    //         [
    //             'TenGV'=>'required|max:255'
    //         ],
    //         [
    //             'TenGV.required'=>'Bạn chưa nhập tên giáo viên',
    //             'TenGV.max'=>'Tên giáo viên có nhiều nhất 255 ký tự',
    //         ]);
    //     $this->validate($request,
    //         [
    //             'SDT'=>'required|max:11|min:10'
    //         ],
    //         [
    //             'SDT.required'=>'Bạn chưa nhập số điện thoại',
    //             'SDT.max'=>'Số điện thoại có nhiều nhất 11 chữ số',
    //             'SDT.min'=>'Số điện thoại có ít nhất 10 chữ số'
    //         ]);

    //     $giaovien->MaGV =$request->MaGV;
    //     $giaovien->HoGV =$request->HoGV;
    //     $giaovien->TenGV =$request->TenGV;
    //     $giaovien->NgaySinh =$request->NgaySinh;
    //     $giaovien->GioiTinh =$request->GioiTinh;
    //     $giaovien->SDT =$request->SDT;
    //     $giaovien->idBoMon =$request->idBoMon;
    //     $pw = password_hash("password", PASSWORD_DEFAULT);
    //     $giaovien->password =$pw;
    //     $giaovien->idChucVu =$request->idChucVu;
    //     $giaovien->KichHoat =$request->KichHoat;
    //     // $giaovien->remember_token = '';
    //     $giaovien->save();

    //     return redirect('admin/giaovien/sua/'.$id)->with('thongbao','Sửa thành công');
    // }
}
