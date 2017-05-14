<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use App\VanDe;
use App\LichSu_VanDe;
use App\GiaoVien;
use App\BoMon;
use DB;
use Illuminate\Support\Facades\Auth;

class VanDeController extends Controller
{
    public function getDanhSach ()
    {
        $allPhong = Phong::all();
        $allGiaoVien = GiaoVien::all();
        $allBoMon = BoMon::all();
        $allVanDe = DB::table('VanDe')  ->skip(0) //lay tu vi tri 0
                                        ->take(20)  //lay 20 result
                                        ->orderBy('id', 'desc') //sap xep giam theo id
                                        ->get();
        $ls_vande = DB::table('LichSu_VanDe')->get();
        return view('user.vande.danhsach', ['allVanDe' => $allVanDe, 
                                            'allPhong' => $allPhong,
                                            'allGiaoVien' => $allGiaoVien,
                                            'ls_vande' => $ls_vande,
                                            'allBoMon' => $allBoMon
                                            ]);
    }

    public function postDanhSach (Request $request)
    {
        $allPhong = Phong::all();
        $allGiaoVien = GiaoVien::all();
        $allBoMon = BoMon::all();
        $allVanDe = DB::table('VanDe')  ->skip(0) //lay tu vi tri 0
                                        ->take(20)  //lay 20 result
                                        ->orderBy('id', 'desc') //sap xep giam theo id
                                        ->get();
        $ls_vande = DB::table('LichSu_VanDe')   ->join('vande','idVanDe','vande.id')->get();

        if(isset($_POST['xuly{{$vd->id}}'])){
            $ls = new LichSu_VanDe();
            $ls->idVanDe = $request->idVanDe;
            $ls->nguoiNhan = Auth::user()->idBoMon;
            $ls->ghiChu = $request->ghiChu;
            $ls->trangThai = 1;
            $ls->save();
        }

        if(isset($_POST['chuyen{{$vd->id}}'])){
            $ls = new LichSu_VanDe();
            $ls->idVanDe = $request->idVanDe;
            $ls->nguoiNhan = $request->nguoiNhan;
            $ls->ghiChu = $request->ghiChu;
            $ls->trangThai = 0;
            $ls->save();
        }
        return redirect('user/vande/danhsach')->with('thongbao', 'Đã thực hiện vấn đề!');
    }

    public function postXuLy (Request $request)
    {
        $allPhong = Phong::all();
        $allGiaoVien = GiaoVien::all();
        $allBoMon = BoMon::all();
        $allVanDe = DB::table('VanDe')  ->skip(0) //lay tu vi tri 0
                                        ->take(20)  //lay 20 result
                                        ->orderBy('id', 'desc') //sap xep giam theo id
                                        ->get();
        $ls_vande = DB::table('LichSu_VanDe')   ->join('vande','idVanDe','vande.id')->get();

        $ls = new LichSu_VanDe();
        $ls->idVanDe = $request->idVanDe;
        $ls->nguoiNhan = Auth::user()->idBoMon;
        $ls->ghiChu = $request->ghiChu;
        $ls->trangThai = 1;
        $ls->save();

        $last_ls = LichSu_VanDe::orderBy('id','desc')->first();

        $vande = VanDe::find($last_ls->idVanDe);
        $vande->ngayNhan = $last_ls->ngayNhan;
        $vande->nguoiNhan = $last_ls->nguoiNhan;
        $vande->trangThai = $last_ls->trangThai;
        $vande->save();

        return redirect('user/vande/danhsach')->with('thongbao', 'Đã xử lý vấn đề thành công!');
    }

    public function postChuyen (Request $request)
    {
        $allPhong = Phong::all();
        $allGiaoVien = GiaoVien::all();
        $allBoMon = BoMon::all();
        $allVanDe = DB::table('VanDe')  ->skip(0) //lay tu vi tri 0
                                        ->take(20)  //lay 20 result
                                        ->orderBy('id', 'desc') //sap xep giam theo id
                                        ->get();
        $ls_vande = DB::table('LichSu_VanDe')   ->join('vande','idVanDe','vande.id')->get();

        $ls = new LichSu_VanDe();
        $ls->idVanDe = $request->idVanDe;
        $ls->nguoiNhan = $request->nguoiNhan;
        $ls->ghiChu = $request->ghiChu;
        $ls->trangThai = 0;
        $ls->save();

        $last_ls = LichSu_VanDe::orderBy('id','desc')->first();

        $vande = VanDe::find($last_ls->idVanDe);
        $vande->ngayNhan = $last_ls->ngayNhan;
        $vande->nguoiNhan = $last_ls->nguoiNhan;
        $vande->trangThai = $last_ls->trangThai;
        $vande->save();

        return redirect('user/vande/danhsach')->with('thongbao', 'Đã yêu cầu xử lý đến bô môn thành công!');
    }

    public function getThem() {
        $allPhong = Phong::all();
        $allGiaoVien = GiaoVien::all();
        return view('user.vande.them',['allPhong' => $allPhong,
                                    'allGiaoVien'=>$allGiaoVien]);
    }

    public function postThem(Request $request) {
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
        $vande->nguoiBaoCao = Auth::user()->id;
        $vande->nguoiNhan = $request->idPhong;
        $vande->TrangThai = 0;
        $vande->save();

        $last = VanDe::orderBy('id','desc')->first();
        $ls = new LichSu_VanDe();
        $ls->idVanDe = $last->id;
        $ls->nguoiNhan = Auth::user()->idBoMon;
        $ls->ghiChu = "Gửi yêu cầu xử lý";
        $ls->trangThai = 0;
        $ls->save();
        return redirect('user/vande/danhsach')->with('thongbao', 'Vấn đề đã gửi!');
    }
}
