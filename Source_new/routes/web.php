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
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});

Route::get('trangchu', function () {
    return view('admin/layout/trangchu');
});

// Route::group(['prefix'=>'admin'], function(){
// 	Route::group(['prefix'=>'lich'], function(){
// 		//admin/theloai/danhsach
// 		Route::get('danhsach', 'LichController@getDanhSach');

// 		Route::get('sua', 'LichController@getSua');

// 		Route::get('them', 'LichController@getThem');

// 		Route::post('them', 'LichController@postThem');
// 	});

// 	Route::group(['prefix'=>'phong'], function(){
// 		//admin/theloai/danhsach
// 		Route::get('danhsach', 'PhongController@getDanhSach');

// 		Route::get('sua', 'PhongController@getSua');

// 		Route::get('them', 'PhongController@getThem');
// 	});

// 	Route::group(['prefix'=>'slide'], function(){
// 		//admin/theloai/danhsach
// 		Route::get('danhsach', 'SlideController@getDanhSach');

// 		Route::get('sua', 'SlideController@getSua');

// 		Route::get('them', 'SlideController@getThem');
// 	});

// 	Route::group(['prefix'=>'tintuc'], function(){
// 		//admin/theloai/danhsach
// 		Route::get('danhsach', 'TinTucController@getDanhSach');

// 		Route::get('sua', 'TinTucController@getSua');

// 		Route::get('them', 'TinTucController@getThem');
// 	});

// 	Route::group(['prefix'=>'user'], function(){
// 		//admin/theloai/danhsach
// 		Route::get('danhsach', 'UserController@getDanhSach');

// 		Route::get('sua', 'UserController@getSua');

// 		Route::get('them', 'UserController@getThem');
// 	});
// });

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

		Route::get('chitiet/{id}', 'PhongController@getChiTiet');

		Route::get('suacauhinh/{id}', 'PhongController@getSuaCauHinh');
		Route::post('suacauhinh/{id}', 'PhongController@postSuaCauHinh');

		Route::get('them', 'PhongController@getThem');
		Route::post('them', 'PhongController@postThem');
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
	});
	
});

Route::get('anhbia', function () {
    return view('admin/layout/anhbia');
});