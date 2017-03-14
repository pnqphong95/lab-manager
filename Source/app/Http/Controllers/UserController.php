<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function trangchu() {
    	return view('user.trangchu');
    }



    public function getdangnhapAdmin()
    {
    	return view('admin.login');
    }

    public function postdangnhapAdmin(Request $request)
    {
    	$this->validate($request,[
    		'MaGV'=>'required',
    		'password'=>'required|min:3|max:32'
    		],
    		[
    		'MaGV.required'=>'Bạn chưa nhập tài khoản',
    		'password.required'=>'Bạn chưa nhập mật khẩu',
    		'password.min'=>'Mật khẩu có ít nhất 3 ký tự',
    		'password.max'=>'Mật khẩu có nhiều nhất 32 ký tự'
    		]);
    	if(Auth::attempt(['MaGV'=>$request->MaGV,'password'=>$request->password]))
    	{
    		return redirect('admin/lich/danhsach');
    	}
    	else
    	{
    		return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
    	}

    }

}
