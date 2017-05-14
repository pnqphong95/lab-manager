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
        $admin = false;
        $normal = false;
        $manager = false;
        $role_user = Role_User::all();
        $role_user = DB::table('Role_User')->join('giaovien',
                                                 'role_user.user_id',
                                                 '=',
                                                 'giaovien.id')->get();
        $quyen_admin = Role_User::where('role_id',1);
        $quyen_manager = Role_User::where('role_id',2);
        $quyen_normal = Role_User::where('role_id',3);
        foreach ($role_user as $ru) 
        {
            if ($ru->role_id == 1) $admin = true;
            else if ($ru->role_id == 2) $manager = true;
            else $normal = true;
        }
        return view('admin.giaovien.danhsach', [    'giaovien'=>$giaovien,
                                                    'bomon'=>$bomon,
                                                    'chucvu'=>$chucvu,
                                                    'role_user'=>$role_user,
                                                    'admin'=>$admin,
                                                    'normal'=>$normal,
                                                    'manager'=>$manager,
                                                        'quyen_admin'=>$quyen_admin,
                                                        'quyen_manager'=>$quyen_manager,
                                                        'quyen_normal'=>$quyen_normal
                                                        ]);
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
                'NgaySinh'=>'required',
                'Email'=>'required|unique:giaovien|max:255',
                'SDT'=>'required|unique:giaovien|max:11|min:10',
                'password' => 'required'
            ],
            [   
                'HoGV.required'=>'Bạn chưa nhập tên người dùng',
                'HoGV.max'=>'Tên người dùng có độ dài tối đa 255 ký tự',
                'TenGV.required'=>'Bạn chưa nhập tên người dùng',
                'TenGV.max'=>'Tên người dùng có độ dài tối đa 255 ký tự',
                'NgaySinh.required'=>'Bạn chưa chọn ngày sinh',
                'MaGV.required'=>'Bạn chưa nhập mã người dùng',
                'MaGV.unique'=>'Mã người dùng không được phép trùng',
                'MaGV.max'=>'Mã người dùng có nhiều nhất 255 ký tự',
                'HoGV.required'=>'Bạn chưa nhập họ người dùng',
                'HoGV.max'=>'Họ người dùng có nhiều nhất 255 ký tự',
                'SDT.required'=>'Bạn chưa nhập số điện thoại',
                'SDT.max'=>'Số điện thoại có nhiều nhất 11 chữ số',
                'SDT.min'=>'Số điện thoại có ít nhất 10 chữ số',
                'SDT.unique'=>'Số điện thoại bị trùng',
                'Email.required'=>'Bạn chưa nhập email',
                'Email.unique'=>'Email bị trùng',
                'password.required'=>'Bạn phải nhập password'
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
        $giaovien->KichHoat = 1;
        $giaovien->remember_token = '';
        $giaovien->save();

        $user = User::where ('MaGV', $request->MaGV)->first();
        $role = Role::where('name', 'normal')->first();
        $user->attachRole($role);
        //$a = $phong->id;
        return redirect('admin/giaovien/danhsach')->with('thongbao','Thêm người dùng thành công!');
    }

    public function getSua($id)
    {
        $admin = false;
        $normal = false;
        $manager = false;
        $giaovien = User::where ('id', '=', $id)->first();
        $bomon = BoMon::all();
        $chucvu = ChucVu::all();
        $role_user = Role_User::where('user_id', '=', $id)->get();
        foreach ($role_user as $ru) 
        {
            if ($ru->role_id == 1) $admin = true;
            else if ($ru->role_id == 2) $manager = true;
            else $normal = true;
        }

        return view ('admin.giaovien.sua',  [   
                                                    'giaovien' => $giaovien, 
                                                    'bomon' => $bomon,
                                                    'chucvu' =>$chucvu,
                                                    'role_user' => $role_user,
                                                    'admin' => $admin,
                                                    'normal' => $normal,
                                                    'manager' => $manager
                                                ]);
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
                'SDT'=>'required|max:11|min:10',

            ],
            [
                'TenGV.required'=>'Bạn chưa nhập tên người dùng',
                'TenGV.max'=>'Tên người dùng có nhiều nhất 255 ký tự',
                'MaGV.required'=>'Bạn chưa nhập mã người dùng',
                'MaGV.max'=>'Mã người dùng có 4 ký tự',
                'HoGV.required'=>'Bạn chưa nhập họ người dùng',
                'HoGV.max'=>'Họ người dùng có nhiều nhất 255 ký tự',
                'SDT.required'=>'Bạn chưa nhập số điện thoại',
                'SDT.max'=>'Số điện thoại có nhiều nhất 11 chữ số',
                'SDT.min'=>'Số điện thoại có ít nhất 10 chữ số',
            ]);

    if($request->changePass == "on")
        {
            $this->validate($request,[
                'password'=>'required|min:6|max:8',
                'matkhau2'=>'required|same:password'
            ],[
                'password.required'=>'Bạn chưa nhập mật khẩu !',
                'password.min'=>'Mật khẩu phải độ dài ít nhất 6 ký tự và dài nhất 8 ký tự !',
                'password.max'=>'Mật khẩu phải độ dài ít nhất 6 ký tự và dài nhất 8 ký tự !',
                'matkhau2.required'=>'Bạn chưa nhập lại mật khẩu !',
                'matkhau2.same'=>'Mật khẩu nhập lại chưa khớp !',
            ]);

            $giaovien->password = bcrypt($request->matkhau);
        }

        $giaovien->MaGV =$request->MaGV;
        $giaovien->HoGV =$request->HoGV;
        $giaovien->TenGV =$request->TenGV;
        $giaovien->NgaySinh =$request->NgaySinh;
        $giaovien->GioiTinh =$request->GioiTinh;
        $giaovien->SDT =$request->SDT;
        $giaovien->idBoMon =$request->idBoMon;
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

    public function getDoiMK($id)
    {
        $giaovien = GiaoVien::find($id);
        return view('admin.giaovien.doiMK', ['giaovien'=>$giaovien]);
    }

    public function postDoiMK(Request $request)
    {
        

        $this->validate($request,
            [
                'password'=>'required|min:6|max:8',
                're_password'=>'required|same:password'
            ],
            [
                'password.required'=>'Bạn chưa nhập mật khẩu mới',
                'password.min'=>'Mật khẩu ngắn nhất có 6 ký tự và dài nhất 8 ký tự',
                'password.max'=>'Mật khẩu ngắn nhất có 6 ký tự và dài nhất 8 ký tự',
                're_password.required'=>'Bạn chưa nhập lại mật khẩu mới',
                'password.same'=>'Mật khẩu không khớp'
            ]
        );
        $giaovien = GiaoVien::find($request->id);
        $pw = password_hash($request->password, PASSWORD_DEFAULT);
        $giaovien->password = $pw;
        $giaovien->save();

        return redirect('admin/giaovien/sua/'.$request->id)->with('thongbao','Cấp mật khẩu thành công');
    }
}
