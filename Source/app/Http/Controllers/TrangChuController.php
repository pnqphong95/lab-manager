<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Phong;
use App\MonHoc;
use App\Tuan;
use App\Buoi;
use App\Thu;
use App\Lich;
use App\VanDe;
use App\Lich_ChoDuyet;
use DB;

class TrangChuController extends Controller
{
    public function getTrangChu() {
    	$phong = Phong::all();
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;
    	$lich = DB::table('lich')	->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
    								->join('monhoc', 'idMonHoc', '=', 'monhoc.id')
                                    ->where('idTuan', '1')
    								->where('idBuoi', '1')
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
    								->get();   	
    	return view('pages.trangchu',['phong' => $phong, 'lich' => $lich, 'hknk' => $lastHKNK]);
    }

    public function getUserTrangChu() {
        $allTuan = Tuan::all();
        $phong = Phong::all();
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;
    	$lich = DB::table('lich')	->join('giaovien', 'idGiaoVien', '=', 'giaovien.id')
                                    ->join('monhoc', 'idMonHoc', '=', 'monhoc.id')
                                    ->where('idTuan', '1')
                                    ->where('idBuoi', '1')
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
                                    ->get();   	
    	return view('user.trangchu',['phong' => $phong, 'lich' => $lich, 'allTuan' => $allTuan]);
    }

    public function getDangKyPhong() {
        $phong = DB::table('phong')     ->where('idBoMon', Auth::user()->idBoMon)
                                        ->get();
        $allMonHoc = MonHoc::all();
        $allTuan = Tuan::all();
        $allBuoi = Buoi::all();
        $allThu = Thu::all();
        return view('user.dangkyphong', 
            [   
                'allMonHoc' => $allMonHoc, 
                'allTuan' => $allTuan,
                'allThu' => $allThu,
                'allBuoi' => $allBuoi
            ]
        );
    }

    public function postDangKyPhong(Request $request) {

        //Tao bien gui thong diep cho trang chu
        $mes = ' ';

        //Kiem tra du lieu nhap vao
        $this->validate( $request,
            [
                'lich' => 'required',
                'nhomHoc' => 'required'
            ],
            [
                'lich.required' => 'Bạn chưa chọn thời gian sử dụng phòng!',
                'nhomHoc.required' => 'Bạn chưa nhập nhóm thực tập!'
            ]
            );
        //Cac du lieu can dua vao database
        $idGiaoVien = Auth::user()->id;
        $idMonHoc = $request->idMonHoc;
        $nhom = $request->nhomHoc;

        //Lay cac yeu cau phan mem cho mon hoc
        $monHocPhanMem = DB::table('monhoc_phanmem')  ->where('idMonHoc', $idMonHoc)
                                                ->select('idPhanMem')
                                                ->get();
        $arrayPM = array();
        foreach ($monHocPhanMem as $pm) 
        {
            array_push($arrayPM, $pm->idPhanMem);
        }

        //Lay hoc ky nien khoa hien tai
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;

        //Lay tat ca phong trong bo mon
        $allPhongBM = DB::table('phong')    ->where('idBoMon', Auth::user()->idBoMon)
                                            ->get();

        //Lay tat ca phong tu bo mon khac
        $allPhongBMkhac = DB::table('phong')    ->where('idBoMon', '!=', Auth::user()->idBoMon)
                                            ->get();
        //Duyet tung lich
        foreach ($request->lich as $l) 
        {
            $tuan = $thu = $buoi = '';
            $lich = coverData($l);

            //Duyet kiem tra tung phong trong bo mon
            foreach ($allPhongBM as $p) 
            {

                //kiem tra phong con trong khong
                $check = DB::table('lich')  ->where('idPhong', $p->id)
                                            ->where('idTuan', $lich['tuan'])
                                            ->where('idThu', $lich['thu'])
                                            ->where('idBuoi', $lich['buoi'])
                                            ->count();
                if ($check === 0)  //Neu phong con trong
                {
                    //Lay cac phan mem co cai trong phong
                    $phongPhanMem = DB::table('phong_phanmem')  ->where('idPhong', $p->id)
                                                                ->select('idPhanMem')
                                                                ->get();
                    $arrayPMPhong = array();

                    //Cover array(object) to array(idPhanMem)
                    foreach ($phongPhanMem as $pm1) 
                    {
                        array_push($arrayPMPhong, $pm1->idPhanMem);
                    }

                    //Kiem tra phong co pm yeu cau khongs
                    if(checkParentArray($arrayPM, $arrayPMPhong)) 
                    {
                        $lichDB = new Lich();
                        $lichDB->idGiaoVien =$idGiaoVien;
                        $lichDB->idPhong =$p->id;
                        $lichDB->idMonHoc =$idMonHoc;
                        $lichDB->nhom = $nhom;
                        $lichDB->idThu = $lich['thu'];
                        $lichDB->idBuoi = $lich['buoi'];
                        $lichDB->idTuan = $lich['tuan'];
                        $lichDB->idHocKyNienKhoa = $idLastHKNK;
                        $lichDB->save();   
                        $mes = $mes . '<br>Đăng ky thành công!';
                        break;                     
                    }
                    else
                    {
                        $mes = $mes . '<br>Khong tìm được phòng phù hợp!';
                    }
                }
                else                //Khong co phong trong
                {
                    //Duyet kiem tra phong tu bo mon khac 
                    foreach ($allPhongBMkhac as $pk) 
                    {

                        //kiem tra phong con trong khong
                        $check = DB::table('lich')  ->where('idPhong', $pk->id)
                                                    ->where('idTuan', $lich['tuan'])
                                                    ->where('idThu', $lich['thu'])
                                                    ->where('idBuoi', $lich['buoi'])
                                                    ->count();
                        if ($check === 0)  //Neu phong con trong
                        {
                            //Lay cac phan mem co cai trong phong
                            $phongPhanMem = DB::table('phong_phanmem')  ->where('idPhong', $pk->id)
                                                                        ->select('idPhanMem')
                                                                        ->get();
                            $arrayPMPhong = array();

                            //Cover array(object) to array(idPhanMem)
                            foreach ($phongPhanMem as $pm1) 
                            {
                                array_push($arrayPMPhong, $pm1->idPhanMem);
                            }

                            //Kiem tra phong co pm yeu cau khongs
                            if(checkParentArray($arrayPM, $arrayPMPhong)) 
                            {
                                $lichDB = new Lich();
                                $lichDB->idGiaoVien =$idGiaoVien;
                                $lichDB->idPhong =$pk->id;
                                $lichDB->idMonHoc =$idMonHoc;
                                $lichDB->nhom = $nhom;
                                $lichDB->idThu = $lich['thu'];
                                $lichDB->idBuoi = $lich['buoi'];
                                $lichDB->idTuan = $lich['tuan'];
                                $lichDB->idHocKyNienKhoa = $idLastHKNK;
                                $lichDB->TrangThai = 0;
                                $lichDB->save();
                                break;                     
                            }
                            else
                            {
                                $mes = $mes . '<br>Không tìm được phòng phù hợp!';
                            }
                        }
                        else                //Khong co phong trong
                        {
                            $mes = $mes . '<br>Không có phòng trống!';
                        }
                    }
                }
            }

           

        }
        return redirect('user/dangkyphong')->with('thongbao', $mes);
    }

    public function getDKphongBMkhac(){
        $phong = DB::table('phong')     ->where('idBoMon', '!=', Auth::user()->idBoMon)
                                        ->get();
        $allMonHoc = MonHoc::all();
        $allTuan = Tuan::all();
        $allBuoi = Buoi::all();
        $allThu = Thu::all();
        return view('user.DKphongBMkhac', 
            [   'phong' => $phong,
                'allMonHoc' => $allMonHoc, 
                'allTuan' => $allTuan,
                'allThu' => $allThu,
                'allBuoi' => $allBuoi
            ]
        );
        
    }       

    public function getLichThucHanh() 
    {
        //Lay hoc ky nien khoa hien tai
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;

        $lich = DB::table('lich')   ->where('idGiaoVien', Auth::user()->id)
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
                                    ->orderBy('idTuan')
                                    ->orderBy('idThu')
                                    ->get();
        $allThu = Thu::all();
        $allMonHoc = MonHoc::all();
        $allPhong = Phong::all();
        $allBuoi = Buoi::all();
        $allTuan = Tuan::all();
        return view('user.lichthuchanh', 
                    [
                        'lich' => $lich,
                        'allMonHoc' => $allMonHoc,
                        'allBuoi' => $allBuoi,
                        'allPhong' => $allPhong,
                        'allThu' => $allThu,
                        'allTuan' => $allTuan
                    ]);
    }
}
