<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangNhapRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\GiaoVien_ChucVu;
use DB;

class DangNhapController extends Controller
{
    public function getDangNhap() {
    	return view('dangnhap.dangnhap');
    }

    public function postDangNhap(DangNhapRequest $request) {
    	$login = 	[
    					'MaGV' => $request->Username,
    					'password' => $request->Password
    				];
    	if (Auth::attempt($login)) {
            $user = Auth::user();            
            if($user->idChucVu === 1)
                return redirect()->route('userTrangChu');
            else if($user->idChucVu === 2)
                return redirect()->route('managerTrangChu');
            else return redirect()->route('adminTrangChu');
        } else {
        	return redirect()->back()->withErrors(['Username hoặc Password không đúng!']);
        }
    }

    public function getDangXuat() {
        Auth::logout();
        return redirect()->route('root');
    }
}
