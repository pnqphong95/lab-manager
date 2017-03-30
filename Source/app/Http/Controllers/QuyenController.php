<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class QuyenController extends Controller
{
    public function getDanhSach()
    {
        $pers = Permission::all();
        return view('admin.quyen.danhsach', ['pers'=>$pers]);
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
