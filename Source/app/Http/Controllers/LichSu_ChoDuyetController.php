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

class LichSu_ChoDuyetController extends Controller
{
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
                        //echo $allLichCD;
        //echo $allLCDYeuCau;
        return view('user.duyetlich.danhsach', 
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
                        'ls_choduyet' => $ls_choduyet
                    ]);
    }

    public function getXepPhong ($idLichCD)
    {
        $idLichCD = Crypt::decrypt($idLichCD);
        $lichCD = DB::table('Lich_ChoDuyet')
                        ->where ('id', $idLichCD)
                        ->first();
        if (is_null ($lichCD)) return redirect('user/duyetlich/danhsach');
        
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

            return view('user.duyetlich.xepphong', 
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
            return redirect('user/duyetlich/danhsach')->with('thongbao','Phòng đã có người duyệt!');
        }
    }

    public function postXepPhong ($idLichCD, Request $req)
    {
        $idLichCD = Crypt::decrypt($idLichCD);
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
            $lichsu->trangThai = 1;
            $lichsu->save();

            return redirect('user/duyetlich/danhsach')->with('thongbao','Đã duyệt lịch thành công');
        }
        else
        {
            return redirect('user/duyetlich/danhsach')->with('loi','Đã xảy ra lỗi vui lòng thử lại');
        }
    }

    public function postXinTroGiup (Request $req)
    {
        $lichCD = Lich_ChoDuyet::find ($req->idChoDuyet);
        $lichCD->idBMDuyet = $req->idBMNhan;
        $lichCD->save();
        $bomon = BoMon::find ($req->idBoMon);

        return redirect('user/duyetlich/danhsach')->with('thongbao','Yêu cầu đã được chuyển tới bộ môn '.$bomon->TenBM);
    }

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
        return redirect('user/duyetlich/danhsach')->with('thongbao','Đã trả yêu cầu: '.$mh->TenMH.' --- Tuần '.$t->TenTuan.', '.$th->TenThu.', Buổi '.$b->TenBuoi.' về BM quản lý');
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
        return redirect('user/duyetlich/danhsach')->with('thongbao','Đã từ chối xếp phòng cho môn '.$mh->TenMH.' --- Tuần '.$t->TenTuan.', '.$th->TenThu.', Buổi '.$b->TenBuoi);
    }

    public function getChiTiet ($idLichCD){

        $id = Crypt::decrypt($idLichCD);
        $allBoMon = BoMon::all();
        $lichCD = DB::table('Lich_ChoDuyet')    ->where ('id', $id)
                                                ->first();

        $ls_choduyet = DB::table('LichSu_ChoDuyet') ->where('idChoDuyet',$id)
                                                    ->get();    
      
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

            return view('user.duyetlich.chitiet', 
                        [
                            'allMonHoc' => $allMonHoc,
                            'allBuoi' => $allBuoi,
                            'nullPhong' => $nullPhong,
                            'allThu' => $allThu,
                            'allTuan' => $allTuan,
                            'lichCD' => $lichCD,
                            'allGiaoVien' => $allGiaoVien,
                            'allPhong' => $allPhong,
                            'allBoMon' => $allBoMon,
                            'ls_choduyet' => $ls_choduyet
                        ]);
        } else
        {
            return redirect('user/duyetlich/danhsach')->with('thongbao','Phòng đã có người duyệt!');
        }
        
    }
}
