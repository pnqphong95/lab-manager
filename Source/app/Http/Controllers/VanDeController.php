<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use App\VanDe;
use DB;

class VanDeController extends Controller
{
    public function getVanDe() {
        $allPhong = Phong::all();
        return view('user.vande',['allPhong' => $allPhong]);
    }

    public function postVanDe(Request $request) {
        $this->validate( $request,
            [
                'idPhong' => 'required',
                'tomTatVD' => 'required|max:50',
                'chiTietVD' => 'required|max:255'
            ],
            [
                'idPhong.required' => 'Phòng không được bỏ trống!',
                'tomTatVD.required' => 'Tóm tắt vấn đề không được bỏ trống!',
                'tomTatVD.max' => 'Tóm tăt vấn đề tối đa 50 kí tự!',
                'chiTietVD.required' => 'Chi tiết vấn đề không được bỏ trống!',
                'chiTietVD.max' => 'Chi tiết vấn đề tối đa 255 kí tự!'
            ]
            );
        $vande = new VanDe();
        $vande->idPhong = $request->idPhong;
        $vande->TomTatVD = $request->tomTatVD;
        $vande->ChiTietVD = $request->chiTietVD;
        $vande->TrangThai = 0;
        $vande->save();
        return redirect('user/vande')->with('thongbao', 'Vấn đề đã gửi!');
    }

    public function getDanhSachLoi ()
    {
    	$allvande = DB::table('vande')	->skip(0) //lay tu vi tri 0
    									->take(20)	//lay 20 result
    									->orderBy('id', 'desc') //sap xep giam theo id
    									->get();
    	$allPhong = Phong::all();
    	return view('user.vande.danhsach', ['allvande' => $allvande, 'allPhong' => $allPhong]);
    }

    public function getDanhSachAdmin() {
        $allVanDe = VanDe::all();
        $allPhong = Phong::all();
        return view('admin.vande.danhsach',['allVanDe' => $allVanDe, 'allPhong'=>$allPhong]);
    }

    public function getThemAdmin() {
        $allPhong = Phong::all();
        return view('admin.vande.them',['allPhong' => $allPhong]);
    }

    public function postThemAdmin(Request $request) {
        $this->validate( $request,
            [
                'idPhong' => 'required',
                'tomTatVD' => 'required|max:50',
                'chiTietVD' => 'required|max:255'
            ],
            [
                'idPhong.required' => 'Phòng không được bỏ trống!',
                'tomTatVD.required' => 'Tóm tắt vấn đề không được bỏ trống!',
                'tomTatVD.max' => 'Tóm tăt vấn đề tối đa 50 kí tự!',
                'chiTietVD.required' => 'Chi tiết vấn đề không được bỏ trống!',
                'chiTietVD.max' => 'Chi tiết vấn đề tối đa 255 kí tự!'
            ]
            );
        $vande = new VanDe();
        $vande->idPhong = $request->idPhong;
        $vande->TomTatVD = $request->tomTatVD;
        $vande->ChiTietVD = $request->chiTietVD;
        $vande->TrangThai = 0;
        $vande->ngayBaoCao = date('Y-m-d');
        $vande->ngaySua = date('Y-m-d');
        $vande->save();
        return redirect('admin/vande/danhsach')->with('thongbao', 'Vấn đề đã gửi!');
    }

    public function getDanhSachLoiAdmin()
    {
        $allvande = DB::table('vande')  ->skip(0) //lay tu vi tri 0
                                        ->take(20)  //lay 20 result
                                        ->orderBy('id', 'desc') //sap xep giam theo id
                                        ->get();
        $allPhong = Phong::all();
        return view('admin.vande.danhsach', ['allvande' => $allvande, 'allPhong' => $allPhong]);
    }

    public function getXoa($id)
    {
        $vande = VanDe::find($id);
        $vande->delete();

        return redirect('admin/vande/danhsach')->with('thongbao','Xóa thành công');
    }
}
