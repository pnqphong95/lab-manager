<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\TaiKhoan;
use App\BoMon;
use App\ChucVu;
use App\Phong;
use App\GiaoVien;
use App\PhanMem;
use App\Lich;
use App\LopHocPhan;
use App\Pages;
use App\MonHoc_PhanMem;

// Route::get('test3', function(){
// 	$idHocKyNienKhoa = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
// 	echo $idHocKyNienKhoa->id;
// });

Route::get('trangchu', 'TrangChuController@getTrangChu')->name('root');

Route::get('/', function(){
	return view('welcome');
});

Route::get('thu9', function(){
	$phong = DB::table('phong') ->join('bomon', 'idBoMon', '=', 'bomon.id')
                                    ->where('phong.id',2)
                                    ->get();
                                    echo $phong;
});

Route::get('xoa/{id}', function($id){
	TaiKhoan::xoa($id);
	
	echo "oke! ".$id;
});

Route::get('all', function(){
	$i = 0;
    $arr = TaiKhoan::get();
    // foreach ($arr as $key => $value) {
    // 	echo $value;
    // }
    
    return view('taikhoan', ['data' => $arr]);
    //view('taikhoan')->with('data', $data);
});

Route::get('allbm', function(){
	$i = 0;
    $arr = BoMon::get();
    // foreach ($arr as $key => $value) {
    // 	echo $value;
    // }
    
    return view('taikhoan', ['data' => $arr]);
    //view('taikhoan')->with('data', $data);
});

Route::get('test', function(){
	$cv = ChucVu::find(1);
	foreach ($cv->giaovien as $giaovien) {
		echo $giaovien->TenGV;
	}
});

Route::get('test1', function(){
	$chucvu = ChucVu::find(1);
	foreach ($chucvu->giaovien_chucvu as $giaovien_chucvu) {
		$giaovien = GiaoVien::find($giaovien_chucvu->idGiaoVien);
		echo $giaovien->TenGV."<br>";
	}
});



Route::get('test2', function(){
	$lophocphan = LopHocPhan::find(3);
	echo $lophocphan->TenLop;
});

Route::get('ajax/getLich/{buoi?}/{tuan}',function($buoi, $tuan){
	$idHocKyNienKhoa = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
    $lich = DB::table('lich')		->join('monhoc','monhoc.id', '=', 'idMonHoc')
    								->join('giaovien','giaovien.id', '=', 'idGiaoVien')
    								->where('idBuoi', $buoi)
    								->where('idTuan', $tuan)
    								->where('idHocKyNienKhoa', $idHocKyNienKhoa->id)
    								->get();
    return json_encode($lich);
});



Route::get('login', 'DangNhapController@getDangNhap')->name('getLogin');
Route::post('login', 'DangNhapController@postDangNhap')->name('postLogin');
Route::get('logout', 'DangNhapController@getDangXuat')->name('logout');

Route::get('user', 'UserController@trangchu');


Route::get('admin/lich/them', 'LichController@getThem');

Route::post('admin/lich/them', 'LichController@postThem');

Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'lich'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'LichController@getDanhSach');

		Route::get('sua/{id}', 'LichController@getSua');
		Route::post('sua/{id}', 'LichController@postSua');

		Route::get('them', 'LichController@getThem');
		Route::post('them', 'LichController@postThem');
	});

	Route::group(['prefix'=>'phong'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'PhongController@getDanhSach');

		Route::get('sua/{id}', 'PhongController@getSua');
		Route::post('sua/{id}', 'PhongController@postSua');

		Route::get('suacauhinh/{id}', 'PhongController@getSuaCauHinh');
		Route::post('suacauhinh/{id}', 'PhongController@postSuaCauHinh');

		Route::get('chitiet/{id}', 'PhongController@getChiTiet');

		Route::get('them', 'PhongController@getThem');
		Route::post('them', 'PhongController@postThem');

		Route::get('xoa/{id}', 'PhongController@getXoa');
	});

	Route::group(['prefix'=>'lophocphan'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'LopHocPhanController@getDanhSach');

		Route::get('sua/{id}', 'LopHocPhanController@getSua');
		Route::post('sua/{id}', 'LopHocPhanController@postSua');

		Route::get('them', 'LopHocPhanController@getThem');
		Route::post('them', 'LopHocPhanController@postThem');
	});

	Route::group(['prefix'=>'monhoc'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'MonHocController@getDanhSach');

		Route::get('sua/{id}', 'MonHocController@getSua');
		Route::post('sua/{id}', 'MonHocController@postSua');

		Route::get('them', 'MonHocController@getThem');
		Route::post('them', 'MonHocController@postThem');

		Route::get('xoa/{id}', 'MonHocController@getXoa');

		Route::get('monhoc_phanmem/{id}', 'MonHoc_PhanMemController@getDanhSach');
	});

	Route::group(['prefix'=>'bomon'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'BoMonController@getDanhSach');

		Route::get('sua/{id}', 'BoMonController@getSua');
		Route::post('sua/{id}', 'BoMonController@postSua');

		Route::get('them', 'BoMonController@getThem');
		Route::post('them', 'BoMonController@postThem');

		Route::get('xoa/{id}', 'BoMonController@getXoa');
	});

	Route::group(['prefix'=>'giaovien'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'GiaoVienController@getDanhSach');

		Route::get('sua/{id}', 'GiaoVienController@getSua');
		Route::post('sua/{id}', 'GiaoVienController@postSua');

		Route::get('them', 'GiaoVienController@getThem');
		Route::post('them', 'GiaoVienController@postThem');

		Route::get('xoa/{id}', 'GiaoVienController@getXoa');
	});
});

Route::group(['prefix'=>'user'], function(){
	Route::get('trangchu', 'TrangChuController@getUserTrangChu')->name('userTrangChu');

	Route::get('dangkyphong', 'TrangChuController@getDangKyPhong')->name('dangKyPhong');
	Route::post('dangkyphong', 'TrangChuController@postDangKyPhong');

	Route::get('vande', 'TrangChuController@getVanDe')->name('vanDe');
});

Route::post('timkiem', 'PagesController@timkiem');

Route::get('admin/dangnhap','UserController@getdangnhapAdmin');
Route::post('admin/dangnhap','UserController@postdangnhapAdmin');