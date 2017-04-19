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

Route::group(['prefix'=>'admin'], function(){
	Route::get('trangchu','TrangChuController@getTrangChuAdmin');
	Route::group(['prefix'=>'lich'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'LichController@getDanhSach');
		Route::get('danhsach', 'LichController@getLichChoDuyetAdmin');

		Route::get('dangkyphong', 'DangKyPhongController@getDangKyPhongAdmin');
		Route::post('dangkyphong', 'DangKyPhongController@postDangKyPhongAdmin');

		Route::get('danhsachemail', 'MailController@getDanhSach');
		
	});

	Route::group(['prefix'=>'mail'], function(){
		Route::get('danhsach', 'MailController@getDanhSach');

		Route::get('mail/{id}', 'MailController@getMail');
		Route::post('blanks', 'MailController@postMail');
	});

	Route::group(['prefix'=>'vande'], function(){
		Route::get('danhsach', 'VanDeController@getDanhSachAdmin');

		Route::get('them', 'VanDeController@getThemAdmin');
		Route::post('them', 'VanDeController@postThemAdmin');

		Route::get('xoa/{id}', 'VanDeController@getXoa');
	});

	Route::group(['prefix'=>'phong'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'PhongController@getDanhSach');

		Route::get('sua/{id}', 'PhongController@getSua');
		Route::post('sua/{id}', 'PhongController@postSua');

		Route::get('chitiet/{id}', 'PhongController@getChiTiet');
		Route::post('chitiet/{id}', 'PhongController@postThemPM');

		Route::get('them', 'PhongController@getThem');
		Route::post('them', 'PhongController@postThem');
		Route::get('themPM', 'PhongController@getThemPM');
		Route::post('themPM', 'PhongController@postThemPM');

		Route::get('xoa/{id}', 'PhongController@getXoa');
		Route::get('chitiet/xoaPM/{idPM}/{idPhong}', 'PhongController@getXoaPM');
	});

	Route::group(['prefix'=>'monhoc'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'MonHocController@getDanhSach');

		Route::get('sua/{id}', 'MonHocController@getSua');
		Route::post('sua/{id}', 'MonHocController@postSua');

		Route::get('them', 'MonHocController@getThem');
		Route::post('them', 'MonHocController@postThem');

		Route::get('xoa/{id}', 'MonHocController@getXoa');

		Route::get('monhoc_phanmem/{id}', 'MonHoc_PhanMemController@getDanhSachPM');

		Route::get('monhoc_phanmem/xoa/{id}', 'MonHoc_PhanMemController@getXoaPM');

		Route::get('themphanmem/{id}','MonHoc_PhanMemController@getThemPM');
		Route::post('themphanmem/{id}','MonHoc_PhanMemController@postThemPM');
	});

	Route::group(['prefix'=>'phanmem'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'PhanMemController@getDanhSach');

		Route::get('sua/{id}', 'PhanMemController@getSua');
		Route::post('sua/{id}', 'PhanMemController@postSua');

		Route::get('them', 'PhanMemController@getThem');
		Route::post('them', 'PhanMemController@postThem');

		Route::get('xoa/{id}', 'PhanMemController@getXoa');
	});

	Route::group(['prefix'=>'vaitro'], function(){
		//admin/theloai/danhsach
		Route::get('danhsach', 'VaiTroController@getDanhSach');

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
		Route::get('chitiet/{id}', 'GiaoVienController@getChiTietById');

		Route::get('sua/{id}', 'GiaoVienController@getSua');
		Route::post('sua/{id}', 'GiaoVienController@postSua');

		Route::get('them', 'GiaoVienController@getThem');
		Route::post('them', 'GiaoVienController@postThem');

		Route::get('xoa/{id}', 'GiaoVienController@getXoa');
	});

	Route::group(['prefix'=>'thongke'], function(){
		//admin/thongke/danhsach

		Route::get('danhsach', 'ThongKeController@getChart');
		Route::get('tuan', 'ThongKeController@getTuan');		

		Route::get('xemthongke', 'ThongKeController@getXemThongKe');
		Route::post('xemthongke', 'ThongKeController@postXemThongKe');
	});
});

Route::group(['prefix'=>'user', 'middleware' => ['role:normal|manager|admin']], function(){
	Route::get('trangchu', 'TrangChuController@getUserTrangChu')->name('userTrangChu');

	Route::get('dangkyphong', 'DangKyPhongController@getDangKyPhong')->name('dangKyPhong');
	Route::post('dangkyphong', 'DangKyPhongController@postDangKyPhong');

	Route::get('vande', 'VanDeController@getVanDe');
	Route::post('vande', 'VanDeController@postVanDe');

	Route::get('lichthuchanh', 'LichController@getLichThucHanh');
	Route::get('chinhsualich', 'LichController@getChinhSuaLich');

	Route::get('cacyeucau', ['middleware' => ['role:manager|admin'], 'uses' => 'LichController@getLichChoDuyet']);

	Route::get('danhsachvande', 'VanDeController@getDanhSachLoi');
	Route::get('danhsachlichCD', 'DangKyPhongController@getDSLichCD');
});
