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
}
