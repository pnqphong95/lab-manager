<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use App\VanDe;
use App\LichSu_VanDe;
use App\GiaoVien;
use DB;
use Illuminate\Support\Facades\Auth;

class VanDeController extends Controller
{
    public function getDSVanDe ()
    {
        $allvande = DB::table('vande')  ->skip(0) //lay tu vi tri 0
                                        ->take(20)  //lay 20 result
                                        ->orderBy('id', 'desc') //sap xep giam theo id
                                        ->get();
        $allPhong = Phong::all();
        return view('user.vande.dsvande', ['allvande' => $allvande, 'allPhong' => $allPhong]);
    }

    public function getVanDe() {
        $allPhong = Phong::all();
        $allGiaoVien = GiaoVien::all();
        return view('user.vande',['allPhong' => $allPhong,
                                    'allGiaoVien'=>$allGiaoVien]);
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
        $vande->nguoiBaoCao = Auth::user()->id;
        $vande->nguoiNhan = 0;
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
        $allGiaoVien = GiaoVien::all();
        return view('admin.vande.danhsach',['allVanDe' => $allVanDe, 
                                            'allPhong'=>$allPhong,
                                            'allGiaoVien'=>$allGiaoVien]);
    }

    public function getThemAdmin() {
        $allPhong = Phong::all();
        $allGiaoVien = GiaoVien::all();

        return view('admin.vande.them',['allPhong' => $allPhong,
                                        'allGiaoVien'=>$allGiaoVien]);
    }

    public function postThemAdmin(Request $request) {
        $allVanDe = VanDe::all();
        $allPhong = Phong::all();
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
        $vande->tomTatVD = $request->tomTatVD;
        $vande->chiTietVD = $request->chiTietVD;
        $vande->trangThai = 0;
        $vande->nguoiBaocao = Auth::user()->id;
        $vande->nguoiNhan = $request->nguoiNhan;
        $vande->save();

        $idVanDe = VanDe::select('id')->orderBy('id','desc')->first();

        $ls_vande = new LichSu_VanDe();
        $ls_vande->idVanDe = $idVanDe->id;
        $ls_vande->nguoiNhan = $request->nguoiNhan;
        $ls_vande->ghiChu = "Gửi yêu cầu xử lý";
        $ls_vande->trangThai = 0;
        $ls_vande->save();
        return redirect('admin/vande/danhsach')->with('thongbao', 'Vấn đề đã gửi!');
    }

    public function getChiTietAdmin($id) {
        $vande = DB::table('VanDe')->where('id',$id)->first();
        $ls_vande = DB::table('LichSu_VanDe')   ->join('vande','idVanDe','vande.id')
                                                ->where('idVanDe',$id)->get();
        $last_lsvd = LichSu_VanDe::orderBy('id','desc')->first();

        $allPhong = Phong::all();
        $allGiaoVien = GiaoVien::all();


        return view('admin.vande.chitiet',[ 'allPhong' => $allPhong,
                                            'allGiaoVien'=>$allGiaoVien,
                                            'ls_vande'=>$ls_vande,
                                            'vande'=>$vande,
                                            'last_lsvd'=>$last_lsvd
                                            ]);
    }

    public function postThemLichSuAdmin(Request $request, $id) {

        $ls_vande = DB::table('lichsu_vande')   ->join('vande','idVanDe','vande.id')
                                                ->where('idVanDe',$id)->get();
        if($request->check == true){
            $ls_vande = new LichSu_VanDe();
            $ls_vande->idVanDe = $request->idVanDe;
            $ls_vande->ghiChu = $request->ghiChu;
            $ls_vande->nguoiNhan = Auth::user()->id;
            $ls_vande->trangThai = 1;
            $ls_vande->save();

            $vande = VanDe::find($id);
            $vande->trangThai = 1;
            $vande->save();
        }else{
            $ls_vande = new LichSu_VanDe();
            $ls_vande->idVanDe = $request->id;
            $ls_vande->ghiChu = $request->ghiChu;
            $ls_vande->nguoiNhan = $request->nguoiNhan;
            $ls_vande->trangThai = 0;
            $ls_vande->save();

            $last_lsvd = LichSu_VanDe::orderBy('id','desc')->first();
            $vande = VanDe::find($id);
            $vande->nguoiNhan = $request->nguoiNhan;
            $vande->ngayNhan = $last_lsvd->ngayNhan;
            $vande->save();
        }

        return redirect('admin/vande/chitiet/'.$id)->with('thongbao', 'Vấn đề đã gửi!');
    }

    public function getSua($id) {
        $vande = VanDe::find($id);
        $allPhong = Phong::all();
        $allGiaoVien = GiaoVien::all();
        return view('admin.vande.sua',[ 'allPhong' => $allPhong,
                                            'allGiaoVien'=>$allGiaoVien,
                                            'vande'=>$vande
                                            ]);
    }

    public function postSua(Request $request, $id)
    {
        $vande = VanDe::find($id);
        
        $vande->idPhong = $request->idPhong;
        $vande->tomTatVD = $request->tomTatVD;
        $vande->chiTietVD = $request->chiTietVD;
        $vande->save();        

        return redirect('admin/vande/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $vande = VanDe::find($id);
        $vande->delete();

        return redirect('admin/vande/danhsach')->with('thongbao','Xóa thành công');
    }
}
