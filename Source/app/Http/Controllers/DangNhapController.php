<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangNhapRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

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
            // Authentication passed...
            return redirect()->route('root');
        } else {
        	return redirect()->back()->withErrors(['Username hoặc Password không đúng!']);
        }
    }
}
