<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use App\Lich;
use App\Phong;
use App\MonHoc;
use App\BoMon;
use App\Thu;
use App\Buoi;
use App\Tuan;
use App\GiaoVien;
use DB;
use App\Lich_ChoDuyet;
use App\LichSu_ChoDuyet;


class LichController extends Controller
{
   public function getTraVeBM ($idLichCD)
    {
        $idLichCD = Crypt::decrypt($idLichCD);
        $lichCD = Lich_ChoDuyet::find ($idLichCD);
        $lichCD->idBMDuyet = 0;
        $lichCD->save();
        $mh = MonHoc::find ($lichCD->idMonHoc);
        $t = Tuan::find ($lichCD->idTuan);
        $th = Thu::find ($lichCD->idThu);
        $b = Buoi::find ($lichCD->idBuoi);
        return redirect('user/cacyeucau')->with('thongbao','Đã trả yêu cầu: '.$mh->TenMH.' --- Tuần '.$t->TenTuan.', '.$th->TenThu.', Buổi '.$b->TenBuoi.' về BM quản lý');
    }

    public function getTuChoiLCD ($idLichCD)
    {
        $idLichCD = Crypt::decrypt($idLichCD);
        $lichCD = Lich_ChoDuyet::find ($idLichCD);
        $lichCD->TrangThai = 2;
        $lichCD->save();
        $mh = MonHoc::find ($lichCD->idMonHoc);
        $t = Tuan::find ($lichCD->idTuan);
        $th = Thu::find ($lichCD->idThu);
        $b = Buoi::find ($lichCD->idBuoi);
        return redirect('user/cacyeucau')->with('thongbao','Đã từ chối xếp phòng cho môn '.$mh->TenMH.' --- Tuần '.$t->TenTuan.', '.$th->TenThu.', Buổi '.$b->TenBuoi);
    }

    public function postXinTroGiup (Request $req)
    {
        $lichCD = Lich_ChoDuyet::find ($req->idLichCD);
        $lichCD->idBMDuyet = $req->idBoMon;
        $lichCD->save();  
        $bomon = BoMon::find ($req->idBoMon);

        $lichsu = new LichSu_ChoDuyet();
        $lichsu->idChoDuyet = $req->idLichCD;
        $lichsu->idBMNhan = $req->idBoMon;
        $lichsu->ghiChu = "Yêu cầu trợ giúp";
        $lichsu->trangThai = 0;
        $lichsu->save();
        return redirect('user/cacyeucau')->with('thongbao','Yêu cầu đã được chuyển tới bộ môn '.$bomon->TenBM);
    }

    public function getChoDuyet($id)
    {
        $mes = '';
        $lich = Lich::find ($id);
        $gv = GiaoVien::find ($lich->idGiaoVien);
        $lichCD = new Lich_ChoDuyet();
        $lichCD->idGiaoVien =$lich->idGiaoVien;
        $lichCD->idMonHoc =$lich->idMonHoc;
        $lichCD->Nhom = $lich->Nhom;
        $lichCD->idThu = $lich->idThu;
        $lichCD->idBuoi = $lich->idBuoi;
        $lichCD->idTuan = $lich->idTuan;
        $lichCD->idHocKyNienKhoa = $lich->idHocKyNienKhoa;
        $lichCD->TrangThai = 0;
        $lichCD->idBMDuyet = $gv->idBoMon;
        $lichCD->save();
        $phong = Phong::find ($lich->idPhong);
        $buoi = Buoi::find ($lich->idBuoi);
        $thu = Thu::find ($lich->idThu);
        $tuan = Tuan::find ($lich->idTuan); 
        $mon = MonHoc::find ($lich->idMonHoc);                  
        $mes = $mes . 'Đã chuyển lịch: Môn '.$mon->TenMH.', Tuần '.$tuan->TenTuan.', '.$thu->TenThu. ', Buổi '.$buoi->TenBuoi.' -- vào lịch chờ duyệt<br>'; 
        $mes = $mes . 'Phòng: '.$phong->TenPhong.' -- Tuần '.$tuan->TenTuan.', '.$thu->TenThu. ', Buổi '.$buoi->TenBuoi.' đã được làm trống<br>';
        $lich->delete();
        return redirect('user/chinhsualich')->with('thongbao', $mes);
    }

    public function getXacNhan($id)
    {
        //echo $id;
        return view ('user.chinhsualich.xacnhan', ['id' => $id]);
    }

    public function getThuHoi ($id) 
    {
        $mes = '';
        $lich = Lich::find ($id);
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;

        $monHocPhanMem = DB::table('monhoc_phanmem')  ->where('idMonHoc', $lich->idMonHoc)
                                                ->select('idPhanMem')
                                                ->get();
        $arrayPM = array();
        foreach ($monHocPhanMem as $pm) 
        {
            array_push($arrayPM, $pm->idPhanMem);
        }

        //Lay tat ca phong trong bo mon
        $allPhongBM = DB::table('phong')    ->where('idBoMon', Auth::user()->idBoMon)
                                            ->get();
        foreach ($allPhongBM as $p) 
        {
            //kiem tra phong con trong khong
            $check = DB::table('lich')  ->where('idPhong', $p->id)
                                        ->where('idTuan', $lich->idTuan)
                                        ->where('idThu', $lich->idThu)
                                        ->where('idBuoi', $lich->idBuoi)
                                        ->count();
            //echo 'check '.$check . ' Phong '.$p->id ."<br>";
            if ($check === 0)  //Neu phong con trong
            {
                //echo 'check '.$check . ' Phong '.$p->id ."<br>";
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
                    $lichDB->idGiaoVien =$lich->idGiaoVien;
                    $lichDB->idPhong =$p->id;
                    $lichDB->idMonHoc =$lich->idMonHoc;
                    $lichDB->Nhom = $lich->Nhom;
                    $lichDB->idThu = $lich->idThu;
                    $lichDB->idBuoi = $lich->idBuoi;
                    $lichDB->idTuan = $lich->idTuan;
                    $lichDB->idHocKyNienKhoa = $lich->idHocKyNienKhoa;
                    $lichDB->save();
                    $phong = Phong::find ($lichDB->idPhong);
                    $buoi = Buoi::find ($lichDB->idBuoi);
                    $thu = Thu::find ($lichDB->idThu);
                    $tuan = Tuan::find ($lichDB->idTuan); 
                    $mon = MonHoc::find ($lichDB->idMonHoc);                  
                    $mes = $mes . 'Đã chuyển lịch: Môn '.$mon->TenMH.', Tuần '.$tuan->TenTuan.', '.$thu->TenThu. ', Buổi '.$buoi->TenBuoi.' -- tới phòng: '.$phong->TenPhong .'<br>';
                    $phong = Phong::find ($lich->idPhong);
                    $buoi = Buoi::find ($lich->idBuoi);
                    $thu = Thu::find ($lich->idThu);
                    $tuan = Tuan::find ($lich->idTuan); 
                    $mon = MonHoc::find ($lich->idMonHoc); 
                    $mes = $mes . 'Phong: '.$phong->TenPhong.' vào Tuần '.$tuan->TenTuan.', '.$thu->TenThu. ', Buổi '.$buoi->TenBuoi.' đã được làm trống<br>';
                    $lich->delete(); //Đã chuyễn đc phòng nên xóa
                    $daChuyen = true;
                    break;                     
                }
                else //Phong khong phu hop
                {
                    $daChuyen = false;
                }
            }
            else                //Khong co phong trong
            {
                $daChuyen = false;
            }
        }

        if ($daChuyen === false)
        {
            $allPhongBMK = DB::table('phong')   ->where('idBoMon', '!=', Auth::user()->idBoMon)
                                                ->get();
                                                // 
            foreach ($allPhongBMK as $p) 
            {
                //kiem tra phong con trong khong
                $check = DB::table('lich')  ->where('idPhong', $p->id)
                                            ->where('idTuan', $lich->idTuan)
                                            ->where('idThu', $lich->idThu)
                                            ->where('idBuoi', $lich->idBuoi)
                                            ->count();
                //echo 'check '.$check . ' Phong '.$p->id ."<br>";
                if ($check === 0)  //Neu phong con trong
                {
                    //echo 'check '.$check . ' Phong '.$p->id ."<br>";
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
                        $lichDB->idGiaoVien =$lich->idGiaoVien;
                        $lichDB->idPhong =$p->id;
                        $lichDB->idMonHoc =$lich->idMonHoc;
                        $lichDB->Nhom = $lich->Nhom;
                        $lichDB->idThu = $lich->idThu;
                        $lichDB->idBuoi = $lich->idBuoi;
                        $lichDB->idTuan = $lich->idTuan;
                        $lichDB->idHocKyNienKhoa = $lich->idHocKyNienKhoa;
                        $lichDB->save();
                        $phong = Phong::find ($lichDB->idPhong);
                        $buoi = Buoi::find ($lichDB->idBuoi);
                        $thu = Thu::find ($lichDB->idThu);
                        $tuan = Tuan::find ($lichDB->idTuan); 
                        $mon = MonHoc::find ($lichDB->idMonHoc);                  
                        $mes = $mes . 'Đã chuyển lịch: Môn '.$mon->TenMH.', Tuần '.$tuan->TenTuan.', '.$thu->TenThu. ', Buổi '.$buoi->TenBuoi.' -- tới phòng: '.$phong->TenPhong .'<br>';
                        $phong = Phong::find ($lich->idPhong);
                        $buoi = Buoi::find ($lich->idBuoi);
                        $thu = Thu::find ($lich->idThu);
                        $tuan = Tuan::find ($lich->idTuan); 
                        $mon = MonHoc::find ($lich->idMonHoc); 
                        $mes = $mes . 'Phong: '.$phong->TenPhong.' vào Tuần '.$tuan->TenTuan.', '.$thu->TenThu. ', Buổi '.$buoi->TenBuoi.' đã được làm trống<br>';
                        $lich->delete(); //Đã chuyễn đc phòng nên xóa
                        $daChuyen = true;
                        break;                     
                    }
                    else //Phong khong phu hop
                    {
                        $daChuyen = false;
                    }
                }
                else                //Khong co phong trong
                {
                    $daChuyen = false;
                }
            }
        }

        if ($daChuyen === false)
        {
            return redirect('user/chinhsualich/xacnhan/'.$id);
        }
        else
        {
            return redirect('user/chinhsualich')->with('thongbao', $mes);
        }

        
        
    }

    public function getXoaLich ($id)
    {
        
        $lich = Lich::find($id);
        if (is_null($lich))
        {
            return redirect('user/chinhsualich')->with('thongbao', 'Có lỗi khi xóa, mong bạn kiểm tra lại!');
        }
        else
        {
            if ($lich->delete())
            {
                return redirect('user/chinhsualich')->with('thongbao', 'Đã xóa thành công lịch!');
            }
            else
            {
                return redirect('user/chinhsualich')->with('thongbao', 'Có lỗi khi xóa, mong bạn kiểm tra lại!');
            }
        }
        
    }

    public function getDoiPhong ($id)
    {
        $i = 0;
        $nullPhong = array();
        $allPhong = Phong::all();
        $allThu = Thu::all();
        $allMonHoc = MonHoc::all();
        $lichCD = DB::table('Lich')
                        ->where ('id', $id)
                        ->first();
        $allPhongBM = Phong::where ('idBoMon', Auth::user()->idBoMon)->get();
        foreach ($allPhongBM as $ph) 
        {
            $checkLich = DB::table('Lich') -> where ('idTuan', $lichCD->idTuan)
                                -> where ('idThu', $lichCD->idThu)
                                -> where ('idBuoi', $lichCD->idBuoi)
                                -> where ('idPhong', $ph->id)
                                -> first();
            if (is_null ($checkLich))
            {
                $nullPhong[$i] = $ph->id;
                $i++;
            }            
        }
        $allBuoi = Buoi::all();
        $allTuan = Tuan::all();
        $allGiaoVien = GiaoVien::all();



        return view('user.doiphong', 
                    [
                        'allMonHoc' => $allMonHoc,
                        'allBuoi' => $allBuoi,
                        'nullPhong' => $nullPhong,
                        'allThu' => $allThu,
                        'allTuan' => $allTuan,
                        'lichCD' => $lichCD,
                        'allGiaoVien' => $allGiaoVien,
                        'allPhong' => $allPhong
                    ]);
    }

    public function postDoiPhong ($id, Request $req)
    {
        $lich = Lich::find($id);

        $lich->idPhong = $req->idPhong;
        $lich->save();

        return redirect('user/chinhsualich')->with('thongbao','Đã đổi phòng thành công');
    }

    public function getChinhSuaLich ()
    {
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;

        $allThu = Thu::all();
        $allMonHoc = MonHoc::all();
        $allPhong = Phong::all();
        $allBuoi = Buoi::all();
        $allTuan = Tuan::all();

        $phongBM = Phong::select('id')  ->where ('idBoMon', Auth::user()->idBoMon)
                                        ->get();
        $idPhongBM = array();

        foreach ($phongBM as $pbm) {
            array_push($idPhongBM, $pbm->id);
        }

        $lich = DB::table('lich')
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
                                    ->whereIn('idPhong', $idPhongBM)
                                    ->orderBy('idTuan')
                                    ->orderBy('idThu')
                                    ->orderBy('idBuoi')
                                    ->get();
        //echo $lich;

        return view('user.chinhsualich', 
                    [
                        'allMonHoc' => $allMonHoc,
                        'allBuoi' => $allBuoi,
                        'allPhong' => $allPhong,
                        'allThu' => $allThu,
                        'allTuan' => $allTuan,
                        'lich' => $lich
                    ]);
    }

    public function getDanhSach()
    {
        $lich = Lich::all();
        $phong = Phong::all();
        $monhoc = MonHoc::all();
        $bomon = BoMon::all();
        return view('admin.chinhsualich', ['lich'=>$lich, 'phong'=>$phong, 'monhoc'=>$monhoc, 'bomon'=>$bomon]);
    }
    
    public function getThem()
    {
        $lich = Lich::all();
        return view('admin.lich.them', ['lich'=>$lich]);
    }

    public function postThem(Request $request)
    {
        $lich = new Lich;
        $lich->idGiaoVien =$request->idGiaoVien;

        $lich->save();

        return redirect('admin/lich/them')->with('thongbao','Thêm thành công');
    }

    public function getSua()
    {
        // $theloai = TheLoai::all();
        // return view('admin.theloai.sua', ['theloai'=>$theloai]);
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
                                    ->orderBy('idBuoi')
                                    ->get();
        $allThu = Thu::all();
        $allMonHoc = MonHoc::all();
        $allPhong = Phong::all();
        $allBuoi = Buoi::all();
        $allTuan = Tuan::all();

        $allLichCD = DB::table('Lich_ChoDuyet')
                        ->where ('idGiaoVien', Auth::user()->id)
                        ->where ('idHocKyNienKhoa', $idLastHKNK)
                        ->where ('TrangThai', 0)
                        ->get();

        return view('user.lichthuchanh', 
                    [
                        'lich' => $lich,
                        'allMonHoc' => $allMonHoc,
                        'allBuoi' => $allBuoi,
                        'allPhong' => $allPhong,
                        'allThu' => $allThu,
                        'allTuan' => $allTuan,
                        'allLichCD' => $allLichCD
                    ]);
    }

    public function getLichChoDuyet ()
    {
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;

        $giaovien = GiaoVien::select('id')->where ('idBoMon', Auth::user()->idBoMon) ->get();
        $idGVinBM = array();
        foreach ($giaovien as $gv) {
            array_push($idGVinBM, $gv->id);
        }
        $allThu = Thu::all();
        $allMonHoc = MonHoc::all();
        $allPhong = Phong::all();
        $allBuoi = Buoi::all();
        $allTuan = Tuan::all();
        $allGiaoVien = GiaoVien::all();
        $allBoMon = BoMon::all ();

        $allLichCD = DB::table('Lich_ChoDuyet')
                        ->where ('idHocKyNienKhoa', $idLastHKNK)
                        ->where ('TrangThai', 0)
                        ->whereIn ('idGiaoVien', $idGVinBM)
                        ->get();
        $allLCDYeuCau = Lich_ChoDuyet::where ('idBMDuyet', Auth::user()->idBoMon) 
                                        ->where ('TrangThai', 0)
                                        ->get();
        $ls_choduyet = DB::table('LichSu_ChoDuyet') ->get(); 

        return view('user.lichchoduyet.danhsach', 
                    [
                        'allMonHoc' => $allMonHoc,
                        'allBuoi' => $allBuoi,
                        'allPhong' => $allPhong,
                        'allThu' => $allThu,
                        'allTuan' => $allTuan,
                        'allLichCD' => $allLichCD,
                        'allGiaoVien' => $allGiaoVien,
                        'allLCDYeuCau' => $allLCDYeuCau,
                        'allBoMon' => $allBoMon,
                        'ls_choduyet'=> $ls_choduyet
                    ]);
    }

    public function getXepPhong ($idLichCD)
    {
        $idLichCD = Crypt::decrypt($idLichCD);
        $lichCD = DB::table('Lich_ChoDuyet')
                        ->where ('id', $idLichCD)
                        ->first();
        if (is_null ($lichCD)) return redirect('user/cacyeucau');
        
        if ($lichCD->TrangThai == 0)
        {
            $i = 0;
            $nullPhong = array();
            $allPhong = Phong::all();
            $allThu = Thu::all();
            $allMonHoc = MonHoc::all();
            
            $allPhongBM = Phong::where ('idBoMon', Auth::user()->idBoMon)->get();
            foreach ($allPhongBM as $ph) 
            {
                $checkLich = DB::table('Lich') -> where ('idTuan', $lichCD->idTuan)
                                    -> where ('idThu', $lichCD->idThu)
                                    -> where ('idBuoi', $lichCD->idBuoi)
                                    -> where ('idPhong', $ph->id)
                                    -> first();
                if (is_null ($checkLich))
                {
                    $nullPhong[$i] = $ph->id;
                    $i++;
                }            
            }
            $allBuoi = Buoi::all();
            $allTuan = Tuan::all();
            $allGiaoVien = GiaoVien::all();
            $allBM = BoMon::all();



            return view('user.lichchoduyet.xepphong', 
                        [
                            'allMonHoc' => $allMonHoc,
                            'allBuoi' => $allBuoi,
                            'nullPhong' => $nullPhong,
                            'allThu' => $allThu,
                            'allTuan' => $allTuan,
                            'lichCD' => $lichCD,
                            'allGiaoVien' => $allGiaoVien,
                            'allPhong' => $allPhong,
                            'allBM' => $allBM
                        ]);
        } else
        {
            return redirect('user/cacyeucau')->with('thongbao','Phòng đã có người duyệt!');
        }
    }

    public function postXepPhong ($idLichCD, Request $req)
    {
        $lichCD = Lich_ChoDuyet::find($idLichCD);
        if (!is_null ($lichCD))
        {
            $lichCD->TrangThai = 1;
            $lichCD->idPhong = $req->idPhong;
            $lichCD->save(); 

            $lich = new Lich();
            $lich->idGiaoVien = $lichCD->idGiaoVien;
            $lich->idPhong = $lichCD->idPhong;
            $lich->idMonHoc = $lichCD->idMonHoc;
            $lich->Nhom = $lichCD->Nhom;
            $lich->idThu = $lichCD->idThu;
            $lich->idBuoi = $lichCD->idBuoi;
            $lich->idTuan = $lichCD->idTuan;
            $lich->idHocKyNienKhoa = $lichCD->idHocKyNienKhoa;
            $lich->save();

            $lichsu = new LichSu_ChoDuyet();
            $lichsu->idChoDuyet = $lichCD->id;
            $lichsu->idBMNhan = Auth::user()->idBoMon;
            $lichsu->ghiChu = "Đã xếp phòng";
            $lichsu->trangThai = 1;
            $lichsu->save();

            return redirect('user/cacyeucau')->with('thongbao','Đã duyệt lịch thành công');
        }
        else
        {
            return redirect('user/cacyeucau')->with('loi','Đã xảy ra lỗi vui lòng thử lại');
        }
    }

    public function getDieuChinh ()
    {
        return view('user.lichchoduyet.dieuchinh', 
                    [
                        'allMonHoc' => $allMonHoc,
                        'allBuoi' => $allBuoi,
                        'nullPhong' => $nullPhong,
                        'allThu' => $allThu,
                        'allTuan' => $allTuan,
                        'lichCD' => $lichCD,
                        'allGiaoVien' => $allGiaoVien,
                        'allPhong' => $allPhong
                    ]);
    }

}
