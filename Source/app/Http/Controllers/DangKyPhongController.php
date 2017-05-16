<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Phong;
use App\MonHoc;
use App\Tuan;
use App\Buoi;
use App\Thu;
use App\Lich;
use App\VanDe;
use App\Lich_ChoDuyet;
use App\LichSu_ChoDuyet;
use App\LopHocPhan;

class DangKyPhongController extends Controller
{
    
    public function getDangKyPhong() {
        
        
        $allTuan = Tuan::all();
        $allBuoi = Buoi::all();
        $allThu = Thu::all();
        $lophocphan = LopHocPhan::where ('MaCB', Auth::user()->MaGV)->select("MaHP")->get();
        $a = [];
        foreach ($lophocphan as $lhp) {
            array_push($a, $lhp->MaHP);
        }
        $allMonHoc = MonHoc::whereIn ('MaMH', $a)->get();
        return view('user.dangkyphong', 
            [   
                'allMonHoc' => $allMonHoc, 
                'allTuan' => $allTuan,
                'allThu' => $allThu,
                'allBuoi' => $allBuoi
            ]
        );
    }

    public function getDangKyPhongK() {
        
        $allMonHoc = MonHoc::all();
        $allTuan = Tuan::all();
        $allBuoi = Buoi::all();
        $allThu = Thu::all();
        $lophocphan = LopHocPhan::where ('MaCB', Auth::user()->MaGV)->get();
        return view('user.dangkyphongk', 
            [   
                'allMonHoc' => $allMonHoc, 
                'allTuan' => $allTuan,
                'allThu' => $allThu,
                'allBuoi' => $allBuoi,
                'lophocphan' => $lophocphan
            ]
        );
    }

    public function postDangKyPhong(Request $request) 
    {

        //Tao bien gui thong diep cho trang chu
        $mes = '';
        $dk_suc = false;
        $coLichCD = false;
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
            $daDK = 0;

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
                        $dk_suc = true;
                        $phong = Phong::find ($lichDB->idPhong);
                        $buoi = Buoi::find ($lichDB->idBuoi);
                        $thu = Thu::find ($lichDB->idThu);
                        $tuan = Tuan::find ($lichDB->idTuan);
                        $daDK = 1;
                        $mes = $mes . 'Đã đăng ký: Tuần '.$tuan->TenTuan.', Thứ '.$thu->TenThu. ', Buổi '.$buoi->TenBuoi.' -- tại phòng: '.$phong->TenPhong .'<br>';
                        break;                     
                    }
                    else
                    {
                        //$mes = $mes . '<br>Khong tìm được phòng phù hợp!';
                    }
                }
                else                //Khong co phong trong
                {
                    $daDK = 0;
                }
            }

            if ($daDK != 1) //Chua dang ky duoc phong
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
	                        $lichDB->save();
	                        $dk_suc = true;
                            $phong = Phong::find ($lichDB->idPhong);
                            $buoi = Buoi::find ($lichDB->idBuoi);
                            $thu = Thu::find ($lichDB->idThu);
                            $tuan = Tuan::find ($lichDB->idTuan);
	                        $daDK = 1;
                            $mes = $mes . 'Đã đăng ký: Tuần '.$tuan->TenTuan.', '.$thu->TenThu. ', Buổi '.$buoi->TenBuoi.' -- tại phòng: '.$phong->TenPhong .'<br>';
	                        break;                     
	                    }
	                    else
	                    {
	                        //$mes = $mes . '<br>Không tìm được phòng phù hợp!';
	                    }
	                }
	                else                //Khong co phong trong
	                {
	                    //$mes = $mes . '<br>Không có phòng trống!';
	                }
	            }
           	}

           	if ($daDK != 1) //Chua dang ky duoc phong dua vao lich cho duyet
            {
                $lichCD = new Lich_ChoDuyet();
                $coLichCD = true;
                $lichCD->idGiaoVien =$idGiaoVien;
                $lichCD->idMonHoc =$idMonHoc;
                $lichCD->nhom = $nhom;
                $lichCD->idThu = $lich['thu'];
                $lichCD->idBuoi = $lich['buoi'];
                $lichCD->idTuan = $lich['tuan'];
                $lichCD->idHocKyNienKhoa = $idLastHKNK;
                $lichCD->idBMDuyet = 0;
                $lichCD->TrangThai = 0;
                $lichCD->save();
                $buoi = Buoi::find ($lichCD->idBuoi);
                $thu = Thu::find ($lichCD->idThu);
                $tuan = Tuan::find ($lichCD->idTuan);

                $mes = $mes . '<p style="color: red;">Chưa được đăng ký: Tuần '.$tuan->TenTuan.', '.$thu->TenThu. ', Buổi '.$buoi->TenBuoi.' sẽ đưa vào lịch chờ duyệt</p><br>';

                $idCD = Lich_ChoDuyet::orderBy('id','desc')->first();
                $ls_ChoDuyet = new LichSu_ChoDuyet();

                $ls_ChoDuyet->idChoDuyet =$idCD->id;
                $ls_ChoDuyet->idBMNhan = Auth::user()->idBoMon;
                $ls_ChoDuyet->ghiChu = "Yêu cầu xếp phòng";
                $ls_ChoDuyet->trangThai = 0;
                $ls_ChoDuyet->save();
           	}
        }        
        return redirect('user/dangkyphong')->with('thongbao', $mes);
    }

    public function getDangKyPhongAdmin() {
        
        $allMonHoc = MonHoc::all();
        $allTuan = Tuan::all();
        $allBuoi = Buoi::all();
        $allThu = Thu::all();
        
        return view('admin.lich.dangkyphong', 
            [   
                'allMonHoc' => $allMonHoc, 
                'allTuan' => $allTuan,
                'allThu' => $allThu,
                'allBuoi' => $allBuoi
            ]
        );
    }

    public function postDangKyPhongAdmin(Request $request) 
    {

        //Tao bien gui thong diep cho trang chu
        $mes = '';
        $dk_suc = false;
        $coLichCD = false;
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
            $daDK = 0;

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
                        $dk_suc = true;
                        //$mes = $mes . '<br>Đăng ky thành công!';
                        $daDK = 1;
                        break;                     
                    }
                    else
                    {
                        //$mes = $mes . '<br>Khong tìm được phòng phù hợp!';
                    }
                }
                else                //Khong co phong trong
                {
                    $daDK = 0;
                }
            }

            if ($daDK != 1) //Chua dang ky duoc phong
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
                            $lichDB->save();
                            $dk_suc = true;
                            $daDK = 1;
                            break;                     
                        }
                        else
                        {
                            //$mes = $mes . '<br>Không tìm được phòng phù hợp!';
                        }
                    }
                    else                //Khong co phong trong
                    {
                        //$mes = $mes . '<br>Không có phòng trống!';
                    }
                }
            }

            if ($daDK != 1) //Chua dang ky duoc phong dua vao lich cho duyet
            {
                $lichCD = new Lich_ChoDuyet();
                $coLichCD = true;
                $lichCD->idGiaoVien =$idGiaoVien;
                $lichCD->idMonHoc =$idMonHoc;
                $lichCD->nhom = $nhom;
                $lichCD->idThu = $lich['thu'];
                $lichCD->idBuoi = $lich['buoi'];
                $lichCD->idTuan = $lich['tuan'];
                $lichCD->idHocKyNienKhoa = $idLastHKNK;
                $lichCD->TrangThai = 0;
                $lichCD->save();
            }
        }

        if($dk_suc)
        {
            $mes = $mes. "<br>Đăng ký phòng thành công!";
        }

        if($coLichCD)
        {
            $mes = $mes. "<br>Một vài buổi thực hành chưa được xếp phòng! Vui lòng liên hệ quản lí để";
        }
        return redirect('admin/lich/dangkyphong')->with('thongbao', $mes);
    }
}
