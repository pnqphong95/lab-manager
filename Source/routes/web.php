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
use App\ThongKe;
// Route::get('test3', function(){
// 	$idHocKyNienKhoa = DB::table('hocky_nienkhoa')->orderBy('id', 'desc')->first();
// 	echo $idHocKyNienKhoa->id;
// });

Route::get('/', 'TrangChuController@getTrangChu')->name('root');



Route::group(['prefix'=>'ajax'], function(){

	Route::get('getLich/{buoi?}/{tuan}','AjaxController@getLich');

	Route::get('suaLoi/{id?}', 'AjaxController@suaLoi');

	Route::get('addRole/{magv}/{roleName}', 'AjaxController@addRole');
	Route::get('removeRole/{magv}/{roleName}', 'AjaxController@removeRole');

});


Route::get('login', 'DangNhapController@getDangNhap')->name('getLogin');
Route::post('login', 'DangNhapController@postDangNhap')->name('postLogin');
Route::get('logout', 'DangNhapController@getDangXuat')->name('logout');

Route::get('user', 'UserController@trangchu');

Route::get('admin/lich/them', 'LichController@getThem');

Route::post('admin/lich/them', 'LichController@postThem');


Route::group(['prefix'=>'admin', 'middleware' => ['role:admin']], function(){
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


	Route::group(['prefix'=>'vaitro'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'VaiTroController@getDanhSach');
		Route::get('monhoc_phanmem', 'MonHoc_PhanMemController@getPhanMem');
		
		Route::get('sua/{id}', 'VaiTroController@getSua');
		Route::post('sua/{id}', 'VaiTroController@postSua');

		Route::get('them', 'VaiTroController@getThem');
		Route::post('them', 'VaiTroController@postThem');

		Route::get('xoa/{id}', 'VaiTroController@getXoa');

		Route::get('monhoc_phanmem/{id}', 'MonHoc_PhanMemController@getDanhSach');
	});

	Route::group(['prefix'=>'quyen'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'QuyenController@getDanhSach');

		Route::get('sua/{id}', 'MonHocController@getSua');
		Route::post('sua/{id}', 'MonHocController@postSua');

		Route::get('them', 'VaiTroController@getThem');
		Route::post('them', 'VaiTroController@postThem');

		Route::get('xoa/{id}', 'MonHocController@getXoa');
	});


	Route::group(['prefix'=>'phanmem'], function(){
		Route::get('danhsach', 'PhanMemController@getDanhSach');
		
		Route::get('them', 'PhanMemController@getThem');
		Route::post('them', 'PhanMemController@postThem');

		Route::get('sua/{id}', 'PhanMemController@getSua');
		Route::post('sua/{id}', 'PhanMemController@postSua');

		Route::get('xoa/{id}', 'PhanMemController@getXoa');
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
		Route::get('chitiet/{id}', 'GiaoVienController@getChiTietById');

		Route::get('sua/{id}', 'GiaoVienController@getSua');
		Route::post('sua/{id}', 'GiaoVienController@postSua');

		Route::get('them', 'GiaoVienController@getThem');
		Route::post('them', 'GiaoVienController@postThem');

		Route::get('xoa/{id}', 'GiaoVienController@getXoa');
	});

	Route::group(['prefix'=>'thongke'], function(){
		//admin/theloai/danhsach

		Route::get('danhsach', 'ThongKeController@getChart');

		Route::get('tuan', 'ThongKeController@getTuan');		

		Route::get('xoa/{id}', 'ThongKeController@getXoa');

		Route::get('xemthongke', 'ThongKeController@getXemThongKe');
		Route::post('xemthongke', 'ThongKeController@postXemThongKe');
	});


});

Route::group(['prefix'=>'user', 'middleware' => ['role:normal-user|manager']], function(){
	Route::get('trangchu', 'TrangChuController@getUserTrangChu')->name('userTrangChu');

	Route::get('dangkyphong', 'DangKyPhongController@getDangKyPhong')->name('dangKyPhong');
	Route::post('dangkyphong', 'DangKyPhongController@postDangKyPhong');

	Route::get('vande', 'VanDeController@getVanDe');
	Route::post('vande', 'VanDeController@postVanDe');

	Route::get('lichthuchanh', 'LichController@getLichThucHanh');

	Route::get('cacyeucau', ['middleware' => ['permission:manager'], 'uses' => 'LichController@getLichChoDuyet']);

	Route::get('danhsachvande', 'VanDeController@getDanhSachLoi');
	Route::get('danhsachlichCD', 'DangKyPhongController@getDSLichCD');
});
