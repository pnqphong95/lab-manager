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

class LichController extends Controller
{
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

        $allLichCD = DB::table('Lich_ChoDuyet')
                        ->where ('idHocKyNienKhoa', $idLastHKNK)
                        ->where ('TrangThai', 0)
                        ->whereIn ('idGiaoVien', $idGVinBM)
                        ->get();
                        //echo $allLichCD;

        return view('user.lichchoduyet.danhsach', 
                    [
                        'allMonHoc' => $allMonHoc,
                        'allBuoi' => $allBuoi,
                        'allPhong' => $allPhong,
                        'allThu' => $allThu,
                        'allTuan' => $allTuan,
                        'allLichCD' => $allLichCD,
                        'allGiaoVien' => $allGiaoVien
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



            return view('user.lichchoduyet.xepphong', 
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
        } else
        {
            return redirect('user/cacyeucau')->with('thongbao','Phòng đã có người duyệt!');
        }
    }

    public function postXepPhong ($idLichCD, Request $req)
    {
        $lichCD = Lich_ChoDuyet::find($idLichCD);

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


        return redirect('user/cacyeucau')->with('thongbao','Đã duyệt lịch thành công');
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

    public function getLichChoDuyetAdminTask()
    {
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;

        $allThu = Thu::all();
        $allMonHoc = MonHoc::all();
        $allPhong = Phong::all();
        $allBuoi = Buoi::all();
        $allTuan = Tuan::all();
        $allGiaoVien = GiaoVien::all();
        $lich = Lich::all();

        $allLichCD = DB::table('Lich_ChoDuyet')
                        // ->where ('idGiaoVien', Auth::user()->id)
                        ->where ('idHocKyNienKhoa', $idLastHKNK)
                        ->where ('TrangThai', 0)
                        ->get();

        return view('admin.task.danhsach', 
                    [
                        'allMonHoc' => $allMonHoc,
                        'allBuoi' => $allBuoi,
                        'allPhong' => $allPhong,
                        'allThu' => $allThu,
                        'allTuan' => $allTuan,
                        'allLichCD' => $allLichCD,
                        'allGiaoVien' => $allGiaoVien,
                        'lich' => $lich
                    ]);
    }

    public function getThoiKhoaBieu ()
    {
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;
        $tkb = Lich::where('idGiaoVien',2)->get();
        return view('admin.lich.thoikhoabieu',compact('tkb'));
    }
}
