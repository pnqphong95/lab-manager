<?php
namespace App\Http\Controllers;
header("Access-Control-Allow-Origin: *"); //dung cho web khi phat trien		


use Illuminate\Http\Request;
use App\Http\Requests\DangNhapRequest;
use Illuminate\Support\Facades\Auth;
use App\Role_User;
use DB;
use App\Phong;
use App\MonHoc;
use App\Tuan;
use App\Buoi;
use App\BoMon;
use App\Thu;
use App\Lich;
use App\GiaoVien;
use App\VanDe;
use App\Lich_ChoDuyet;
use App\LichSu_ChoDuyet;

class apiController extends Controller
{
    public function getChuyenYC ($idLCD, $idBM)
    {

        $lichCD = Lich_ChoDuyet::find ($idLCD);
        $lichCD->idBMDuyet = $idBM;
        $lichCD->save();  
        $bomon = BoMon::find ($idBM);

        $lichsu = new LichSu_ChoDuyet();
        $lichsu->idChoDuyet = $idLCD;
        $lichsu->idBMNhan = $idBM;
        $lichsu->ghiChu = "chuyen";
        $lichsu->trangThai = 0;
        $lichsu->save();

        return "Yêu cầu đã được chuyển tới bộ môn ".$bomon->TenBM;
    }

	public function getTraVeBM ($idLCD)
	{
		$lichCD = Lich_ChoDuyet::find($idLCD);
		$lichCD->idBMDuyet = 0;
		$lichCD->save();
		return "OK";
	}

	public function getXepPhong ($idLCD, $idP)
	{
		$lichCD = Lich_ChoDuyet::find($idLCD);
        if (!is_null ($lichCD))
        {
            $lichCD->TrangThai = 1;
            $lichCD->idPhong = $idP;
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

            return "OK";
        }
        else
        {
            return "ERR";
        }
	}

	public function getPhongTrongBM ($idQL, $idLich)
	{
		$data = [];
		$nullPhong = array();
		$lichCD = DB::table('Lich_ChoDuyet')
                        ->where ('id', $idLich)
                        ->first();
        if (is_null ($lichCD))
        {
        	array_push($data, $nullPhong);
        	array_push($data, "YES");
        	return $data;
        } 
        
        if ($lichCD->TrangThai == 0)
        {
            $i = 0;
            
            $allPhong = Phong::all();
            $allThu = Thu::all();
            $allMonHoc = MonHoc::all();
            
            $allPhongBM = Phong::where ('idBoMon', $idQL)->get();
            foreach ($allPhongBM as $ph) 
            {
                $checkLich = DB::table('Lich') -> where ('idTuan', $lichCD->idTuan)
                                    -> where ('idThu', $lichCD->idThu)
                                    -> where ('idBuoi', $lichCD->idBuoi)
                                    -> where ('idPhong', $ph->id)
                                    -> first();
                if (is_null ($checkLich))
                {
                    $nullPhong[$i] = $ph;
                    $i++;
                }            
            }
            $allBuoi = Buoi::all();
            $allTuan = Tuan::all();
            $allGiaoVien = GiaoVien::all();
            $allBM = BoMon::all();

            array_push($data, $nullPhong);
            array_push($data, "NO");
            return $data;

        } else
        {
            array_push($data, $nullPhong);
        	array_push($data, "YES");
        	return $data;
        }
	}

	public function getTuChoi ($idLich)
	{
		$lich = Lich_ChoDuyet::find ($idLich);
		$lich->TrangThai = 2;
		$lich->save();
		http_response_code(200);
		return "OK";
	}

	public function getCacYC ($idQL)
	{
		$data = [];
		$lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;

        $QL = GiaoVien::find ($idQL);

        $giaovien = GiaoVien::select('id')->where ('idBoMon', $QL->idBoMon) ->get();
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
        $allLCDYeuCau = Lich_ChoDuyet::where ('idBMDuyet', $QL->idBoMon) 
                                        ->where ('TrangThai', 0)
                                        ->get();
                        //echo $allLichCD;
        //echo $allLCDYeuCau;
        $allMH = MonHoc::all();
        $allTuan = Tuan::all();
        $allThu = Thu::all();
        $allBuoi = Buoi::all();
        $allBM = BoMon::all ();
        //cac yc trong bm
        foreach ($allLichCD as $lich) 
		{
			foreach ($allMH as $mh) 
			{
				if ($lich->idMonHoc == $mh->id)
				{
					$lich->idMonHoc = $mh->MaMH;
				}
			}
		}
		foreach ($allLichCD as $lich) 
		{
			foreach ($allTuan as $mh) 
			{
				if ($lich->idTuan == $mh->id)
				{
					$lich->idTuan = $mh->TenVietTat;
				}
			}
		}
		foreach ($allLichCD as $lich) 
		{
			foreach ($allThu as $mh) 
			{
				if ($lich->idThu == $mh->id)
				{
					$lich->idThu = $mh->TenVietTat;
				}
			}
		}
		foreach ($allLichCD as $lich) 
		{
			foreach ($allBuoi as $mh) 
			{
				if ($lich->idBuoi == $mh->id)
				{
					$lich->idBuoi = $mh->TenVietTat;
				}
			}
		}

		//cac yc ngoai bm
		foreach ($allLCDYeuCau as $lich) 
		{
			foreach ($allMH as $mh) 
			{
				if ($lich->idMonHoc == $mh->id)
				{
					$lich->idMonHoc = $mh->MaMH;
				}
			}
		}
		foreach ($allLCDYeuCau as $lich) 
		{
			foreach ($allTuan as $mh) 
			{
				if ($lich->idTuan == $mh->id)
				{
					$lich->idTuan = $mh->TenVietTat;
				}
			}
		}
		foreach ($allLCDYeuCau as $lich) 
		{
			foreach ($allThu as $mh) 
			{
				if ($lich->idThu == $mh->id)
				{
					$lich->idThu = $mh->TenVietTat;
				}
			}
		}
		foreach ($allLCDYeuCau as $lich) 
		{
			foreach ($allBuoi as $mh) 
			{
				if ($lich->idBuoi == $mh->id)
				{
					$lich->idBuoi = $mh->TenVietTat;
				}
			}
		}
		array_push($data, $allLichCD);
		array_push($data, $allLCDYeuCau);
        return $data;
	}

	public function getXemChiTietTheoTuan ($idTuan, $idGiaoVien)
	{
		$lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
        $idLastHKNK = $lastHKNK->id;
		$lichSang = Lich::where ('idTuan', $idTuan)
						->where ('idHocKyNienKhoa', $idLastHKNK)
						->where ('idGiaoVien', $idGiaoVien)
						->get();
		$allMH = MonHoc::all();
		$allPhong = Phong::all();
		foreach ($lichSang as $lich) 
		{
			foreach ($allMH as $mh) 
			{
				if ($lich->idMonHoc == $mh->id)
				{
					$lich->idMonHoc = $mh->MaMH;
				}
			}
		}

		foreach ($lichSang as $lich) 
		{
			foreach ($allPhong as $p) 
			{
				if ($lich->idPhong == $p->id)
				{
					$lich->idPhong = $p->TenPhong;
				}
			}
		}
		http_response_code(200);
		return json_encode($lichSang);
	}

    public function getLogin ($tk, $mk)
    {	
		$login = 	[
    					'MaGV' => $tk,
    					'password' => $mk
    				];
    	if (Auth::attempt($login)) {
            $user = Auth::user();  
            $js_user = json_encode($user);   
            $roles = Role_User::select ('role_id') ->where ('user_id', Auth::user()->id)->get();
            $data = ['user' => $js_user, 'status' => 'OK', 'roles' => $roles];
            //$a = ['OK','normal'];
            http_response_code(200);
            return json_encode($data);    
            
        } else {
        	$data = ['user' => null, 'status' => 'ERR', 'roles' => null];
            //$a = ['OK','normal'];
            http_response_code(200);
            return json_encode($data);  
        }
    }

    public function getDK ($idGV, $idTuan, $idThu, $idBuoi, $idMH, $nhom)
    {
    	$dk_suc = false;
    	$lastHKNK = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
	        $idLastHKNK = $lastHKNK->id;
    	$daDK = 0;
        $coLichCD = false;
    	$err = false;
    	$GV = GiaoVien::find ($idGV);
    	$mes = '';
    	if ($idGV == 'null') $err = true;
    	if ($idTuan == 'undefined') $err = true;
    	if ($idThu == 'undefined') $err = true;
    	if ($idBuoi == 'undefined')  $err = true;
    	if ($idMH == 'undefined')  $err = true;
    	
    	if ($err) 
    	{
    		return 'ERR';
    	}
    	
		else
    	{
    		$idMonHoc = $idMH;

    		$monHocPhanMem = DB::table('monhoc_phanmem')  ->where('idMonHoc', $idMonHoc)
                                                ->select('idPhanMem')
                                                ->get();
            $arrayPM = array();
	        foreach ($monHocPhanMem as $pm) 
	        {
	            array_push($arrayPM, $pm->idPhanMem);
	        }

	        

	        //Lay tat ca phong trong bo mon
	        $allPhongBM = DB::table('phong')    ->where('idBoMon', $GV->idBoMon)
	                                            ->get();

	        //Lay tat ca phong tu bo mon khac
	        $allPhongBMkhac = DB::table('phong')    ->where('idBoMon', '!=', $GV->idBoMon)
	                                            ->get();
	        foreach ($allPhongBM as $p) 
            {
                //kiem tra phong con trong khong
                $check = DB::table('lich')  ->where('idPhong', $p->id)
                                            ->where('idTuan', $idTuan)
                                            ->where('idThu', $idThu)
                                            ->where('idBuoi', $idBuoi)
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
                        $lichDB->idGiaoVien =$idGV;
                        $lichDB->idPhong =$p->id;
                        $lichDB->idMonHoc =$idMH;
                        $lichDB->nhom = $nhom;
                        $lichDB->idThu = $idThu;
                        $lichDB->idBuoi = $idBuoi;
                        $lichDB->idTuan = $idTuan;
                        $lichDB->idHocKyNienKhoa = $idLastHKNK;
                        $lichDB->save();
                        $dk_suc = true;
                        $phong = Phong::find ($lichDB->idPhong);
                        $buoi = Buoi::find ($lichDB->idBuoi);
                        $thu = Thu::find ($lichDB->idThu);
                        $tuan = Tuan::find ($lichDB->idTuan);
                        $daDK = 1;
                        $mes = $mes . 'Đã đăng ký: Tuần '.$tuan->TenTuan.', '.$thu->TenThu. ', Buổi '.$buoi->TenBuoi.' -- tại phòng: '.$phong->TenPhong;
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
	            foreach ($allPhongBMkhac as $p) 
	            {

	                //kiem tra phong con trong khong
	                $check = DB::table('lich')  ->where('idPhong', $p->id)
	                                            ->where('idTuan', $idTuan)
	                                            ->where('idThu', $idThu)
	                                            ->where('idBuoi', $idBuoi)
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
	                        $lichDB->idGiaoVien =$idGV;
	                        $lichDB->idPhong =$p->id;
	                        $lichDB->idMonHoc =$idMH;
	                        $lichDB->nhom = $nhom;
	                        $lichDB->idThu = $idThu;
	                        $lichDB->idBuoi = $idBuoi;
	                        $lichDB->idTuan = $idTuan;
	                        $lichDB->idHocKyNienKhoa = $idLastHKNK;
	                        $lichDB->save();
	                        $dk_suc = true;
	                        $phong = Phong::find ($lichDB->idPhong);
	                        $buoi = Buoi::find ($lichDB->idBuoi);
	                        $thu = Thu::find ($lichDB->idThu);
	                        $tuan = Tuan::find ($lichDB->idTuan);
	                        $daDK = 1;
	                        $mes = $mes . 'Đã đăng ký: Tuần '.$tuan->TenTuan.', '.$thu->TenThu. ', Buổi '.$buoi->TenBuoi.' -- tại phòng: '.$phong->TenPhong;
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
           	}

           	if ($daDK != 1) //Chua dang ky duoc phong dua vao lich cho duyet
            {
            	//($idGV, $idTuan, $idThu, $idBuoi, $idMH, $nhom)
                $lichCD = new Lich_ChoDuyet();
                $coLichCD = true;
                $lichCD->idGiaoVien =$idGV;
                $lichCD->idMonHoc =$idMH;
                $lichCD->nhom = $nhom;
                $lichCD->idThu = $idThu;
                $lichCD->idBuoi = $idBuoi;
                $lichCD->idTuan = $idTuan;
                $lichCD->idHocKyNienKhoa = $idLastHKNK;
                $lichCD->TrangThai = 0;
                $lichCD->save();
                $mes = $mes . 'Không tìm được phòng phù hợp yêu cầu sẽ đưa vào lịch chờ duyệt';
           	}
    	}
    	return $mes;
    }
}
