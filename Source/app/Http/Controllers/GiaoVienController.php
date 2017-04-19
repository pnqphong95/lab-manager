<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiaoVien;
use DB;
use App\BoMon;
use App\ChucVu;
use App\Role_User;
use App\Role;
use App\User;

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

    public function getChiTietById($id)
    {
        $admin = false;
        $normal = false;
        $manager = false;
        $giaovien = User::where ('id', '=', $id)->first();
        $bomon = BoMon::all();
        $role_user = Role_User::where('user_id', '=', $id)->get();
        foreach ($role_user as $ru) 
        {
            if ($ru->role_id == 1) $admin = true;
            else if ($ru->role_id == 2) $manager = true;
            else $normal = true;
        }

        return view ('admin.giaovien.chitiet',  [   
                                                    'giaovien' => $giaovien, 
                                                    'bomon' => $bomon, 
                                                    'role_user' => $role_user,
                                                    'admin' => $admin,
                                                    'normal' => $normal,
                                                    'manager' => $manager
                                                ]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'MaGV'=>'required|min:4|max:4|unique:giaovien',
                'HoGV'=>'required|max:255',
                'TenGV'=>'required|max:255',
                'Email'=>'required|max:255',
                'SDT'=>'required|max:11|min:10',

            ],
            [
                'TenGV.required'=>'Bạn chưa nhập tên giáo viên',
                'TenGV.max'=>'Tên giáo viên có nhiều nhất 255 ký tự',
                'MaGV.required'=>'Bạn chưa nhập mã giáo viên',
                'MaGV.unique'=>'Mật khẩu có độ dài 4 ký tự',
                'MaGV.max'=>'Mã giáo viên có nhiều nhất 255 ký tự',
                'HoGV.required'=>'Bạn chưa nhập họ giáo viên',
                'HoGV.max'=>'Họ giáo viên có nhiều nhất 255 ký tự',
                'SDT.required'=>'Bạn chưa nhập số điện thoại',
                'SDT.max'=>'Số điện thoại có nhiều nhất 11 chữ số',
                'SDT.min'=>'Số điện thoại có ít nhất 10 chữ số',
                'Email.required'=>'Bạn chưa nhập email'
            ]);

        $giaovien = new GiaoVien;
        $giaovien->MaGV = $request->MaGV;
        $giaovien->HoGV = $request->HoGV;
        $giaovien->TenGV = $request->TenGV;
        $giaovien->NgaySinh = $request->NgaySinh;
        $giaovien->GioiTinh = $request->GioiTinh;
        $giaovien->SDT = $request->SDT;
        $giaovien->Email = $request->Email;
        $giaovien->idBoMon = $request->idBoMon;
        $pw = password_hash($request->password, PASSWORD_DEFAULT);
        $giaovien->password = $pw;
        $giaovien->idChucVu = $request->idChucVu;
        $giaovien->KichHoat = $request->KichHoat;
        $giaovien->remember_token = '';
        $giaovien->save();
        if ($giaovien->MaGV==null) {
            return redirect('admin/giaovien/them')->with('thongbao','Thêm không thành công');
        }
        else return redirect('admin/giaovien/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $giaovien = GiaoVien::find($id);
        if( is_null($giaovien)) return redirect('admin/giaovien/danhsach');
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
                'MaGV'=>'required|min:4|max:4',
                'HoGV'=>'required|max:255',
                'TenGV'=>'required|max:255',
                'Email'=>'required|max:255',
                'SDT'=>'required|max:11|min:10',

            ],
            [
                'TenGV.required'=>'Bạn chưa nhập tên giáo viên',
                'TenGV.max'=>'Tên giáo viên có nhiều nhất 255 ký tự',
                'MaGV.required'=>'Bạn chưa nhập mã giáo viên',
                'MaGV.max'=>'Mã giáo viên có 4 ký tự',
                'HoGV.required'=>'Bạn chưa nhập họ giáo viên',
                'HoGV.max'=>'Họ giáo viên có nhiều nhất 255 ký tự',
                'SDT.required'=>'Bạn chưa nhập số điện thoại',
                'SDT.max'=>'Số điện thoại có nhiều nhất 11 chữ số',
                'SDT.min'=>'Số điện thoại có ít nhất 10 chữ số',
                'Email.required'=>'Bạn chưa nhập email'
            ]);

        $giaovien->MaGV =$request->MaGV;
        $giaovien->HoGV =$request->HoGV;
        $giaovien->TenGV =$request->TenGV;
        $giaovien->NgaySinh =$request->NgaySinh;
        $giaovien->GioiTinh =$request->GioiTinh;
        $giaovien->SDT =$request->SDT;
        $giaovien->Email = $request->Email;
        $giaovien->idBoMon =$request->idBoMon;
        $pw = password_hash($request->password, PASSWORD_DEFAULT);
        $giaovien->password =$pw;
        $giaovien->idChucVu =$request->idChucVu;
        $giaovien->KichHoat =$request->KichHoat;
        // $giaovien->remember_token = '';
        $giaovien->save();

        return redirect('admin/giaovien/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $giaovien = GiaoVien::find($id);
        if(is_null($giaovien)) return redirect('admin/giaovien/danhsach');
        $giaovien->delete();
        return redirect('admin/giaovien/danhsach')->with('thongbao','Xóa thành công');
    }
}
