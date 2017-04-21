<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Lich;
use App\Phong;
use App\MonHoc;
use App\BoMon;
use App\Thu;
use App\Buoi;
use App\Tuan;
use App\GiaoVien;
use DB;

class LichController extends Controller
{
    public function getChinhSuaLich ()
    {
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;

        $allThu = Thu::all();
        $allMonHoc = MonHoc::all();
        $allPhong = Phong::all();
        $allBuoi = Buoi::all();
        $allTuan = Tuan::all();

        $lich = DB::table('lich')   ->where('idGiaoVien', Auth::user()->id)
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
                                    ->orderBy('idTuan')
                                    ->orderBy('idThu')
                                    ->orderBy('idBuoi')
                                    ->get();

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

        $allThu = Thu::all();
        $allMonHoc = MonHoc::all();
        $allPhong = Phong::all();
        $allBuoi = Buoi::all();
        $allTuan = Tuan::all();
        $allGiaoVien = GiaoVien::all();

        $allLichCD = DB::table('Lich_ChoDuyet')
                        ->where ('idGiaoVien', Auth::user()->id)
                        ->where ('idHocKyNienKhoa', $idLastHKNK)
                        ->where ('TrangThai', 0)
                        ->get();

        return view('user.lichchoduyet.danhsach', 
                    [
                        'allMonHoc' => $allMonHoc,
                        'allBuoi' => $allBuoi,
                        'allPhong' => $allPhong,
                        'allThu' => $allThu,
                        'allTuan' => $allTuan,
                        'allLichCD' => $allLichCD,
                        'allGiaoVien' =>$allGiaoVien
                    ]);
    }

    public function getChinhSuaLichAdmin ()
    {
        $lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;

        $allThu = Thu::all();
        $allMonHoc = MonHoc::all();
        $allPhong = Phong::all();
        $allBuoi = Buoi::all();
        $allTuan = Tuan::all();

        $lich = DB::table('lich')   ->where('idGiaoVien', Auth::user()->id)
                                    ->where('idHocKyNienKhoa', $idLastHKNK)
                                    ->orderBy('idTuan')
                                    ->orderBy('idThu')
                                    ->orderBy('idBuoi')
                                    ->get();

        return view('admin.lich.chinhsualich', 
                    [
                        'allMonHoc' => $allMonHoc,
                        'allBuoi' => $allBuoi,
                        'allPhong' => $allPhong,
                        'allThu' => $allThu,
                        'allTuan' => $allTuan,
                        'lich' => $lich
                    ]);
    }

    public function getLichChoDuyetAdmin()
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

        return view('admin.lich.danhsach', 
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
